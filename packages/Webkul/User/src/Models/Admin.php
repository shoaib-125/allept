<?php

namespace Webkul\User\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Webkul\User\Models\Role;
use Webkul\User\Notifications\AdminResetPassword;
use Webkul\User\Contracts\Admin as AdminContract;
use Webkul\User\Models\Company;
use Webkul\User\Models\Driver;


class Admin extends Authenticatable implements AdminContract
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'api_token',
        'role_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'api_token',
        'remember_token',
    ];

    /**
     * Get the role that owns the admin.
     */
    public function role()
    {
        return $this->belongsTo(RoleProxy::modelClass());
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPassword($token));
    }

    /**
     * Checks if admin has permission to perform certain action.
     *
     * @param String $permission
     * @return Boolean
     */
    public function hasPermission($permission)
    {
        if ($this->role->permission_type == 'custom' && !$this->role->permissions) {
            return false;
        }

        return in_array($permission, $this->role->permissions);
    }

    // For Add the Address of Admin / User ..
    public function address()
    {
        return $this->morphOne(Address::class, 'model');
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'admin_id');
    }

    public function driver()
    {
        return $this->hasOne(Driver::class, 'admin_id');
    }

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = Hash::make($password);
    }

    // create
    public function scopeCreateAdmin($query, $data)
    {
        $data['role_id'] = Role::where('name', mb_strtolower($data['role_name']))->pluck('id')->first();

        $user = Admin::create(Arr::only($data, ['name', 'email', 'password', 'role_id', 'status']));

        // removing name for company name duplications
        unset($data['name']);

        // user address
        $user->address()->create($data);

        // if role is whole seller
        if (mb_strtolower($data['role_name']) == 'whole seller')
        {
            if ( !empty($data['company_name']) ) {
                $data['name'] = $data['company_name'];
                $company = $user->company()->create(Arr::only($data, ['name', 'website', 'nef_tax_no']));

                $companyAddress = [
                    'address' => $data['company_address'],
                    'city' => $data['company_city'],
                    'country' => $data['company_country'],
                ];

                $company->address()->create($companyAddress);
            }

        } elseif (mb_strtolower($data['role_name']) == 'driver') {
            $driver = $user->driver()->create(Arr::only($data, ['vehicle_name', 'vehicle_no']));
            $driverAddress = [
                'address' => $data['working_area'],
                'city' => $data['working_city'],
                'country' => $data['working_country'],
            ];
            $driver->address()->create($driverAddress);
        }

        return $user;
    }

    // update
    public function scopeUpdateAdmin($query, $data, $id)
    {
        $data['role_id'] = Role::where('name', mb_strtolower($data['role_name']))->pluck('id')->first();

        // Find User For Edit..
        $user = Admin::findOrFail($id);

        //  Update User Information...
        $user->Update(Arr::only($data, ['name', 'email', 'password', 'role_id', 'status']));

        // removing name for company name duplications
        unset($data['name']);

        // Find User For Edit..
        $user->address()->update(Arr::only($data, ['address', 'city', 'country']));

        // if role is whole seller
        if (mb_strtolower($data['role_name']) == 'whole seller') {

            $data['name'] = $data['company_name'];

        // Find Company Of This User ..
            $userCompany = $user->company()->first();

        // Update The Company Information
            $company = $userCompany->update(Arr::only($data, ['name', 'website', 'nef_tax_no']));
            $companyAddress = [
                'address' => $data['company_address'],
                'city' => $data['company_city'],
                'country' => $data['company_country'],
            ];

            // Update Company Address Of This User after Find The Company....
            $userCompany->address()->update($companyAddress);

        }
        elseif (mb_strtolower($data['role_name']) == 'driver') {

            //  Find Company Of This User ..
            $driver = $user->driver()->first();

            // Update The driver Information
            $user->driver()->update(Arr::only($data, ['vehicle_name', 'vehicle_no']));

            $driverAddress = [
                'address' => $data['working_area'],
                'city' => $data['working_city'],
                'country' => $data['working_country'],
            ];

            //  Update driver Address Of This User after Find The driver....
            $driver->address()->update($driverAddress);

        }

        return $user;
    }

}