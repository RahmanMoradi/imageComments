<?php

namespace App\Actions\Image;

use App\Models\Image;
use App\Repositories\Images\ImageRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateImageAction
{
    use AsAction;

    public function __construct(
        private readonly ImageRepositoryInterface $repository,
    )
    {
    }

    public function handle($payload): Image | null
    {
        return DB::transaction(function () use ($payload) {
            $payload['user_id'] = auth()->id();
            $blog = $this->repository->store($payload);
            if (request()?->hasFile('media')) {
                $blog->addMediaFromRequest('media')
                    ->toMediaCollection('blog');

            return $blog;
            }
            abort(403);
        });
    }
}
