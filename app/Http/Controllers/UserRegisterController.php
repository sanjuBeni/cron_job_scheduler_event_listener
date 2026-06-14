<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function register(Request $request)
    {

        $user = User::create([
            'name' => 'Test',
            'email' => 'test@ex.com',
            'password' => '123456'
        ]);

        UserRegistered::dispatch($user);

        return 'Registerd';
    }
}
