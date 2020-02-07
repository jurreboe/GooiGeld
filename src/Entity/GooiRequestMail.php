<?php
namespace App\Entity;


use App\Entity\GooiRequest;

class GooiRequestMail
{
    private $email; //Holds the email file we are goint to send
    private GooiRequest $gooiRequest;
    public bool $emailSent = false;

    function __construct(GooiRequest $gooiRequest)
    {
        $this->gooiRequest = $gooiRequest;
        //TODO:Schrijf hier de e-mail op basis van de nieuwe gooirequest, en sla het op in de email file
        //Haal relevante informatie uit gooirequest met $gooirequest->getNaam() achtige functies (zie gooirequest class)
    }

    public function send()
    {
        //TODO:Roep hier een of andere mailserver aan, en stuur de gemaakte mail op naar de relevante comissie

        //TODO:als de mail gestuurd is zet de bool 'emailSent' op true
        
        //Some if statement:
        $this->emailSent = true;
    }
}