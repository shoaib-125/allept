<?php

namespace Webkul\User\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Product\Models\ProductProxy;
use Webkul\User\Contracts\Address as AddressContract;

class Address extends Model implements AddressContract
{
    protected $table = 'address';

    protected $fillable = [
        'address',
        'city',
        'country',
        'model_type_id',
        'model_type',
    ];

    public function address_of()
    {
        return $this->morphTo();
    }


}