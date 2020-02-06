<?php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use symfony\Component\Form\Extension\Core\Type\ChoiceType;
use symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\GooiRequest;
use SebastianBergmann\CodeCoverage\Report\Text;

class GooiRequestType extends AbstractType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        //Hier wordt het daadwerkelijke formulier gemaakt:
        //We starten een formulier en voegen allerlei velden toe:
        $builder
        ->add('Naam',TextType::class,)
        ->add('IBAN',TextType::class)
        ->add('EmailAdres',EmailType::class)
        ->add('TotaalBedrag',MoneyType::class)
        ->add('kostenpost',TextType::class)
        ->add('Activiteit',TextType::class)
        //->add('Comissie',ChoiceType::class,['choices'=>['Activiteiten Comissie' => 'Aco','Bestuur'=>'Bestuur','Anders, leg uit in opmerkingen'=>'anders'],])
        //->add('Bonnetje',FileType::class)
        ->add('Opmerkingen',TextType::class)
        ->add('EerlijkIngevuld',CheckboxType::class,['label'=>'Alles gecontroleerd en naar waarheid ingevuld']) //Dit is trouwens hoe je de text VOOR het invulveld op iets anders kan zetten dan de naam van de variable
        ->add('Insturen',SubmitType::class)//Zo maak je een knop om het formulier inleverbaar te maken
        ;
    }

    public function configureOptions(OptionsResolver $resolver)//Zo weet het formulier welke class er bij hoort om data in op te slaan, in dit geval dus 'GooiRequest'
    {
        $resolver->setDefaults(['data_class' => GooiRequest::class, ]);
    }
}