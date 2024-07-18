<?php

namespace App\Http\Controllers\Api\V1\Location;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Location\LocationResource;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\State;
use Illuminate\Http\Request;


class LocationController extends ApiController
{
    public function listCountries(){
        return $this->handlePaginateResponse(LocationResource::collection(Country::paginate(10)));
    }

    public function listStates(){
        return $this->handlePaginateResponse(LocationResource::collection(State::paginate(10)));
    }

    public function listCities(){
        return $this->handlePaginateResponse(LocationResource::collection(City::paginate(10)));
    }
}
