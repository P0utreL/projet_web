<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class contactController extends AbstractController
{
    /**
     * @Route ("/Contact", name="contact")
     * @return Response
     */

    public function index(): Response
    {

        return $this->render('home/Pages/contact.html.twig', [
            'controller_name' => 'contactController',
        ]);
    }
}