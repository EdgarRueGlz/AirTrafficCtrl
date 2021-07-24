<?php

namespace Tests\Feature;

use App\Models\Aircraft;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use SebastianBergmann\FileIterator\Factory;
use Tests\TestCase;
use App\Http\Controllers\AircraftController;

class AircraftTest extends TestCase
{
    public function test_aircraft_create() {

        $response = $this->json('POST', '/api/aircrafts', ['model' => 'Boeing Test', 'type_id' => 1, 'size_id' => 2]);

        $response->assertStatus(201);
    }

    public function test_aircraft_update() {
        
        $type = rand(1,4);
        $size = rand(1,2);

        $response = $this->json('PUT', '/api/aircrafts/1', ['type_id' => $type, 'size_id' => $size]);

        $response->assertStatus(200);
    }
    
    public function test_aircraft_delete() {
        
        $aircraft = $this->json('POST', '/api/aircrafts', ['model' => 'Boeing Test', 'type_id' => 1, 'size_id' => 2]);
        
        $this->json('DELETE', '/api/aircrafts/' . $aircraft['id'], [], ['Accept' => 'application/json'])
              ->assertStatus(204);
    }
}
