<?php
namespace App;


use App\Entity\GooiRequest;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GooiMailHanlder extends AbstractController
{
    private $mailer;
    private $book;

    function __construct( \Swift_Mailer $mailer, EmailBook $emailBook)
    {
        $this->mailer = $mailer;
        $this->book = $emailBook->getBoek();
    }

    public function send(GooiRequest $gooiRequest)
    {
        //Haal relevante informatie uit gooirequest met $gooirequest->getNaam() achtige functies (zie gooirequest class)
        $naam = $gooiRequest->getNaam();
        $now = (new DateTime())->format('d/m/Y');
        $message = (new \Swift_Message('GooiGeld verzoek '. $naam .' op '. $now))
            ->setFrom($gooiRequest->getEmailAdres())
            ->setTo($this->GetComissieEmail($gooiRequest->getComissie()))
            ->setBody($this->renderView('emails/GooiGeldRequestEmailTemplate.html.twig',[
                'ontvanger'=>$this->book[$gooiRequest->getComissie()],
                'naam'=>$naam,
                'kostenpost'=>$gooiRequest->getKostenpost(),
                'activiteit'=>$gooiRequest->getActiviteit(),
                'totaalbedrag'=>$gooiRequest->getTotaalBedrag(),
                'IBAN'=>$gooiRequest->getIBAN(),
                'datum'=>$now,
                'emailadres'=>$gooiRequest->getEmailAdres()]),
                'text/html');        
        $message->setFrom($gooiRequest->getEmailAdres());
        $message->setTo('Comissie@viakunst.nl');
        $this->message = $message;

        $this->mailer->send($this->message);
        $this->emailSent = true;
        
    }

    protected function GetComissieEmail(string $comissienaam)
    {
        //TODO: retrieve email van de appropriate comissie
        return "comissie@viakunst.nl";

    }
}