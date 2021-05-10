<?php

namespace Techno\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Product\Models\ProductProxy;
use Techno\Product\Contracts\Product as ProductContract;

class Product extends Model implements ProductContract
{
    protected $fillable = [];
}