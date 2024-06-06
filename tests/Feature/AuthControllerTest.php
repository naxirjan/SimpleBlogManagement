<?php
namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Event\Code\Test;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_login_screen_can_be_rendered() {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }


    public function test_users_can_authenticate_using_the_login_screen() {
        // Create & Sign In User
        $this->getSignedInUser();
    }

}
