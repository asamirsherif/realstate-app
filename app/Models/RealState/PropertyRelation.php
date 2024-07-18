<?php

namespace App\Models\RealState;

use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\State;
use App\Models\RealState\Property;
use App\Models\RealState\PropertyType;
use App\Models\RealState\UserProperty;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait PropertyRelation
{
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_properties', 'property_id', 'user_id')
                    ->using(UserProperty::class);
    }

    public function type(){
        return $this->belongsTo(PropertyType::class, 'type_id');
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state(){
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }
}
