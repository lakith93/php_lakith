<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesRepresentative extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [ 'route_id', 'manager_id', 'name', 'email', 'telephone', 'joined_date', 'comments'];

    public function manager(){
        return $this->belongsTo(User::class);
    }

    public function route(){
        return $this->belongsTo(Route::class);
    }
}
