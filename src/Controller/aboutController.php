<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class aboutController extends AbstractController
{
    /**
     * @Route ("/About", name="about")
     * @return Response
     */

    public function index(): Response
    {

        return $this->render('home/Pages/about.html.twig', [
            'controller_name' => 'aboutController',
        ]);
    }
}