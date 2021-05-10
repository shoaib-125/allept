<accordian :title="'{{ __('admin::app.users.users.company info') }}'" :active="true">
    <div slot="body">

        <div class="control-group" :class="[errors.has('company_name') ? 'has-error' : '']">
            <label for="company_name" class="required">{{ __('admin::app.users.users.company_name') }}</label>
            <input type="text" v-validate="'required'"  class="control" id="company_name" name="company_name"
                     {{-- For Edit the Whole Seller --}}
                        value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'whole seller' ?  $user->company->name : "" }}"
                   {{-- End--}}
                   value="{{ old('company_name') }}"
            data-vv-as="&quot;{{ __('admin::app.users.users.company_name') }}&quot;"/>
            <span class="control-error" v-if="errors.has('company_name')">@{{ errors.first('company_name') }}</span>
        </div>

        <div class="control-group" :class="[errors.has('website') ? 'has-error' : '']">
            <label for="website" class="required">{{ __('admin::app.users.users.website') }}</label>
            <input type="text" v-validate="'required'" class="control" id="website" name="website"
                   {{-- For Edit the Whole Seller --}}
                   value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'whole seller' ?  $user->company->website : "" }}"
                   {{-- End--}}
                   value="{{ old('website') }}"
            data-vv-as="&quot;{{ __('admin::app.users.users.website') }}&quot;"/>
            <span class="control-error" v-if="errors.has('website')">@{{ errors.first('website') }}</span>
        </div>

        <div class="control-group" :class="[errors.has('nef_tax_no') ? 'has-error' : '']">
            <label for="nef_tax_no" class="required">{{ __('admin::app.users.users.nef_tax_no') }}</label>
            <input type="text" v-validate="'required'" class="control" id="nef_tax_no" name="nef_tax_no"
                   {{-- For Edit the Whole Seller --}}
                   value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'whole seller' ?  $user->company->nef_tax_no : "" }}"
                   {{--End--}}
                   value="{{ old('nef_tax_no') }}"
            data-vv-as="&quot;{{ __('admin::app.users.users.nef_tax_no') }}&quot;"/>
            <span class="control-error" v-if="errors.has('nef_tax_no')">@{{ errors.first('nef_tax_no') }}</span>
        </div>

        <div class="control-group" :class="[errors.has('company_address') ? 'has-error' : '']">
            <label for="company_address" class="required">{{ __('admin::app.users.users.company_address') }}</label>
            <input type="text" v-validate="'required'" class="control" id="company_address" name="company_address"
                   {{-- For Edit the Whole Seller --}}
                   value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'whole seller' ?  $user->company->address->address : "" }}"
                   {{--END--}}
                   value="{{ old('company_address') }}"
            data-vv-as="&quot;{{ __('admin::app.users.users.company_address') }}&quot;"/>
            <span class="control-error" v-if="errors.has('company_address')">@{{ errors.first('company_address') }}</span>
        </div>

        <div class="control-group" :class="[errors.has('company_city') ? 'has-error' : '']">
            <label for="company_city" class="required">{{ __('admin::app.users.users.company_city') }}</label>
            <input type="text" v-validate="'required'" class="control" id="company_city" name="company_city"
                   {{-- For Edit the Whole Seller --}}
                   value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'whole seller' ?  $user->company->address->city : "" }}"

                    {{--END--}}
                   value = "{{ old('company_city') }}"

            data-vv-as="&quot;{{ __('admin::app.users.users.company_city') }}&quot;"/>
            <span class="control-error" v-if="errors.has('company_city')">@{{ errors.first('company_city') }}</span>
        </div>

        <div class="control-group" :class="[errors.has('company_country') ? 'has-error' : '']">
            <label for="company_country" class="required">{{ __('admin::app.users.users.company_country') }}</label>
            <input type="text" v-validate="'required'" class="control" id="company_country" name="company_country"
                   {{-- For Edit the Whole Seller --}}
                   value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'whole seller' ?  $user->company->address->country : "" }}"
                    {{-- END--}}
                   value="{{ old('company_country') }}"

            data-vv-as="&quot;{{ __('admin::app.users.users.company_country') }}&quot;"/>
            <span class="control-error" v-if="errors.has('company_country')">@{{ errors.first('company_country') }}</span>
        </div>


        {{-- <div class="control-group" :class="[errors.has('documents') ? 'has-error' : '']">
            <label for="documents" class="required">{{ __('admin::app.users.users.documents') }}</label>
            <input type="file" v-validate="'required'" name="documents"

                        value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'whole seller' ?  $user->company->name : "" }}"

            data-vv-as="&quot;{{ __('admin::app.users.users.documents') }}&quot;"/>
            <span class="control-error" v-if="errors.has('documents')">@{{ errors.first('documents') }}</span>
        </div> --}}

    </div>

