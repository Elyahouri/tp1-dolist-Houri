<?php

namespace App\Form;

use App\Entity\Task;
use App\Entity\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',TextType::class)
            ->add('description',TextareaType::class)
            ->add('Accomplished',CheckboxType::class)
            ->add('priority',IntegerType::class)
            ->add('Types',EntityType::class,[
                'class'=>Type::class,
                'choice_label' =>function($type){
                    return $type->getType();
                },
                'label_attr'=>[
                    'class'=>'checkbox-inline',
                ],
                'multiple'=>true,
                'expanded'=>true,
                'by_reference'=>false

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
