<?php

use App\Models\Musician;

uses(Tests\TestCase::class);

test('create musician', function () {
    $attributes = Musician::factory()->raw();
    $response = $this->postJson('/api/v1/musicians', $attributes);
    $response->assertStatus(200);
    $this->assertDatabaseHas('musicians', $attributes);
});

test('get musician', function () {
    $musician = Musician::factory()->create();

    $response = $this->getJson("/api/v1/musicians/{$musician->id}");

    $data = [
        'data' => [
            'id' => $musician->id,
            'name' => $musician->name,
            'main_instrument' => $musician->main_instrument,
            'created_at' => $musician->created_at,            
        ],
        'errors' => [
            
        ],
        'meta' => [

        ]
    ];

    $response->assertStatus(200)->assertJson($data);
});

test('put musician', function () {
    $musician = Musician::factory()->create();
    $updatedMusician = ['name' => 'Put Musician'];
    $response = $this->putJson("/api/v1/musicians/{$musician->id}", $updatedMusician);
    $response->assertStatus(200);
    $this->assertDatabaseHas('musicians', $updatedMusician);
});

test('patch musician', function () {
    $musician = Musician::factory()->create();
    $updatedMusician = ['name' => 'Patch Musician'];
    $response = $this->patchJson("/api/v1/musicians/{$musician->id}", $updatedMusician);
    $response->assertStatus(200);
    $this->assertDatabaseHas('musicians', $updatedMusician);
});

test('delete musician', function () {
    $musician = Musician::factory()->create();
    $response = $this->deleteJson("/api/v1/musicians/{$musician->id}");
    $response->assertStatus(200);
});

test('get failed musician', function () {
    $musician = Musician::factory()->create();

    $response = $this->getJson("/api/v1/musicians/asdf");

    $data = [
        'data' => null,
        'errors' => [
            'code' => 500,
            'message' => 'INTERNAL SERVER EXCEPTION',
            'meta' => ''
        ],
        'meta' => [

        ]
    ];

    $response->assertStatus(500)->assertJson($data);
});