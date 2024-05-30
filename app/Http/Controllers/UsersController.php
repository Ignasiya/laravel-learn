<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

/**
 * @method authorize(string $string, string $class)
 */
class UsersController extends Controller
{
    public function index()
    {
        Gate::authorize('view-any', User::class);
        //Gate::authorize('view-users');
        return User::all();
    }

    public function show(User $user)
    {
        Gate::authorize('view', $user);
        return $user;
    }
}

