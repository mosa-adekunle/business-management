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
    public function getBusinesses(Business $business, int $number_of_records = 20): Response
    {

        
        $response = new Response();
        $response->setContent(
            json_encode(
                Business::paginate($number_of_records),
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
        if($this->businessDataValid($request)){
            $business->business_name = $request->business_name;
            $business->price = $request->price;
            $business->city = $request->city ?? "";               
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
     * Returns true if business data is valid, false if not valid
     *
     * @param Request $request
     * @return boolean
     */
    private function businessDataValid(Request $request): bool
    {        
        if(  ((float) $request->price >= 10000)  && ((float) $request->price <= 10000000) && (strlen($request->business_name) >= 10)  && (strlen($request->business_name) <= 50) ){
            return TRUE;            
        }
        return FALSE;
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
        
        if($this->businessDataValid($request)){
            if($business){
                $business->business_name = $request->business_name;
                $business->price = $request->price;
                $business->city = $request->city ?? "";    
                if($business->save()) $result = 1;
            }
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
