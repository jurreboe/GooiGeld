<?php
namespace App;

class EmailBook 
{
    private $boek = ['bestuur'=> 'penningmeester@viakunst-utrecht.nl', 'aCo' => 'activiteitencomissie@viakunst-utrecht.nl'];
    public function getBoek()
    {
        return $this->boek;
    }

    public function opties()
    {
        $returnlist = [];
        foreach ($this->boek as $key => $value)
        {
            $returnlist[$key] = $key;
        }
        return $returnlist;
    }
}