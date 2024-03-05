<?php

namespace App\Http\Controllers;

use App\Actions\Image\CreateImageAction;
use App\Enums\ShowScopeEnum;
use App\Http\Requests\Image\StoreImageRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ImageResource;
use App\Models\Comment;
use App\Models\Image;
use App\Repositories\Images\ImageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ImageController extends Controller
{
    public function __construct(

    )
    {
        $this->middleware(["auth", "verified"]);
//        $this->authorizeResource(Image::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ImageRepositoryInterface $repository)
    {
        $scopes = [];
        $scopeEnum = ShowScopeEnum::cases();
        foreach ($scopeEnum as $scope){
           $scopes[] = [$scope->value, $scope->label()];
        }
//        dd($scopes);
        $images = ImageResource::collection($repository->get());
        return Inertia::render("Images", compact(["images", "scopes"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        $image = CreateImageAction::run($request->validated());
        return redirect("/images");
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        $image = ImageResource::make($image);
        $comments = Comment::query()
            ->mine()
            ->where("image_id", $image->id)->get();
        $comments = CommentResource::collection($comments);
        $user = Auth::user();

        return Inertia::render("ImageShow", compact(["image", "comments", "user"]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
