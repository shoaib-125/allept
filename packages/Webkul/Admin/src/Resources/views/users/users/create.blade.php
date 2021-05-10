@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.users.users.add-user-title') }}
@stop

@section('content')
    <div class="content">
        <form method="POST" action="{{ route('admin.users.store') }}" >
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.address = '{{ route('admin.dashboard.index') }}';"></i>

                        {{ __('admin::app.users.users.add-user-title') }}
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

                    <accordian :title="'{{ __('admin::app.users.users.general') }}'" :active="true">
                        <div slot="body">
                            <div class="control-group" :class="[errors.has('name') ? 'has-error' : '']">
                                <label for="name" class="required">{{ __('admin::app.users.users.name') }}</label>
                                <input type="text" value="{{ old('name') }}" v-validate="'required'" class="control" id="name" name="name" data-vv-as="&quot;{{ __('admin::app.users.users.name') }}&quot;"/>
                                <span class="control-error" v-if="errors.has('name')">@{{ errors.first('name') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                                <label for="email" class="required">{{ __('admin::app.users.users.email') }}</label>
                                <input type="text" value="{{ old('email') }}" v-validate="'required|email'" class="control" id="email" name="email" data-vv-as="&quot;{{ __('admin::app.users.users.email') }}&quot;"/>
                                <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('address') ? 'has-error' : '']">
                                <label for="address" class="required">{{ __('admin::app.users.users.address') }}</label>
                                <input type="text" value="{{ old('address') }}" v-validate="'required'" class="control" id="address" name="address" data-vv-as="&quot;{{ __('admin::app.users.users.address') }}&quot;"/>
                                <span class="control-error" v-if="errors.has('address')">@{{ errors.first('address') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('city') ? 'has-error' : '']">
                                <label for="city" class="required">{{ __('admin::app.users.users.city') }}</label>
                                <input type="text" value="{{ old('city') }}" v-validate="'required'" class="control" id="city" name="city" data-vv-as="&quot;{{ __('admin::app.users.users.city') }}&quot;"/>
                                <span class="control-error" v-if="errors.has('city')">@{{ errors.first('city') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('country') ? 'has-error' : '']">
                                <label for="country" class="required">{{ __('admin::app.users.users.country') }}</label>
                                <input type="text" value="{{ old('country') }}" v-validate="'required'" class="control" id="country" name="country" data-vv-as="&quot;{{ __('admin::app.users.users.country') }}&quot;"/>
                                <span class="control-error" v-if="errors.has('country')">@{{ errors.first('country') }}</span>
                            </div>

                        </div>
                    </accordian>

                    <accordian :title="'{{ __('Password') }}'" :active="true">
                        <div slot="body">
                            <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                                <label for="password">{{ __('admin::app.users.users.password') }}</label>
                                <input type="password" v-validate="'min:6|max:18'" class="control" id="password" name="password" ref="password" data-vv-as="&quot;{{ __('admin::app.users.users.password') }}&quot;"/>
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
                                <select v-validate="'required'" class="control" onchange="showBox(this.value)" name="role_name" data-vv-as="&quot;{{ __('admin::app.users.users.role') }}&quot;">
                                    @foreach ($roles as $role)

                                    {{-- I am Apply this condition for hide some Roles.. --}}

                                        @if(auth()->guard('admin')->user()->role->name == 'administrator' )

                                            <option {{ old('role_name') == $role->name ? "Selected" : "" }} value="{{ $role->name }}">{{ $role->name }}</option>

                                        @elseif (auth()->guard('admin')->user()->role->name != $role->name && $role->name != 'adminstrator')

                                            <option {{ old('role_name') == $role->name ? "Selected" : "" }} value="{{ $role->name }}">{{ $role->name }}</option>

                                        @endif

                                        {{-- End Changing for  --}}

                                     @endforeach
                                </select>
                                <span class="control-error" v-if="errors.has('role_name')">@{{ errors.first('role_name') }}</span>
                            </div>

                            <div class="control-group">
                                <label for="status">{{ __('admin::app.users.users.status') }}</label>

                                <label class="switch">
                                    <input type="checkbox" id="status" name="status" value="1" {{ old('status') ? 'checked' : '' }}>
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

// var wholesellerBoxHTML = document.getElementById("wholesellerBox");

// var driverBoxHTML = document.getElementById("driverBox");

// var wholesellerHTML = wholesellerBoxHTML.innerHTML;
// var driverHTML = driverBoxHTML.innerHTML;

// wholesellerBoxHTML.innerText = " ";
// driverBoxHTML.innerText = " ";




function showBox (val) {

      var wholesellerBox = document.getElementById("wholesellerBox");

      var driverBox = document.getElementById("driverBox");

  if (val == 'whole seller') {
    wholesellerBox.style.display = "block";
    driverBox.style.display = "none";
    // driverBox.innerHTML = "";
    // wholesellerBox.innerHTML = wholesellerHTML;

  } else if(val == 'driver') {
    driverBox.style.display = "block";
    wholesellerBox.style.display = "none";
    // wholesellerBox.innerHTML = "";
    // wholesellerBox.innerHTML = driverHTML;
  } else {

    driverBox.style.display = "none";
    wholesellerBox.style.display = "none";
    // driverBox.innerHTML = "";
    // wholesellerBox.innerHTML = "";

  }



}
</script>

@endpush