<?php

namespace Webkul\User\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Product\Models\ProductProxy;
use Webkul\User\Contracts\Company as CompanyContract;
use Webkul\User\Models\Address;


class Company extends Model implements CompanyContract
{
    protected $fillable = ['name','website','documents_path'];

    public function address()
    {
        return $this->morphOne(Address::class , 'address_of');
    }

}