<?php
namespace App\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class GooiRequest
{
    //Dit is de class die de informatie vasthoudt, zie het als een soort tijdelijke mini database
    //De class bevat een aantal beschermde variablen, die overeenkomen met de variablen in 'GooiRequestType', waar het bijbehorende formulier wordt gemaakt
    protected $Naam;
    protected $IBAN;
    protected $EmailAdres;
    protected $TotaalBedrag;
    protected $Producten;
    protected $Activiteit;
    protected $Comissie;
    protected $Bon;
    protected $Opmerkingen;
    protected $EerlijkIngevuld;

    //Deze variablen moetten wel verkregen en geschreven kunnen worden, dus daar moet je deze standaart 'set/get' functies voor maken:
    //Het formulier kan die namenlijk automatisch vinden en gebruiken om de ingeleverde informatie naar te schrijven.
    public function getNaam()
    {
        return $this->Naam;
    }

    public function setNaam($Naam)
    {
        $this->Naam = $Naam;
    }

    public function getIBAN()
    {
        return $this->IBAN;
    }

    public function setIBAN($IBAN)
    {
        $this->IBAN = $IBAN;
    }

    public function getEmailAdres()
    {
       return $this->EmailAdres;
    }

    public function setEmailAdres(string $EmailAdres)
    {
        $this->EmailAdres = $EmailAdres;
    }

    public function getTotaalBedrag()
    {
        return $this->TotaalBedrag;
    }

    public function setTotaalBedrag(float $TotaalBedrag)
    {
        $this->TotaalBedrag = $TotaalBedrag;
    }

    public function getProducten()
    {
        return $this->Producten;
    }

    public function setProducten($Producten)
    {
        $this->Producten = $Producten;
    }

    public function getActiviteit()
    {
        return $this->Activiteit;
    }

    public function setActiviteit($Activiteit)
    {
        $this->Activiteit = $Activiteit;
    }

    public function getComissie()
    {
        return $this->Comissie;
    }

    public function setComissie($Comissie)
    {
        $this->Comissie = $Comissie;
    }

    public function getBon(): ?UploadedFile
    {
        return $this->Bon;
    }

    public function setBon($Bon)
    {
        $this->Bon = $Bon;
    }

    public function getOpmerkingen()
    {
        return $this->Opmerkingen;
    }

    public function setOpmerkingen($Opmerkingen)
    {
        $this->Opmerkingen = $Opmerkingen;
    }

    public function getEerlijkIngevuld()
    {
        return $this->EerlijkIngevuld;
    }

    public function setEerlijkIngevuld($EerlijkIngevuld)
    {
        $this->EerlijkIngevuld = $EerlijkIngevuld;
    }
}