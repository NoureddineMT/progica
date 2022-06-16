<?php

namespace App\Form;

use App\Entity\Equipement;
use App\Entity\GiteSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GiteSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('minSurface', IntegerType::class,[
                "required" => false,
                "label"=> false,
                "attr" => ["placeholder" => "Surface minimum"]
            ])
            ->add('minChambre', IntegerType::class,[
                "required" => false,
                "label"=> false,
                "attr" => ["placeholder" => "Nombre de chambre minimum"]
            ])
            ->add('minCouchage', IntegerType::class,[
                "required" => false,
                "label"=> false,
                "attr" => ["placeholder" => "Nombre de couchage minimum"]
            ])
            ->add('equipement', TextType::class,[
                "required" => false,
                "label"=> false,
                "attr" => ["placeholder" => "équipements"]
            ])
            ->add('submit', SubmitType::class, [
                "label" => "rechercher",
                "attr" => ['class' => 'btn btn-secondary']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GiteSearch::class,
        ]);
    }
}
