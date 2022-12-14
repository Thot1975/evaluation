<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Brand;
use App\Entity\Computer;
use App\Entity\Marque;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ComputerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('description', CKEditorType::class, [
            'label' => 'Informations de l\'évènement'
        ])
        ->add('model', TextType::class, [
            'label' => 'Modèle de Computer',
            'attr' => [
                'placeholder' => 'Entrez le modèle de computer'
            ]])
        ->add('prix', NumberType:: class ,[
            'label' => 'Prix du bien',
        ])
        ->add('year', NumberType:: class ,[
            'label' => 'Année de sortie',
        ])
        ->add('imgfile', FileType::class, [
            'label' => 'Photo du computer',
            'mapped' => false,
            'required' => false,
            'constraints' => [
                new File([
                    'maxSize' => '1024k',
                ])
            ],
        ])
        ->add('marque', EntityType::class, [
            'choice_label'=> 'name',
            'class'=> Brand::class,
            'label'=>'Choix de la marque',
            'multiple' => false,
            'expanded' => true,
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Computer::class,
        ]);
    }
}
