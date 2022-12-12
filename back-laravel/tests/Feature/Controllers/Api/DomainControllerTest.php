<?php

namespace Tests\Feature\Controllers\Api;

use App\Models\Domain;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;

class DomainControllerTest extends TestCase
{
    use RefreshDatabase;

    private Collection $domains;

    public function setUp(): void
    {
        parent::setUp();

        $this->domains = Domain::factory(3)
            ->create();
    }

    public function test_it_should_return_all_domains()
    {
        $this->getJson(route('domain.index'))
            ->assertExactJson([
                $this->domains[0]->only('id', 'name', 'tld'),
                $this->domains[1]->only('id', 'name', 'tld'),
                $this->domains[2]->only('id', 'name', 'tld'),
            ]);
    }

    public function test_it_should_store_a_new_domain()
    {
        $data = [
            'name' => fake()->domainName(),
            'tld' => fake()->tld()
        ];

        $this->post(route('domain.store', $data))
            ->assertStatus(200);

        $this->assertDatabaseCount('domains', 4);
    }

    public function test_it_should_retrieve_the_domain_to_edit()
    {
        $expectedDomain = $this->domains->last();

        $response = $this->getJson(route('domain.edit', ['domain' => $expectedDomain->id]))
            ->assertStatus(200);

        $response->assertJsonFragment(['id' => $expectedDomain->id]);
    }

    public function test_it_should_update_domain()
    {
        $expectedDomain = $this->domains->first();

        $newData = [
            'name' => fake()->domainName(),
            'tld' => fake()->tld()
        ];

        $this->put(route('domain.update', ['domain' => $expectedDomain]), $newData)
            ->assertStatus(200);

        $this->assertDatabaseHas('domains', [
            'id' => $expectedDomain->id,
            'name' => data_get($newData, 'name'),
            'tld' => data_get($newData, 'tld')
        ]);
    }

    public function test_it_should_delete_domain()
    {
        $expectedDeleteDomain = $this->domains->last();

        $this->delete(route('domain.destroy', ['domain' => $expectedDeleteDomain->id]))
            ->assertStatus(200);

        $this->assertSoftDeleted($expectedDeleteDomain);
    }
}
