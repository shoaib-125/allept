<?php

namespace Webkul\User\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Product\Models\ProductProxy;
use Webkul\User\Contracts\Driver as DriverContract;
use Webkul\User\Models\Admin;

class Driver extends Model implements DriverContract
{
    protected $fillable =  ['vehicle_name','vehicle_no','admin_id'];

    public function address()
    {
        return $this->morphOne(Address::class , 'model');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class , 'admin_id');
    }
}