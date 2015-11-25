<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 25/11/15
 * Time: 11:31
 */

namespace AppBundle\EventListeners;


use AppBundle\Services\MachineStatusService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Templating\EngineInterface;

class CheckMachineStatusListener
{
    /**
     * @var MachineStatusService
     */
    private $machineStatus;
    /**
     * @var AuthorizationCheckerInterface
     */
    private $authorizationChecker;
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;
    /**
     * @var EngineInterface
     */
    private $templateEngine;

    public function __construct(
        MachineStatusService $machineStatus,
        AuthorizationCheckerInterface $authorizationChecker,
        TokenStorageInterface $tokenStorage,
        EngineInterface $templateEngine
    ) {

        $this->machineStatus = $machineStatus;
        $this->authorizationChecker = $authorizationChecker;
        $this->tokenStorage = $tokenStorage;
        $this->templateEngine = $templateEngine;
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        $request = $event->getRequest();
        $requestUri = $request->getRequestUri();

        // Don't stop the user from accessing login / logout
        if (strpos($requestUri, 'login') || strpos($requestUri, 'logout')) {
            return;
        }

        if ($this->tokenStorage->getToken() == null) {
            return;
        }

        if (!$this->authorizationChecker->isGranted('ROLE_MANAGER') && !$this->machineStatus->isOpen()) {
            $response = new Response();
            $response->setContent($this->templateEngine->render('AppBundle:Machine:closed.html.php'));

            $event->setResponse($response);
        }
    }
}