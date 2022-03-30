<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class studentController extends AbstractController
{
    /**
     * @Route ("/Student", name="student")
     * @return Response
     */

    public function index(): Response
    {

        return $this->render('home/Pages/student.html.twig', [
            'controller_name' => 'studentController',
        ]);
    }
}