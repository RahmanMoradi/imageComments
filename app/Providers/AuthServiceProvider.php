<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Enums\RolesEnum;
use App\Models\Comment;
use App\Models\Image;
use App\Models\User;
use App\Policies\CommentPolicy;
use App\Policies\ImagePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Image::class => ImagePolicy::class,
        Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Implicitly grant "super-admin" role all permission checks using can()
        Gate::before(function ($user, $ability) {
            if ($user->hasRole(RolesEnum::SUPER_ADMIN->value)) {
                return true;
            }
        });
    }
}
