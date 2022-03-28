<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

class loginController extends AbstractController
{
    /**
     * @Route ("/login", name="login")
     * @return Response
     */

    public function login(AuthenticationUtils $authentification): Response
    {
        $lastusername = $authentification->getLastUsername();
        $error = $authentification->getLastAuthenticationError();
        return $this->render('home/Pages/login.html.twig', [
            'lastUsername' => $lastusername,
            'error' => $error
        ]);
    }
}
