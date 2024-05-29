<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NomPro',TextType::class,[
                'label'=> false,
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('DesPro',TextareaType::class,[
                'label'=> false,
                'attr'=>[
                    'class'=>'summernote'
                ]
            ])
            ->add('PrixPro',TextType::class,[
                'label'=> false,
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
          
            ->add('ImgPro',FileType::class,[
                'label'=> false,
            'mapped'=>true,
            'required'=>false,
            'data_class'=>null
           
            ])
            
            ->add('Categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'NomCat',
                'attr'=>[
                    'class'=>'form-control selectric'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
