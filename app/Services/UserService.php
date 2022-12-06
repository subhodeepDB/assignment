<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Bouncer;

/**
 * @todo work in progress
 */
class UserService
{
    /**
     * Store user and assign role to user
     * @param requestvalidated $userData 
     * @return response $user
     */
    public function storeUser($userData)
    {   
        return DB::transaction(function () use ($userData) {

            $userData['name']       = $userData['name'];
            $userData['email']      = $userData['email'];
            $userData['password']   = Hash::make($userData['password']);
            
            // Create user
            $user                    = User::create($userData);

            // Assign role to user
            Bouncer::assign($userData['role'])->to($user);
            
            return $user;
        });
    }

    public function storeUserDetails($userData) {

        // UserDetails::create($userData);
    }

    public function getSellerList() 
    {
        return User::with('roles', 'userDetails')->whereHas( 'roles', function($query) {
            return $query->where('roles.name', 'seller');
        })->get();
    }

    public function getSellerDetails($id) 
    {
        return User::with('roles', 'userDetails')->whereHas( 'roles', function($query) {
            return $query->where('roles.name', 'seller');
        })->where('id', $id)->get();
    }
}
