<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class CustomersTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example, MUST write below line
     *  @test
     * @return void
     */
    public function only_logged_in_users_can_see_the_customers_list()
    {
        $response = $this->get('/customers')
            ->assertRedirect('/login');
    }

    /**
     * A basic test example, MUST write below line
     *  @test
     * @return void
     */
    public function authenticated_users_can_see_the_customers_list()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/customer')
            ->assertOk();
    }
}
