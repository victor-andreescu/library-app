<?php

namespace App\Policies;

use App\User;
use App\Author;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthorPolicy
{
    use HandlesAuthorization;
    
    public function edit(User $user)
    {
        return $user->role->name === 'admin';        
    }
}
