<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(protected UserService $userService) {}

    public function store(RegisterRequest $request) {
        // dd('sfsfsdaf');
        $data = $this->userService->storeUser($request->validated());
        
        if(!$data) {
            return redirect('register');
        } else {
            dd('Success');
        }
    }
}
