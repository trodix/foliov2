<?php

namespace App\Service;

use App\Service\Provider\SocietyAdminProvider;

class GlobalService
{

    private $societyAdminProvider;

    public function __construct(SocietyAdminProvider $societyAdminProvider){

        $this->societyAdminProvider = $societyAdminProvider;

    }

    public function getSociety() {
        return $this->societyAdminProvider->getOneById(1);
    }

}