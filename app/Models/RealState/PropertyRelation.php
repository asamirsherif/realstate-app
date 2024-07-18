<?php

namespace App\Models\RealState;

use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\State;
use App\Models\RealState\Property;
use App\Models\RealState\PropertyType;
use App\Models\RealState\UserProperty;
use App\Models\User\User;

trait PropertyRelation
{
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_property')->using(UserProperty::class);
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
