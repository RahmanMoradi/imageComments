<?php

namespace App\Policies;

use App\Enums\RolesEnum;
use App\Enums\ShowScopeEnum;
use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ImagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasRole(RolesEnum::SUPER_ADMIN) or $user->hasRole(RolesEnum::ADMIN))
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Image $image): bool
    {
        if ($user->hasRole(RolesEnum::ADMIN->value)) {
            return true;
        } elseif ($user->hasRole(RolesEnum::WRITER->value) && $image->scope == ShowScopeEnum::WRITERS) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Image $image): bool
    {
        if ($user->hasRole(RolesEnum::ADMIN) && $image->scope == ShowScopeEnum::WRITERS) {
            return true;
        }
        elseif ($user->id == $image->user_id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Image $image): bool
    {
        if ($user->hasRole(RolesEnum::ADMIN) && $image->scope == ShowScopeEnum::WRITERS) {
            return true;
        }
        elseif ($user->id == $image->user_id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Image $image): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Image $image): bool
    {
        //
    }
}
