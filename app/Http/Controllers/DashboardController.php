<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function __construct(protected UserService $userService)
    { 

    }

    public function index() {

        // $userData = Auth::user();
        if(request()->user()->isA('seller')) {
            return view('dashboard');
        } else {
            $users = $this->userService->getSellerList();
            // dd($user);
            return view('list', ['users' => $users]);
            // dd('list');
        }
    }

    public function store(Request $request) 
    {    
        $user = User::find($request->user_id);

        UserDetails::create([
            'description' => $request->description,
            'user_id'     => $request->user_id,
            'price'       => $request->price
        ]);

        $user->addMedia($request->file)
            ->usingFileName(Str::random() . '.png')
            ->toMediaCollection('profile-image');

        return redirect('dashboard');
    }

    public function show($id)
    {
        $userDetails = $this->userService->getSellerDetails($id);
        dd($userDetails);
    }
}
