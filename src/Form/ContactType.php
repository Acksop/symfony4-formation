<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 3/26/19
 * Time: 2:29 PM
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('courriel', EmailType::class)
            ->add('message', TextareaType::class,
                ['attr'=>
                    ['maxlength'=>128]
                ]);
    }

}