<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 25/11/15
 * Time: 12:29
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class WithdrawalFormType extends AbstractType
{
    /**
     * @var
     */
    private $showReceipt;

    public function __construct($showReceipt)
    {
        $this->showReceipt = $showReceipt;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('amount', 'choice', [
            'expanded' => true,
            'multiple' => false,
            'choices' => [
                10 => "£10",
                20 => "£20",
                30 => "£30",
                40 => "£40",
                50 => "£50",
                100 => "£100",
                150 => "£150",
                250 => "£250",
                null => 'Input own amount',
            ]
        ])
            ->add('receipt', 'hidden', [
                'data' => $this->showReceipt
            ])
            ->add('altAmount', 'text', [
                'required' => false
            ])
            ->add('withdraw', 'submit', array('label' => 'Withdraw'));
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'withdrawal';
    }
}