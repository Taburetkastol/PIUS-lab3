<?php

use App\Models\Band;

uses(Tests\TestCase::class);

test('create band', function () {
    $attributes = Band::factory()->raw();
    $response = $this->postJson('/api/v1/bands', $attributes);
    $response->assertStatus(200);
    $this->assertDatabaseHas('bands', $attributes);
});

test('get band', function () {
    $band = Band::factory()->create();

    $response = $this->getJson("/api/v1/bands/{$band->id}");

    $data = [
        'data' => [
            'id' => $band->id,
            'name' => $band->name,
            'genre' => $band->genre,
            'created_at' => $band->created_at,
            'breakdown_at' => $band->breakdown_at,
        ],
        'errors' => [
            
        ],
        'meta' => [

        ]
    ];

    $response->assertStatus(200)->assertJson($data);
});


test('put band', function () {
    $band = Band::factory()->create();
    $updatedBand = ['name' => 'Put Band'];
    $response = $this->putJson("/api/v1/bands/{$band->id}", $updatedBand);
    $response->assertStatus(200);
    $this->assertDatabaseHas('bands', $updatedBand);
});

test('patch band', function () {
    $band = Band::factory()->create();
    $updatedBand = ['name' => 'Patch Band'];
    $response = $this->patchJson("/api/v1/bands/{$band->id}", $updatedBand);
    $response->assertStatus(200);
    $this->assertDatabaseHas('bands', $updatedBand);
});

test('delete band', function () {
    $band = Band::factory()->create();
    $response = $this->deleteJson("/api/v1/bands/{$band->id}");
    $response->assertStatus(200);
});

test('get failed band', function () {
    $band = Band::factory()->create();

    $response = $this->getJson("/api/v1/bands/asdf");

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