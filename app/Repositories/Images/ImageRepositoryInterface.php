<?php

namespace App\Repositories\Images;

use App\Models\Image;
use App\Repositories\BaseRepositoryInterface;

interface ImageRepositoryInterface extends BaseRepositoryInterface
{
    public function getModel(): Image;
}
