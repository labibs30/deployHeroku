<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'products';
    protected $guarded = ['id'];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    public function scopeFilter($query, array $filters)
    {
        // if (request('search')) {
        //     return $query->where('p_name', 'like', '%' . request('search') . '%')
        //         ->orWhere('p_description', 'like', '%' . request('search') . '%');
        // }
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('p_name', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('p_description', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('p_name', 'like', '%' . $search . '%')
                ->orWhere('p_description', 'like', '%' . $search . '%');
        });
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'p_name'
            ]
        ];
    }
}
