<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class pilotController extends AbstractController
{
    /**
     * @Route ("/Pilot", name="pilot")
     * @return Response
     */

    public function index(): Response
    {

        return $this->render('home/Pages/pilot.html.twig', [
            'controller_name' => 'pilotController',
        ]);
    }
}