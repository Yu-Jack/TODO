<?php namespace Item\Validators;

use User;
use Item;

class IsSameId implements UserValidatorInterface
{
    public function validate(Item $item, User $user)
    {
        return ( $item->owner_id == $user->id) ;
    }
}