</accordian>


{{-- Without Required --}}


{{-- <accordian :title="'{{ __('admin::app.users.users.company info') }}'" :active="true">
    <div slot="body">

        <div class="control-group" :class="[errors.has('company_name') ? 'has-error' : '']">
            <label for="company_name" class="required">{{ __('admin::app.users.users.company_name') }}</label>
            <input type="text" value="{{ old('company_name') }}" v-validate="'required'" class="control" id="company_name" name="company_name" data-vv-as="&quot;{{ __('admin::app.users.users.company_name') }}&quot;"/>
            <span class="control-error" v-if="errors.has('company_name')">@{{ errors.first('company_name') }}</span>
        </div>

        <div class="control-group" :class="[errors.has('website') ? 'has-error' : '']">
            <label for="website" class="required">{{ __('admin::app.users.users.website') }}</label>
            <input type="text" class="control" id="website" name="website"

                        value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'whole seller' ?  $user->company->name : "" }}"

             value="{{ old('website') }}" data-vv-as="&quot;{{ __('admin::app.users.users.website') }}&quot;"/>
            <span class="control-error" v-if="errors.has('website')">@{{ errors.first('website') }}</span>

            @error('company_name')
            <div class="error">{{ $message }}</div>
            @enderror

        </div>

        <div class="control-group" :class="[errors.has('nef_tax_no') ? 'has-error' : '']">
            <label for="nef_tax_no" class="required">{{ __('admin::app.users.users.nef_tax_no') }}</label>
            <input type="text" class="control" id="nef_tax_no" name="nef_tax_no"


                        value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'whole seller' ?  $user->company->name : "" }}"


             value="{{ old('nef_tax_no') }}" data-vv-as="&quot;{{ __('admin::app.users.users.nef_tax_no') }}&quot;"/>
            <span class="control-error" v-if="errors.has('nef_tax_no')">@{{ errors.first('nef_tax_no') }}</span>

            @error('company_name')
            <div class="error">{{ $message }}</div>
            @enderror

        </div>

        <div class="control-group" :class="[errors.has('company_address') ? 'has-error' : '']">
            <label for="company_address" class="required">{{ __('admin::app.users.users.company_address') }}</label>
            <input type="text" class="control" id="company_address" name="company_address"

                        value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'whole seller' ?  $user->company->name : "" }}"

             value="{{ old('company_address') }}" data-vv-as="&quot;{{ __('admin::app.users.users.company_address') }}&quot;"/>
            <span class="control-error" v-if="errors.has('company_address')">@{{ errors.first('company_address') }}</span>

            @error('company_name')
            <div class="error">{{ $message }}</div>
            @enderror

        </div>

        <div class="control-group" :class="[errors.has('company_city') ? 'has-error' : '']">
            <label for="company_city" class="required">{{ __('admin::app.users.users.company_city') }}</label>
            <input type="text" class="control" id="company_city" name="company_city"

                        value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'whole seller' ?  $user->company->name : "" }}"

             value="{{ old('company_city') }}" data-vv-as="&quot;{{ __('admin::app.users.users.company_city') }}&quot;"/>
            <span class="control-error" v-if="errors.has('company_city')">@{{ errors.first('company_city') }}</span>

            @error('company_name')
            <div class="error">{{ $message }}</div>
            @enderror

        </div>

        <div class="control-group" :class="[errors.has('company_country') ? 'has-error' : '']">
            <label for="company_country" class="required">{{ __('admin::app.users.users.company_country') }}</label>
            <input type="text" class="control" id="company_country" name="company_country"

                         value = "{{ Route::currentRouteName() == 'admin.users.edit' && mb_strtolower($user->role->name) == 'whole seller' ?  $user->company->name : "" }}"


             value="{{ old('company_country') }}" data-vv-as="&quot;{{ __('admin::app.users.users.company_country') }}&quot;"/>
            <span class="control-error" v-if="errors.has('company_country')">@{{ errors.first('company_country') }}</span>

            @error('company_name')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>


        <div class="control-group" :class="[errors.has('documents') ? 'has-error' : '']">
            <label for="documents" class="required">{{ __('admin::app.users.users.documents') }}</label>
            <input type="file" multiple name="documents"

                    value = "{{Route::currentRouteName() == 'admin.users.edit' ?  $user->company->nef_tex_no : "" }}"

             value="{{ old('documents') }}" data-vv-as="&quot;{{ __('admin::app.users.users.documents') }}&quot;"/>
            <span class="control-error" v-if="errors.has('documents')">@{{ errors.first('documents') }}</span>
        </div>

    </div>

</accordian> --}}