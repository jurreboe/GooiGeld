<?php
namespace App\Controller;

use App\Entity\GooiRequest;
use App\Form\Type\GooiRequestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use symfony\component\routing\annotation\route;
use Symfony\Component\HttpFoundation\Response;


class GooiRequestController extends AbstractController
{
       /**
        *@Route("/GooiGeld")
        */
    public function new()
    {
        //Dit is de controller, die handlet alle praktische zaken, zo maakt hij een nieuw data object op basis van de class 'GooiRequest'
        $gooiRequest = new GooiRequest();
        $gooiRequest->setNaam('Vul hier je naam in');//Vervolgens kun je op deze manier alvast tekst of andere waardes in het blok zetten
        $gooiRequest->setIBAN('Hier moet je rekening nummer');//Deze tekst komt dus in het invulblok te staan, moet de gebruiker dan weghalen om zijn data in te vullen

        //Hier wordt de form gemaakt op basis van het 'GooiRequestType', in Form\Type, dit gaat dus op basis van de info in $GooiRequest: 
        $form = $this->createForm(GooiRequestType::class,$gooiRequest);

        //Nu ons formulier gemaakt is, geven we het door aan twig (templates/GooiRequest/newRequest.html.twig) om gerendert te worden, zodat de computer weet wat hij moet laten zien
        return $this->render('GooiRequest/newRequest.html.twig',['form'=>$form->createView(),]);
    }
}