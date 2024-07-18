<?php

namespace App\Models\RealState;

use App\Models\Polymorphic\Status;
use App\Models\RealState\PropertyScope;
use App\Models\RealState\PropertyRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Property extends Model
{

    use AsSource,
    Attachable,
    Filterable,
    PropertyRelation,
    PropertyScope;

    protected $table = 'property';

    protected $fillable = ['title', 'description', 'price', 'longitude','latitude','bedrooms','bathrooms','square_feet','type_id','city_id','country_id','state_id'];

    public function ScopeIsAvailable($query){
        return $query->whereHas('status',function($q){
            $q->where('status',Status::AVAILABLE);
        });
    }




}
