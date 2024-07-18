<?php

namespace App\Services\Property;

use App\Models\RealState\Property;
use App\Models\RealState\UserProperty;
use Exception;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User\User;

class PropertyService
{
    public function createProperty($data)
    {
        try {
            DB::beginTransaction();
            $property = Property::create($data);
            $user = User::find($data['user_id']);
            $user->properties()->sync([$property->id]);
            DB::commit();
            return $property;
        } catch (Exception $e){
            Log::error($e);
            DB::rollback();
        }


    }

    public function updateProperty($property, $data)
    {
        try {
            DB::beginTransaction();
            $property->fill($data)->save();
            DB::commit();
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
