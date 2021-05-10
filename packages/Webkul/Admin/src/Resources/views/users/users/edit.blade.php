@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.users.users.edit-user-title') }}
@stop

@section('content')
    <div class="content">
{{--        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" @submit.prevent="onSubmit">--}}
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" >
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ route('admin.dashboard.index') }}';"></i>

                        {{ __('admin::app.users.users.edit-user-title') }}
                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        {{ __('admin::app.users.users.save-btn-title') }}
                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    @csrf()
                    <input name="_method" type="hidden" value="PUT">

                    <accordian :title="'{{ __('admin::app.users.users.general') }}'" :active="true">
                        <div slot="body">
                            <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                                <label for="name" class="required">{{ __('admin::app.users.users.name') }}</label>
                                <input type="text" v-validate="'required'" class="control" id="name" name="name"
                                       data-vv-as="&quot;{{ __('admin::app.users.users.name') }}&quot;"
                                       value="{{ $user->name }}"/>
                                <span class="control-error" v-if="errors.has('name')">@{{ errors.first('name') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                                <label for="email" class="required">{{ __('admin::app.users.users.email') }}</label>
                                <input type="text" v-validate="'required|email'" class="control" id="email" name="email"
                                       data-vv-as="&quot;{{ __('admin::app.users.users.email') }}&quot;"
                                       value="{{ $user->email }}"/>
                                <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                            </div>


                            @if( isset($user->address) )           
                            <div class="control-group" :class="[errors.has('address') ? 'has-error' : '']">
                                <label for="address" class="required">{{ __('admin::app.users.users.address') }}</label>
                                <input type="text" v-validate="'required|address'" class="control" id="address" name="address"
                                       data-vv-as="&quot;{{ __('admin::app.users.users.address') }}&quot;"
                                       value="{{ $user->address->address }}"/>
                                <span class="control-error" v-if="errors.has('address')">@{{ errors.first('address') }}</span>
                            </div>
                            
                             
                            <div class="control-group" :class="[errors.has('city') ? 'has-error' : '']">
                                <label for="city" class="required">{{ __('admin::app.users.users.city') }}</label>
                                <input type="text" v-validate="'required|city'" class="control" id="city" name="city"
                                       data-vv-as="&quot;{{ __('admin::app.users.users.city') }}&quot;"
                                       value="{{ $user->address->city }}"/>
                                <span class="control-error" v-if="errors.has('city')">@{{ errors.first('email') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('country') ? 'has-error' : '']">
                                <label for="country" class="required">{{ __('admin::app.users.users.country') }}</label>
                                <input type="text" v-validate="'required|country'" class="control" id="country" name="country"
                                       data-vv-as="&quot;{{ __('admin::app.users.users.country') }}&quot;"
                                       value="{{ $user->address->country }}"/>
                                <span class="control-error" v-if="errors.has('country')">@{{ errors.first('country') }}</span>
                            </div>
                        @endif
                        </div>
                    </accordian>

                    <accordian :title="'{{ __('admin::app.users.users.password') }}'" :active="true">
                        <div slot="body">
                            <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                                <label for="password">{{ __('admin::app.users.users.password') }}</label>
                                <input type="password" v-validate="'min:6|max:18'" class="control" id="password" name="password" ref="password"
                                       data-vv-as="&quot;{{ __('admin::app.users.users.password') }}&quot;"/>
                                <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                                <label for="password_confirmation">{{ __('admin::app.users.users.confirm-password') }}</label>
                                <input type="password" v-validate="'min:6|max:18|confirmed:password'" class="control" id="password_confirmation" name="password_confirmation" data-vv-as="&quot;{{ __('admin::app.users.users.confirm-password') }}&quot;"/>
                                <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
                            </div>
                        </div>
                    </accordian>

                    <accordian :title="'{{ __('admin::app.users.users.status-and-role') }}'" :active="true">
                        <div slot="body">
                            <div class="control-group" :class="[errors.has('role_name') ? 'has-error' : '']">
                                <label for="role" class="required">{{ __('admin::app.users.users.role') }}</label>
                                <select v-validate="'required'" class="control" name="role_name" onchange="showBox(this.value)" data-vv-as="&quot;{{ __('admin::app.users.users.role') }}&quot;">
                                    @foreach ($roles as $role)
                                        <option    value="{{ $role->name }}" {{ $user->role->name == $role->name ? 'selected id =role_name' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <span class="control-error" v-if="errors.has('role_name')">@{{ errors.first('role_name') }}</span>
                            </div>

                            <div class="control-group">
                                <label for="status">{{ __('admin::app.users.users.status') }}</label>

                                <label class="switch">
                                    <input type="checkbox" id="status" name="status" value="{{ $user->status }}" {{ $user->status ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </accordian>

                    <div id="wholesellerBox" style="display:{{ old('role_name') == 'whole seller' ? 'block' : 'none' }}">
                        @include('admin::users.users.wholeseller')
                    </div>

                    <div id="driverBox" style="display:{{ old('role_name') == 'driver' ? 'block' : 'none' }}">
                        @include('admin::users.users.driver_info')
                    </div>

                </div>
            </div>
        </form>
    </div>
@stop


@push('scripts')

<script>

$( document ).ready(function() {

    var role = document.getElementById("role_name").innerText;
    showBox(role);

});

function showBox (val) {


var wholesellerBox = document.getElementById("wholesellerBox");

var driverBox = document.getElementById("driverBox");

if (val == 'whole seller') {
wholesellerBox.style.display = "block";
driverBox.style.display = "none";



} else if(val == 'driver') {
driverBox.style.display = "block";
wholesellerBox.style.display = "none";

} else {

driverBox.style.display = "none";
wholesellerBox.style.display = "none";


}



}
</script>


@endpush