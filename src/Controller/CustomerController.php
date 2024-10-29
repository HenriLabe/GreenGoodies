<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class CustomerController extends AbstractController
{
    #[Route('/', name: 'app_root_route')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_customer_login');
    }

    #[Route(path: '/login', name: 'app_customer_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        if ($this->isGranted('IS_AUTHENTICATED', $this->getUser())) {
            return $this->redirectToRoute('app_products');
        }

        return $this->render('login/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route(path: '/logout', name: 'app_customer_logout')]
    public function logout(AuthenticationUtils $authenticationUtils)
    {
    }
}
