<?php

namespace App\Services\Property;

use App\Models\RealState\Property;
use App\Models\RealState\UserProperty;
use App\Models\Station\Station;
use Exception;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class StationService
 * @package App\Services
 */
class PropertyService
{
    public function createProperty($data)
    {
        try {
            DB::beginTransaction();
            $property = Property::create($data);
            UserProperty::create(['property_id' => $property->id,'user_id'=> $data->user_id]);
            DB::commit();
        } catch (Exception $e){
            Log::error($e);
            DB::rollback();
        }


    }

    public function updateProperty($property, $data)
    {
        try {
            // DB::beginTransaction();
            $property->fill($data)->save();
            // DB::commit();
            return Property::find($property->id);
        } catch (Exception $e){
            Log::error($e);
            DB::rollback();
        }
    }

    public function deleteProperty($id)
    {
        try {

            DB::beginTransaction();
            Property::find($id)->delete();
            DB::commit();

        } catch (Exception $e){
            Log::error($e);
            DB::rollback();
        }
    }
}
