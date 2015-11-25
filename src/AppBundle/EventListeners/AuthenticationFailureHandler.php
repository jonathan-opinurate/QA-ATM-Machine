<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 11/11/15
 * Time: 10:14
 */

namespace AppBundle\EventListeners;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Security\Http\HttpUtils;

class AuthenticationFailureHandler extends DefaultAuthenticationFailureHandler
{


    public function __construct(HttpKernelInterface $httpKernel, HttpUtils $httpUtils, SessionInterface $session)
    {
        $this->httpKernel = $httpKernel;
        $this->httpUtils = $httpUtils;
        $this->session = $session;

        parent::__construct($httpKernel, $httpUtils);

    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $session = $this->session;
        $attempts = $session->get('attempts', 0);
        $attempts++;
        $session->set('attempts', $attempts);

        if ($attempts <= 2) {
            $response = new RedirectResponse('/login');
            return $response;
        } else {
            $response = new RedirectResponse('/user-error');
            return $response;
        }
    }
}