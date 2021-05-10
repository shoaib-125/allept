<?php

namespace Webkul\User\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \Webkul\User\Models\Admin::class,
        \Webkul\User\Models\Role::class,
        \Webkul\User\Models\Address::class,
        \Webkul\User\Models\Company::class,
        \Webkul\User\Models\Driver::class,
    ];
}