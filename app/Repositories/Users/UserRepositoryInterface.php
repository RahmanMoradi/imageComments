<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getModel(): User;
}
