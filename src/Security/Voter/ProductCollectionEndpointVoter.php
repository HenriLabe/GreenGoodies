<?php

namespace App\Security\Voter;

use App\Entity\Customer;
use App\Entity\Product;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\User\UserInterface;

final class ProductCollectionEndpointVoter extends Voter
{
    public const VIEW = 'POST_VIEW';

    protected function supports(string $attribute, mixed $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return $attribute === self::VIEW && $subject instanceof Product;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        /** @var Customer $user */
        $user = $token->getUser();
        if (!$user instanceof UserInterface) {
            return false;
        }
        if (!(self::VIEW === $attribute && $subject instanceof Product && $user->isApiEnabled())) {
            throw new AccessDeniedException('Access denied.');
        }
        return true;
    }


}
