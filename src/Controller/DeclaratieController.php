<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DeclaratieController extends AbstractController
{
     /**
     * @Route("/Declaratie/invoeren")
      */
    public function number()
    {
        $number = random_int(0, 100);

       return $this->render('declaratieform/number.html.twig', [
            'number' => $number,
        ]);
    }
}