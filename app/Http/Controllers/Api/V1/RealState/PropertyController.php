<?php

namespace App\Http\Controllers\Api\V1\RealState;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyUpdateRequest;
use App\Http\Requests\V1\Property\PropertyCreateRequest;
use App\Http\Requests\V1\Property\PropertyIndexRequest;
use App\Http\Resources\V1\Property\PropertyResource;
use App\Http\Resources\V1\Property\PropertyTypeResource;
use App\Models\RealState\Property;
use App\Models\RealState\PropertyType;
use App\Services\Property\PropertyService;
use Illuminate\Http\Request;
use PhpParser\Builder\Property as BuilderProperty;

class PropertyController extends ApiController
{
    private $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
        $this->middleware(['auth:api'])->only(['store','update','delete']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(PropertyIndexRequest $request)
    {
        $query = Property::query()
                        ->byFilters($request->all());
        return $this->handleResponseWithCount(PropertyResource::collection($query->get()), $query->count());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyCreateRequest $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);
        $this->propertyService->createProperty($request->all());
        return $this->handleResponseMessage('Property Created Successfuly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $listing)
    {
        return $this->handleResponse(new PropertyResource($listing));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyUpdateRequest $request, Property $listing)
    {
        $property = $this->propertyService->updateProperty($listing, $request->all());
        return $this->handleResponse(new PropertyResource($property));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $listing)
    {
        $this->propertyService->deleteProperty($listing->id);
        return $this->handleResponseMessage('Property Deleted Successfully! ');
    }

    public function listPropertyTypes()
    {
        $types = PropertyType::all();
        return $this->handleResponse(PropertyTypeResource::collection($types));
    }
}
