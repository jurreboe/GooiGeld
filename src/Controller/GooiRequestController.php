<?php
namespace App\Controller;

use App\EmailBook;
use App\Entity\GooiRequest;
use App\GooiMailHanlder;
use App\Form\Type\GooiRequestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use symfony\component\routing\annotation\route;
use Symfony\Component\HttpFoundation\Request;


class GooiRequestController extends AbstractController
{
    
       /**
        *@Route("/GooiGeld")
        */
    public function new(Request $request, GooiMailHanlder $mailHandler)
    {
        //Dit is de controller, die handlet alle praktische zaken, zo maakt hij een nieuw data object op basis van de class 'GooiRequest'
        $gooiRequest = new GooiRequest();

        //Hier wordt de form gemaakt op basis van het 'GooiRequestType', in Form\Type, dit gaat dus op basis van de info in $GooiRequest: 
        $form = $this->createForm(GooiRequestType::class,$gooiRequest);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            //Haal de data uit de gesubmitte form en stop hem in een object:
            $gooiRequest = $form->getData();

            //Vervolgens maken we een nieuw mailtje (zit in een andere class) op basis van onze informatie, en versturen we die:
            $mailHandler->send($gooiRequest);

            //TODO: toon de gebruiker dat zijn verzoek verzonden is, en stop deze controller dus met draaien
            //Zou bijvoorbeeld leuk zijn met een rederect naar website/succes!
            //daar heb ik al een controller voor gemaakt maar rederecten naar een andere pagina lukt me nog niet :)
        }
        
        //Nu ons formulier gemaakt is, geven we het door aan twig (templates/GooiRequest/newRequest.html.twig) om gerendert te worden, zodat de computer weet wat hij moet laten zien
        return $this->render('GooiRequest/newRequest.html.twig',['form'=>$form->createView(),]);
    }
}