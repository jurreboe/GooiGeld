<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class succesController
{
     /**
     * @Route("/Succes!")
      */
    public function new()
    {
        return new Response(
            '<html><body>Uw Verzoek is verzonden!</body></html>'
        );
    }
}