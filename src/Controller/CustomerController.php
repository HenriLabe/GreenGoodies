<?php

namespace App\Controller;

use App\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Attribute\CurrentUser;


class CustomerController extends AbstractController
{
    #[Route('/', name: 'app_root')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_customer_login');
    }

    #[Route(path: '/login', name: 'app_customer_login')]
    public function login(AuthenticationUtils $authenticationUtils, #[CurrentUser] ?Customer $user): Response
    {
        if ($user) {
            return $this->redirectToRoute('app_products');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
// if ($this->isGranted('IS_AUTHENTICATED', $customer)) {
//
//        }

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
