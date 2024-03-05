<?php

namespace App\Repositories\Images;

use App\Enums\RolesEnum;
use App\Enums\ShowScopeEnum;
use App\Models\Image;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\QueryBuilder;

class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{
    public function __construct(Image $image)
    {
        parent::__construct($image);
    }

    public function getModel(): Image
    {
        return parent::getModel();
    }

    public function query(array $payload = []): Builder|QueryBuilder
    {
        return QueryBuilder::for(Image::class)
            ->when(auth()->user()?->hasRole(RolesEnum::WRITER->value), function (Builder $query){
                $query->where("scope", ShowScopeEnum::WRITERS);
            })
            ;

    }
}
