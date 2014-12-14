<?php namespace Item\Validators;

use User;
use Item;

interface UserValidatorInterface
{
    public function validate(Item $item, User $user);
}