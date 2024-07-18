<?php

namespace App\Models\User;

use App\Models\RealState\Property;
use App\Models\RealState\UserProperty;

trait UserRelation
{
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'user_property')->using(UserProperty::class);
    }
}
