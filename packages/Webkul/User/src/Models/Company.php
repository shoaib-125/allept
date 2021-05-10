<?php

namespace Webkul\User\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Product\Models\ProductProxy;
use Webkul\User\Contracts\Company as CompanyContract;
use Webkul\User\Models\Admin;


class Company extends Model implements CompanyContract
{
    protected $fillable = ['name','website','nef_tax_no','admin_id'];

    public function address()
    {
        return $this->morphOne(Address::class ,'model');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class , 'admin_id');
    }

}