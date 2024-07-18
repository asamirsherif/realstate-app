<?php

namespace App\Models\RealState;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Attachment\Attachable;
use App\Models\Polymorphic\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{

    use AsSource,
    Attachable,
    Filterable;

    protected $table = 'property';
    protected $fillable = ['title', 'description', 'price', 'location','bedrooms','bathrooms','square_feet'];

    public function ScopeIsAvailable($query){
        return $query->whereHas('status',function($q){
            $q->where('status',Status::AVAILABLE);
        });
    }




}
