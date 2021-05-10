<?php

namespace Webkul\User\Repositories;

use Webkul\Core\Eloquent\Repository;

class AddressRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\User\Contracts\Address';
    }
}