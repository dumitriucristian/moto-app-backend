<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Osteel\OpenApi\Testing\ValidatorBuilder;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testBasicTest()
    {
        $response = $this->get('/api/test');

        $validator = ValidatorBuilder::fromYaml(storage_path('api-docs/api-docs.yaml'))->getValidator();

        $result = $validator->validate($response->baseResponse, '/test', 'get');

        $this->assertTrue($result);
    }
}
