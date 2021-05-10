<accordian :title="'{{ __('admin::app.users.users.driver info') }}'" :active="true">
    <div slot="body">

        <div class="control-group" :class="[errors.has('vehicle_name') ? 'has-error' : '']">
            <label for="vehicle_name" class="required">{{ __('admin::app.users.users.vehicle_name') }}</label>
            <input type="text" v-validate="'required'" class="control" id="vehicle_name" name="vehicle_name"
                   {{-- For Edit The Driver --}}
                   value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'driver' ?  $user->driver->vehicle_name : "" }}"
                   value = "{{old('vehicle_name')}}"
                   data-vv-as="&quot;{{ __('admin::app.users.users.vehicle_name') }}&quot;"/>
            <span class="control-error" v-if="errors.has('vehicle_name')">@{{ errors.first('vehicle_name') }}</span>
        </div>

        <div class="control-group" :class="[errors.has('vehicle_no') ? 'has-error' : '']">
            <label for="vehicle_no" class="required">{{ __('admin::app.users.users.vehicle_no') }}</label>
            <input type="text" v-validate="'required'" class="control" id="vehicle_no" name="vehicle_no"
                   {{-- For Edit The Driver --}}
                   value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'driver' ?  $user->driver->vehicle_no : "" }}"
{{--                   End--}}
                   value = "{{old('vehicle_no')}}"
                   data-vv-as="&quot;{{ __('admin::app.users.users.vehicle_no') }}&quot;"/>
            <span class="control-error" v-if="errors.has('vehicle_no')">@{{ errors.first('vehicle_no') }}</span>
        </div>

        <div class="control-group" :class="[errors.has('working_area') ? 'has-error' : '']">
            <label for="working_area" class="required">{{ __('admin::app.users.users.working_area') }}</label>
            <input type="text" v-validate="'required'" class="control" id="working_area" name="working_area"
                   {{-- For Edit The Driver --}}
                   value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'driver' ?  $user->driver->address->address : "" }}"
{{--                   END--}}
                   value = "{{old('working_area')}}"
                   data-vv-as="&quot;{{ __('admin::app.users.users.working_area') }}&quot;"/>
            <span class="control-error" v-if="errors.has('working_area')">@{{ errors.first('working_area') }}</span>
        </div>

        <div class="control-group" :class="[errors.has('working_city') ? 'has-error' : '']">
            <label for="working_city" class="required">{{ __('admin::app.users.users.working_city') }}</label>
            <input type="text" v-validate="'required'" class="control" id="working_city" name="working_city"
                   {{-- For Edit The Driver --}}
                   value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'driver' ?   $user->driver->address->city : "" }}"
{{--                   END--}}
                   value = "{{old('working_city')}}"
                   data-vv-as="&quot;{{ __('admin::app.users.users.working_city') }}&quot;"/>
            <span class="control-error" v-if="errors.has('working_city')">@{{ errors.first('working_city') }}</span>
        </div>

        <div class="control-group" :class="[errors.has('working_country') ? 'has-error' : '']">
            <label for="working_country" class="required">{{ __('admin::app.users.users.working_country') }}</label>
            <input type="text" v-validate="'required'" class="control" id="working_country" name="working_country"
                   {{-- For Edit The Driver --}}
                   value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'driver' ? $user->driver->address->country : "" }}"
{{--                   End--}}
                   value = "{{old('working_country')}}"
                   data-vv-as="&quot;{{ __('admin::app.users.users.working_country') }}&quot;"/>
            <span class="control-error" v-if="errors.has('working_country')">@{{ errors.first('working_country') }}</span>
        </div>


        {{-- <div class="control-group" :class="[errors.has('driver-documents') ? 'has-error' : '']">
            <label for="driver-documents" class="required">{{ __('admin::app.users.users.driver-documents') }}</label>
            <input type="file" v-validate="'required'" name="driver-documents"

               value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'driver' ?  $user->company->name : "" }}"
            data-vv-as="&quot;{{ __('admin::app.users.users.driver-documents') }}&quot;"/>
            <span class="control-error" v-if="errors.has('driver-documents')">@{{ errors.first('driver-documents') }}</span>
        </div> --}}

    </div>
</accordian>



{{-- Without Required --}}
{{--
<accordian :title="'{{ __('admin::app.users.users.driver info') }}'" :active="true">
    <div slot="body">

        <div class="control-group" :class="[errors.has('vehicle_name') ? 'has-error' : '']">
            <label for="vehicle_name" class="required">{{ __('admin::app.users.users.vehicle_name') }}</label>
            <input type="text" class="control" id="vehicle_name" name="vehicle_name"
             value="{{ old('vehicle_name') }}"
            data-vv-as="&quot;{{ __('admin::app.users.users.vehicle_name') }}&quot;"/>
            <span class="control-error" v-if="errors.has('vehicle_name')">@{{ errors.first('vehicle_name') }}</span>
        </div>

        <div class="control-group" :class="[errors.has('vehicle_no') ? 'has-error' : '']">
            <label for="vehicle_no" class="required">{{ __('admin::app.users.users.vehicle_no') }}</label>
            <input type="text" class="control" id="vehicle_no" name="vehicle_no"
             value="{{ old('vehicle_no') }}"
            data-vv-as="&quot;{{ __('admin::app.users.users.vehicle_no') }}&quot;"/>
            <span class="control-error" v-if="errors.has('vehicle_no')">@{{ errors.first('vehicle_no') }}</span>
        </div>

        <div class="control-group" :class="[errors.has('working_area') ? 'has-error' : '']">
            <label for="working_area" class="required">{{ __('admin::app.users.users.working_area') }}</label>
            <input type="text" class="control" id="working_area" name="working_area"
             value="{{ old('working_area') }}"
            data-vv-as="&quot;{{ __('admin::app.users.users.working_area') }}&quot;"/>
            <span class="control-error" v-if="errors.has('working_area')">@{{ errors.first('working_area') }}</span>
        </div>

        <div class="control-group" :class="[errors.has('working_city') ? 'has-error' : '']">
            <label for="working_city" class="required">{{ __('admin::app.users.users.working_city') }}</label>
            <input type="text" class="control" id="working_city" name="working_city"
             value="{{ old('working_city') }}"
            data-vv-as="&quot;{{ __('admin::app.users.users.working_city') }}&quot;"/>
            <span class="control-error" v-if="errors.has('working_city')">@{{ errors.first('working_city') }}</span>
        </div>

        <div class="control-group" :class="[errors.has('working_country') ? 'has-error' : '']">
            <label for="working_country" class="required">{{ __('admin::app.users.users.working_country') }}</label>
            <input type="text" class="control" id="working_country" name="working_country"
             value="{{ old('working_country') }}"
            data-vv-as="&quot;{{ __('admin::app.users.users.working_country') }}&quot;"/>
            <span class="control-error" v-if="errors.has('working_country')">@{{ errors.first('working_country') }}</span>
        </div>


    </div>
</accordian> --}}