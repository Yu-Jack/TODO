<?php namespace Item\Repositories;

use User;
use Item;

interface ItemRepositoryInterface {

    public function getOwnItem(User $user);

    public function isOwnItem(Item $item, User $user);

}