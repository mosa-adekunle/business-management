<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Business;

class BusinessController extends Controller
{    
    
    /**
     * Returns a information on all businesses
     *
     * @param Business $business
     * @return Response
     */
    public function getBusinesses(Business $business): Response
    {        
        $response = new Response();
        $response->setContent(
            json_encode(
                Business::all(),
                JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES,
                512
            )
        );
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    
    
    /**
     * Returns a information on a business with id provided
     *
     * @param Business $business
     * @param integer $business_id
     * @return Response
     */
    public function getBusiness(Business $business, int $business_id): Response
    {
        $response = new Response();
        $response->setContent(
            json_encode(
                Business::find($business_id),
                JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES,
                512
            )
        );
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    /**
     * Saves a new business
     *
     * @param Business $business
     * @param Request $request
     * @return Response
     */
    public function storeBusiness(Business $business, Request $request): Response
    {
        $result = 0;
        $business->business_name = $request->business_name;
        $business->price = $request->price;
        $business->city = $request->city;
        if($business->save()) $result = 1;
        
        $response = new Response();
        $response->setContent(
            json_encode(
                $result,
                JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES,
                512
            )
        );
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    /**
     * Updates a business
     *
     * @param Request $request
     * @param integer $business_id
     * @return Response
     */
    public function updateBusiness(Request $request, int $business_id): Response
    {
        $result = 0;
        $business = Business::find($business_id);
        
        if($business){
            $business->business_name = $request->business_name;
            $business->price = $request->price;
            $business->city = $request->city;
            if($business->save()) $result = 1;
        }

        $response = new Response();
        $response->setContent(
            json_encode(
                $result,
                JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES,
                512
            )
        );
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    /**
     * Deletes a business
     *
     * @param Request $request
     * @param integer $business_id
     * @return Response
     */
    public function deleteBusinesses(Request $request, int $business_id): Response
    {
        
        $result = 0;
        $business = Business::find($business_id);
        
        if($business->delete()){
            $result = 1;
        }

        $response = new Response();
        $response->setContent(
            json_encode(
                $result,
                JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES,
                512
            )
        );
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

}
