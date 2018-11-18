<?php

namespace App\Controller;

use App\Entity\Usuario;

class RegisterController
{
    public function __invoke(Usuario $data)
    {
        return $data;
    }
}