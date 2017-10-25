<?php

namespace App\Http\Controllers\Api;

use App\Dweet;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class DweetController extends Controller
{
    public function index(Request $request)
    {
        $dweet = Dweet::find($request->id);
        return response([
            'user' => $dweet->user,
            'dweet' => $dweet
        ]);
    }

    public function store(Request $request)
    {
        /** @var User $user */
        $user = $request->user();
        $dweet = $user->dweet()->create(['text'=>$request->dweet]);
        return response(['user'=>$user, 'dweet' => $dweet]);
    }
}
