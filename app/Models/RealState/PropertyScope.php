<?php

namespace App\Models\RealState;

use App\Models\User\User;
use App\Models\RealState\Property;
use App\Models\RealState\UserProperty;

trait PropertyScope
{

    public static function scopeByFilters($query, $filters)
    {
        $price = $filters['price'] ?? null;
        $start = $filters['start'] ?? null;
        $limit = $filters['limit'] ?? null;
        $search = $filters['search'] ?? null;
        $cities = $filters['ciites'] ?? null;
        $types = $filters['types'] ?? null;

        return $query->when($price, function ($q) use ($price) {
            $q->priceRange($price);
        })->when($start, function ($q) use ($start) {
            $q->skip($start);
        })->when($limit, function ($q) use ($limit) {
            $q->take($limit);
        })->when($search, function ($q) use ($search) {
            $q->search($search);
        })->when($cities, function ($q) use ($cities) {
            $q->whereIn('city_id',$cities);
        })->when($types, function ($q) use ($types) {
            $q->whereIn('type_id', $types);
        });
    }

    public static function scopePriceRange($query, $priceRange)
    {
        return $query->whereBetween('price', [$priceRange['from'], $priceRange['to']]);
    }

    public static function scopeSearch($query, $search){
        return $query->where('title', 'like', '%'.$search.'%');
    }
}
