<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */

    public function login(Request $request, AuthenticationUtils $utils)
    {
        $error = $utils->getLastAuthenticationError();

        $lastUsername = $utils->getLastUserName();

        $auth_checker = $this->get('security.authorization_checker');

        if ($auth_checker->isGranted('ROLE_USER')) {
            return $this->render('welcome/welcome.html.twig', [
                'controller_name' => 'WelcomeController',
            ]);

        } else {
            return $this->render('security/login.html.twig', [
                'error' => $error,
                'last_username' => $lastUsername
            ]);
        }
    }

    /**
     * @Route("/logout", name="logout")
     */

    public function logout()
    {

    }

}
