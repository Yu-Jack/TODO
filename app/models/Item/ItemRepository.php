<?php namespace Item\Repositories;

use User;
use Item;

class ItemRepository implements ItemRepositoryInterface{

    // method 1 of using php namespace 
    //protected $isSameId = '\Item\Validators\IsSameId';

    // method 2 of using php namespace 
    protected $isSameId = [
        '\Item\Validators\IsSameId'
    ];

    public function getOwnItem(User $user){

        return $user->items;
    }

    public function isOwnItem(Item $item, User $user){
        /**
         * method 1 for no array
         */
        // $validator = new $this->isSameId;
        // return $validator->validate($item, $user);


        foreach ($this->isSameId as $validator){

            return (new $validator)->validate($item, $user);

            // Maybe you can do this
            // $validator = new $validator;
            // return $validator->validate($item, $user);
        }

    }
}