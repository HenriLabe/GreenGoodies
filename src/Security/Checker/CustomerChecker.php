<?php

namespace App\Security\Checker;

use App\Entity\Customer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccountExpiredException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class CustomerChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user): void
    {
        if (!$user instanceof Customer) {
            throw new CustomUserMessageAccountStatusException('Invalid Credentials', [], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function checkPostAuth(UserInterface $user): void
    {
        if (!$user instanceof Customer) {
            return;
        }

        if (!$user->isApiEnabled()) {
            // the message passed to this exception is meant to be displayed to the user
            throw new CustomUserMessageAccountStatusException('The API access is not enabled for this account', [], Response::HTTP_FORBIDDEN);
        }
    }
}