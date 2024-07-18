<?php

namespace App\Models\User;

use App\Models\User\User;
use App\Models\RealState\Property;
use App\Models\RealState\UserProperty;

trait UserRelation
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_property')->using(UserProperty::class);
    }
}
