<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

use App\Category;
use App\User;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('create categories')
            ? Response::allow()
            : Response::deny('User is not allowed to view categories');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create categories')
            ? Response::allow()
            : Response::deny('User is not allowed to create categories');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function update(User $user, Category $category)
    {
        return $user->hasPermissionTo('edit categories')
            ? Response::allow()
            : Response::deny('User is not allowed to edit or update categories');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return $user->hasPermissionTo('delete categories')
            ? Response::allow()
            : Response::deny('User is not allowed to delete categories');
    }
}
