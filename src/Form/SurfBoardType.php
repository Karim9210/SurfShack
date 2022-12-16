<?php

namespace App\Form;

use App\Entity\SurfBoard;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SurfBoardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nickname', null, ['label' => 'nickname'])
            ->add('length', null, ['label' => 'length'])
            ->add('width', null, ['label' => 'width'])
            ->add('thickness', null, ['label' => 'thickness'])
            ->add('type', null, ['label' => 'type'])
            ->add('material', null, ['label' => 'material'])
            ->add('shaper', null, ['label' => 'shaper'])
            ->add('brand', null, ['label' => 'brand'])
            ->add('review', null, ['label' => 'review'])
            ->add('datePurchase', null, ['label' => 'datepurchase'])
            ->add('price', null, ['label' => 'price'])
            ->add('new', null, ['label' => 'new'])
            ->add('picture', null, ['label' => 'picture']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SurfBoard::class,
        ]);
    }
}
