<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventsCanBeFilteredTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('api/V1/events');
        $response->assertStatus(200);
    }

    public function test_events_exist()
    {
        Event::factory(2)->create([
            'user_id' => User::factory(),
            'status' => 'published',
        ]);
        Event::factory(2)->create([
            'user_id' => User::factory(),
            'status' => 'unpublished',
        ]);
        $response = $this->get('api/V1/events');
        $this->assertEquals(4, $response->original->count());
        }


    public function test_filter_published_events()
    {
        Event::factory(2)->create([
            'user_id' => User::factory(),
            'status' => 'published',
        ]);
        Event::factory(2)->create([
            'user_id' => User::factory(),
            'status' => 'unpublished',
        ]);


        $response = $this->get('api/V1/events?status[eq]=published');
        $this->assertEquals(2, $response->original->count());
    }

    public function test_random_params_should_be_ignore(){
        Event::factory(2)->create([
            'user_id' => User::factory(),
            'status' => 'published',
        ]);
        Event::factory(2)->create([
            'user_id' => User::factory(),
            'status' => 'unpublished',
        ]);


        $response = $this->get('api/V1/events?status[eq]=published&zzzz[*]=5');
        $this->assertEquals(2, $response->original->count());
    }
}
