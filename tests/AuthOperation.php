<?php
namespace Tests;
use App\Models\User;

trait AuthOperation{

    public $user;

    public function getSignedInUser(){

        // Create User
        $this->user = User::factory()->create();

        //Login User
        $this->actingAs($this->user)->post('login', [
            "email" => $this->user->email,
            "password" => 'password',
        ]);

        $this->assertAuthenticated();
    }

}
