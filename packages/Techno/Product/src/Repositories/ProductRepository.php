<?php

namespace Techno\Product\Repositories;

use Webkul\Core\Eloquent\Repository;

class ProductRepository extends \Webkul\Product\Repositories\ProductRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Techno/Product/Contracts/Product';
    }

    public function create(array $data)
    {
        $parent = parent::create($data);

        dd($parent);
    }
}