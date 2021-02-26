<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Business;

class EndpointsTest extends TestCase
{
   
    public function testGetBusinesses()
    {
        $response = $this->get('/api/get-businesses');
        $response->assertStatus(200);
    }

    public function testGetBusinessesPaginated()
    {
        $response = $this->get('/api/get-businesses/5?page=1');
        $response->assertStatus(200);
    }

    public function testGetBusiness()
    {
        $response = $this->get('/api/get-business/1');
        $response->assertStatus(200);
    }

    public function testStoreBusiness()
    {
        $response = $this->post('/api/store-business?business_name=silver&price=3500000&city=Edmonton');
        $response->assertStatus(200);
    }

    public function testUpdateBusiness()
    {
        $start_price = 0;
        $response = $this->put('/api/update-business/1?business_name=deli&price=3500000&city=Edmonton');
        $response->assertStatus(200);
    }

    public function testDeleteBusiness()
    {
        $last_business = Business::latest()->first()->id;
        $response = $this->delete('/api/delete-business/' . $last_business);
        $response->assertStatus(200);
    }

}
