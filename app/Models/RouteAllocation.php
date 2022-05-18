<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteAllocation extends Model
{
    use HasFactory;

    protected $fillable = [ 'sales_manager_id', 'sales_rep_id', 'route_id', 'start_date', 'end_date', 'status' ];

    public function route(){
        return $this->belongsTo(Route::class);
    }
}
