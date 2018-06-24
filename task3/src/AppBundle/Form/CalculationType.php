<?php

namespace AppBundle\Form;

use AppBundle\Entity\CalculationHistory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalculationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
        ->add('sum', TextType::class, [
            'label' => 'Сумма кредита',
            'attr' => [
                'ng-model' => 'sum',
                'class' => 'form-control']
        ])
        ->add('period', TextType::class, [
            'label' => 'Срок кредита, мес.',
            'attr' => [
                'ng-model' => 'period',
                'class' => 'form-control']
        ])
        ->add('interestRate', TextType::class, [
            'label' => 'Процентная ставка',
            'attr' => [
                'ng-model' => 'interestRate',
                'class' => 'form-control',
                ]
        ])
        ->add('startDate', DateType::class, [
            'label' => 'Дата первого платежа',
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd',
            'input' => 'string',
            'attr' => [
                'ng-model' => 'startDate',
                'class' => 'form-control']
        ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CalculationHistory::class,
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
