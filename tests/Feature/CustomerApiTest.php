<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Customer;
use App\Models\City;

class CustomerApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_customers(): void
    {
        $city = City::factory()->create();
        Customer::factory()->count(5)->create(['city_id' => $city->id]);

        $response = $this->getJson('/api/customers');

        $response->assertOk()
                 ->assertJsonStructure(['data']);
    }

    /** @test */
    public function it_can_create_a_customer(): void
    {
        $city = City::factory()->create();

        $payload = [
            'name' => 'João Teste',
            'document' => '12345678901',
            'birth_date' => '1990-01-01',
            'sex' => 'M',
            'city_id' => $city->id,
            'state_id' => $city->state_id,
            'address' => 'Rua Exemplo, 123'
        ];

        $response = $this->postJson('/api/customers', $payload);

        $response->assertCreated();
        $this->assertDatabaseHas('customers', ['document' => '12345678901']);
    }

    /** @test */
    public function it_can_update_a_customer(): void
    {
        $city = City::factory()->create();
        $customer = Customer::factory()->create(['city_id' => $city->id]);

        $response = $this->putJson("/api/customers/{$customer->id}", [
            'name' => 'Nome Atualizado',
            'document' => $customer->document,
            'birth_date' => $customer->birth_date,
            'sex' => $customer->sex,
            'city_id' => $city->id,
            'state_id' => $city->state_id,
            'address' => 'Novo endereço'
        ]);

        $response->assertOk();
        $this->assertDatabaseHas('customers', ['name' => 'Nome Atualizado']);
    }

    /** @test */
    public function it_can_delete_a_customer(): void
    {
        $city = City::factory()->create();
        $customer = Customer::factory()->create(['city_id' => $city->id]);

        $response = $this->deleteJson("/api/customers/{$customer->id}");

        $response->assertNoContent();
        $this->assertDatabaseMissing('customers', ['id' => $customer->id]);
    }
}
