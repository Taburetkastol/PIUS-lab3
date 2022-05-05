<?php

use App\Models\Membership;

uses(Tests\TestCase::class);

test('create membership', function () {
    $attributes = Membership::factory()->raw();
    $response = $this->postJson('/api/v1/membership', $attributes);
    $response->assertStatus(200);
    $this->assertDatabaseHas('membership', $attributes);
});

test('get membership', function () {
    $membership = Membership::factory()->create();

    $response = $this->getJson("/api/v1/membership/{$membership->id}");

    $data = [
        'data' => [
            'id' => $membership->id,
            'musician_id' => $membership->musician_id,
            'band_id' => $membership->band_id,           
        ],
        'errors' => [
            
        ],
        'meta' => [

        ]
    ];

    $response->assertStatus(200)->assertJson($data);
});

test('put membership', function () {
    $membership = Membership::factory()->create();
    $updatedMembership = ['musician_id' => Membership::inRandomOrder()->first()->musician_id];
    $response = $this->putJson("/api/v1/membership/{$membership->id}", $updatedMembership);
    $response->assertStatus(200);
    $this->assertDatabaseHas('membership', $updatedMembership);
});

test('patch membership', function () {
    $membership = Membership::factory()->create();
    $updatedMembership = ['musician_id' => Membership::inRandomOrder()->first()->musician_id];
    $response = $this->patchJson("/api/v1/membership/{$membership->id}", $updatedMembership);
    $response->assertStatus(200);
    $this->assertDatabaseHas('membership', $updatedMembership);
});

test('delete membership', function () {
    $membership = Membership::factory()->create();
    $response = $this->deleteJson("/api/v1/membership/{$membership->id}");
    $response->assertStatus(200);
});

test('get failed membership', function () {
    $membership = Membership::factory()->create();

    $response = $this->getJson("/api/v1/membership/asdf");

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