<?php

namespace App\Form;

use App\Entity\SurfBoard;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

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
            ->add('boardPictureFile', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
            ])
            ->add('boardPictureFile', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SurfBoard::class,
        ]);
    }
}
