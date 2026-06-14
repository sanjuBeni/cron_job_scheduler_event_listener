<?php

namespace App\Http\Controllers;

use App\Events\OrdersEvent\OrderPlacedEvent;
use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function register(Request $request)
    {

        $user = User::create([
            'name' => 'Test3',
            'email' => 'test3@ex.com',
            'password' => '123456',
            'phone_number' => '1234567890'
        ]);

        UserRegistered::dispatch($user);

        return 'Registerd';
    }

    public function order(Request $request)
    {
        // add order in database
        // OrderPlacedEvent::dispatch($order);
    }
}
