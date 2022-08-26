<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title','logo','company','location','website','email','tags','description'];

    public function scopeFilter($query,$filters){
        if($filters['tag'] ?? false){
            $query->where('tags','like','%'.$filters['tag'].'%');
        }

        if($filters['search'] ?? false){
            $query
                ->where('title','like','%'.$filters['search'].'%')
                ->orWhere('description','like','%'.$filters['search'].'%')
                ->orWhere('tags','like','%'.$filters['search'].'%');
        }

    }
}
