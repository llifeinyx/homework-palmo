<?php

namespace App\Policies;

use App\Models\Form;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    use HandlesAuthorization;

    public function viewAny()
    {
        return true;
    }

    public function create()
    {
        return true;
    }

    public function update(User $user, Form $form)
    {
        return $user->id === $form->user->id;
    }

    public function delete(User $user, Form $form)
    {
        return $user->id === $form->user->id;
    }

    public function restore(User $user, Form $form)
    {
        //
    }

    public function forceDelete(User $user, Form $form)
    {
        //
    }
}
