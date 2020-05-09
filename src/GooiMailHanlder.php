<?php
namespace App;


use App\Entity\GooiRequest;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GooiMailHanlder extends AbstractController
{
    private $mailer;
    private $emailbook;

    function __construct( \Swift_Mailer $mailer, EmailBook $emailBook)
    {
        $this->mailer = $mailer;
        $this->emailbook = $emailBook;
    }

    public function send(GooiRequest $gooiRequest)
    {
        //Haal relevante informatie uit gooirequest met $gooirequest->getNaam() achtige functies (zie gooirequest class)
        $naam = $gooiRequest->getNaam();
        $now = (new DateTime())->format('d/m/Y');
        $message = (new \Swift_Message('GooiGeld verzoek '. $naam .' op '. $now))
            ->setFrom($gooiRequest->getEmailAdres())
            ->setTo($this->emailbook->getBoek()[$gooiRequest->getComissie()])
            ->attach(\Swift_Attachment::fromPath($gooiRequest->getBonFile()->getPath()))
            ->setBody($this->renderView('emails/GooiGeldRequestEmailTemplate.html.twig',[
                'ontvanger'=>$gooiRequest->getComissie(),
                'naam'=>$naam,
                'kostenpost'=>$gooiRequest->getProducten(),
                'activiteit'=>$gooiRequest->getActiviteit(),
                'totaalbedrag'=>$gooiRequest->getTotaalBedrag(),
                'IBAN'=>$gooiRequest->getIBAN(),
                'datum'=>$now,
                'emailadres'=>$gooiRequest->getEmailAdres()]),
                'text/html');  
        $this->message = $message;

        $this->mailer->send($this->message);
        $this->emailSent = true;
        
    }
}