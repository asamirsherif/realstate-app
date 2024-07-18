<?php

namespace App\Models\User;

use App\Models\RealState\Property;
use App\Models\RealState\UserProperty;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait UserRelation
{
    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'user_properties', 'user_id', 'property_id');
    }
}
