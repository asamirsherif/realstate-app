<?php

namespace App\Models\RealState;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProperty extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = ['user_id','property_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the property that owns the user property.
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
