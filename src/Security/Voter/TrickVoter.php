<?php

namespace App\Security\Voter;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class TrickVoter extends Voter
{
    protected function supports(string $attribute, $trick): bool
    {
        return in_array($attribute, ['TRICK_MANAGE'])
            && $trick instanceof \App\Entity\Trick;
    }

    protected function voteOnAttribute(string $attribute, $trick, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case 'TRICK_MANAGE':
                // Only access if the user is also the trick author
                return $user == $trick->getUser();
                break;
        }

        return false;
    }
}
