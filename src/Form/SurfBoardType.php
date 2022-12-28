<?php

namespace App\Form;

use App\Entity\SurfBoard;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class SurfBoardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nickname', null, ['label' => false])

            ->add('length', null, ['label' => false])

            ->add('width', null, ['label' => false])
            ->add('thickness', null, ['label' => false])
            ->add('type', null, ['label' => false])
            ->add('material', null, ['label' => false])
            ->add('shaper', null, ['label' => false])
            ->add('brand', null, ['label' => false])
            ->add('review', TextareaType::class, ['label' => false])

            ->add('datePurchase', null, ['label' => false])
            ->add('price', MoneyType::class, ['currency' => 'USD', 'label' => 'Price '])

            ->add('new', null, ['label' => false])
            ->add('boardPictureFile', VichFileType::class, [
                'required'      => false,
                'label' => false,
                'allow_delete'  => false, // not mandatory, default is true
                'download_uri' => false, // not mandatory, default is true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SurfBoard::class,
        ]);
    }
}
