<?php
namespace App\Form\Type;

use App\EmailBook;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\GooiRequest;
use PhpParser\Node\Stmt\Label;
use SebastianBergmann\CodeCoverage\Report\Text;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class GooiRequestType extends AbstractType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options, EmailBook $emailBook)
    {
        //Hier wordt het daadwerkelijke formulier gemaakt:
        //We starten een formulier en voegen allerlei velden toe:
        $builder
        ->add('Naam',TextType::class,
        [
            'label'=>'Naam * ',
            'attr' => [
                'placeholder' => 'Jouwn Naam'
            ]
        ])
        ->add('IBAN',TextType::class,[
            'label'=>'IBAN * ',
            'attr' => [
                'placeholder' => 'NLxx xxxx xxxx xxxx xx'
            ]
        ])
        ->add('EmailAdres',EmailType::class, [
            'label'=>'Email Adres * ',
            'attr' => [
                'placeholder' => 'email@adres.nl'
            ]
        ])
        ->add('TotaalBedrag',MoneyType::class, [
            'label'=>'Totaal bedrag * ',
            'attr' => [
                'placeholder' => '€ 420,69'
            ]
        ])
        ->add('Producten',TextType::class, [
            'label'=>'Wat heb je gekocht? * ',
            'attr' => [
                'placeholder' => 'Graafmachine'
            ]
        ])
        ->add('Activiteit',TextType::class, [
            'label'=>'Voor welke activiteit? * ',
            'attr' => [
                'placeholder' => 'Via-VetLeukeActiviteit'
            ]
        ])
        ->add('Comissie',ChoiceType::class,[
            'choices'=>['Bestuur'=>'Bestuur','Activiteiten Comissie' => 'Aco','Anders, leg uit in opmerkingen'=>'anders'], 
            'label' => 'Van wie krijg je geld? *', 
            ])
        ->add('Bon',FileType::class,['label'=>'Bonnetje * '])
        ->add('Opmerkingen',TextareaType::class,['required'=>false, 
            'label' => 'Opmerking? ' ,
            'attr'  => [
                'placeholder' => 'Liefde voor jou en mij, xoxo Big Money '
            ]
            ])
        ->add('EerlijkIngevuld',CheckboxType::class,[
            'label'=>'Alles gecontroleerd en naar waarheid ingevuld? * '
            ]) //Dit is trouwens hoe je de text VOOR het invulveld op iets anders kan zetten dan de naam van de variable
        ->add('Insturen ',SubmitType::class)//Zo maak je een knop om het formulier inleverbaar te maken
        ;
    }

    public function configureOptions(OptionsResolver $resolver)//Zo weet het formulier welke class er bij hoort om data in op te slaan, in dit geval dus 'GooiRequest'
    {
        $resolver->setDefaults(['data_class' => GooiRequest::class, ]);
    }
}