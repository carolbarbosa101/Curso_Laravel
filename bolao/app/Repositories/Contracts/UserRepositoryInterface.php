<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function all();
    public function paginate(int $paginate = 10);
}