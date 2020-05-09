<?php
namespace App\Entity;


use App\Entity\GooiRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GooiRequestMail extends AbstractController
{
    private $email; //Holds the email file we are going to send
    private $gooiRequest;
    private $message;
    private $mailer;
    public $emailSent = false;


    function __construct(GooiRequest $gooiRequest, \Swift_Mailer $mailer)
    {
        $this->gooiRequest = $gooiRequest;
        $this->mailer = $mailer;
        //TODO:Schrijf hier de e-mail op basis van de nieuwe gooirequest, en sla het op in de email file
        //Haal relevante informatie uit gooirequest met $gooirequest->getNaam() achtige functies (zie gooirequest class)
        $naam = $gooiRequest->getNaam();
        $now = new \DateTime('now');
        $message = new \Swift_Message('test 1');
        $message->setFrom('pipo@declown.com');
        $message->setTo('Comissie@viakunst.nl');
        $message->setBody('Wat tekst');
        //$message = (new \Swift_Message('GooiGeld verzoek '+ $naam +' op '+ $now))
        //    ->setFrom($gooiRequest->getEmailAdres())
        //    ->setTo($this->GetComissieEmail($gooiRequest->getComissie())
        //    ->setBody($this->renderView('GooiGeldRequestEmailTemplate.html.twig',['naam'=>$naam,'kostenpost'=>$gooiRequest->getKostenpost(),'activiteit'=>$gooiRequest->getActiviteit(),'totaalbedrag'=>$gooiRequest->getTotaalBedrag(),'IBAN'=>$gooiRequest->getIBAN(),'datum'=>$now,'emailadres'=>$gooiRequest->getEmailAdres()]),'text/html');

        //TODO: schrijf verschillende templates voor comissie en bestuur

        $this->message = $message;
    }

    public function send()
    {
        if($this->emailSent == false)
        {

            
            //TODO:Roep hier een of andere mailserver aan, en stuur de gemaakte mail op naar de relevante comissie

            //TODO:als de mail gestuurd is zet de bool 'emailSent' op true
            
            //Some if statement:
            $this->mailer->send($this->message);
            $this->emailSent = true;
        }
        return $this->emailSent;
    }

    protected function GetComissieEmail(string $comissienaam)
    {
        //TODO: vindt het relevante email adres bij de comissie
        return "comissie@viakunst.nl";

    }
}