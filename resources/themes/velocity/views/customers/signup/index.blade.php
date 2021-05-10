@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.signup-form.page-title') }}
@endsection

@section('content-wrapper')
    <div class="auth-content form-container">
        <div class="container">
            <div class="col-lg-10 col-md-12 offset-lg-1">
                <div class="heading">
                    <h2 class="fs24 fw6">
                        {{ __('velocity::app.customer.signup-form.user-registration')}}
                    </h2>

                    <a href="{{ route('customer.session.index') }}" class="btn-new-customer">
                        <button type="button" class="theme-btn light">
                            {{ __('velocity::app.customer.signup-form.login')}}
                        </button>
                    </a>
                </div>

                <div class="body col-12">
                    <h3 class="fw6">
                        {{ __('velocity::app.customer.signup-form.become-user')}}
                    </h3>

                    <p class="fs16">
                        {{ __('velocity::app.customer.signup-form.form-sginup-text')}}
                    </p>

                    {!! view_render_event('bagisto.shop.customers.signup.before') !!}

                    <form
                        method="post"
                        action="{{ route('customer.register.create') }}"
                        @submit.prevent="onSubmit">

                        {{ csrf_field() }}

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.before') !!}

                        <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                            <label for="first_name" class="required label-style">
                                {{ __('shop::app.customer.signup-form.firstname') }}
                            </label>

                            <input
                                type="text"
                                class="form-style"
                                name="first_name"
                                v-validate="'required'"
                                value="{{ old('first_name') }}"
                                data-vv-as="&quot;{{ __('shop::app.customer.signup-form.firstname') }}&quot;" />

                            <span class="control-error" v-if="errors.has('first_name')">
                                @{{ errors.first('first_name') }}
                            </span>
                        </div>

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.firstname.after') !!}

                        <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                            <label for="last_name" class="required label-style">
                                {{ __('shop::app.customer.signup-form.lastname') }}
                            </label>

                            <input
                                type="text"
                                class="form-style"
                                name="last_name"
                                v-validate="'required'"
                                value="{{ old('last_name') }}"
                                data-vv-as="&quot;{{ __('shop::app.customer.signup-form.lastname') }}&quot;" />

                            <span class="control-error" v-if="errors.has('last_name')">
                                @{{ errors.first('last_name') }}
                            </span>
                        </div>

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.lastname.after') !!}

                        <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                            <label for="email" class="required label-style">
                                {{ __('shop::app.customer.signup-form.email') }}
                            </label>

                            <input
                                type="email"
                                class="form-style"
                                name="email"
                                v-validate="'required|email'"
                                value="{{ old('email') }}"
                                data-vv-as="&quot;{{ __('shop::app.customer.signup-form.email') }}&quot;" />

                            <span class="control-error" v-if="errors.has('email')">
                                @{{ errors.first('email') }}
                            </span>
                        </div>

                        <!-- postcode -->
                        <div class="control-group" :class="[errors.has('postcode') ? 'has-error' : '']">
                            <label for="email" class="required label-style">
                                {{ __('shop::app.customer.signup-form.postcode') }}
                            </label>

                            <input
                                    type="text"
                                    class="form-style"
                                    name="postcode"
                                    v-validate="'required'"
                                    value="{{ old('postcode') }}"
                                    data-vv-as="&quot;{{ __('shop::app.customer.signup-form.postcode') }}&quot;" />

                            <span class="control-error" v-if="errors.has('postcode')">
                                @{{ errors.first('postcode') }}
                            </span>
                        </div>

                        <!-- phone no -->
                        <div class="control-group" :class="[errors.has('phone') ? 'has-error' : '']">
                            <label for="phone" class="required label-style">
                                {{ __('shop::app.customer.signup-form.phone') }}
                            </label>

                            <input
                                    type="number"
                                    class="form-style"
                                    name="phone"
                                    v-validate="'required'"
                                    value="{{ old('phone') }}"
                                    data-vv-as="&quot;{{ __('shop::app.customer.signup-form.phone') }}&quot;" />

                            <span class="control-error" v-if="errors.has('phone')">
                                @{{ errors.first('phone') }}
                            </span>
                        </div>

                        <!-- tax no -->
                        <div class="control-group" :class="[errors.has('tax-no') ? 'has-error' : '']">
                            <label for="tax-no" class="required label-style">
                                {{ __('shop::app.customer.signup-form.tax-no') }}
                            </label>

                            <input
                                    type="text"
                                    class="form-style"
                                    name="tax-no"
                                    v-validate="'required'"
                                    value="{{ old('tax-no') }}"
                                    data-vv-as="&quot;{{ __('shop::app.customer.signup-form.tax-no') }}&quot;" />

                            <span class="control-error" v-if="errors.has('tax-no')">
                                @{{ errors.first('tax-no') }}
                            </span>
                        </div>

                        <!-- customer type -->
                        <div class="control-group" :class="[errors.has('customer-type') ? 'has-error' : '']">
                            <label for="customer-type" class="required label-style">
                                {{ __('shop::app.customer.signup-form.customer-type') }}
                            </label>

                            <select name="customer-type" class="form-style">
                                <option value="particular">Particular</option>
                                <option value="company">Company</option>
                            </select>

                            <span class="control-error" v-if="errors.has('customer-type')">
                                @{{ errors.first('customer-type') }}
                            </span>
                        </div>


                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.email.after') !!}

                        <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                            <label for="password" class="required label-style">
                                {{ __('shop::app.customer.signup-form.password') }}
                            </label>

                            <input
                                type="password"
                                class="form-style"
                                name="password"
                                v-validate="'required|min:6'"
                                ref="password"
                                value="{{ old('password') }}"
                                data-vv-as="&quot;{{ __('shop::app.customer.signup-form.password') }}&quot;" />

                            <span class="control-error" v-if="errors.has('password')">
                                @{{ errors.first('password') }}
                            </span>
                        </div>

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.password.after') !!}

                        <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                            <label for="password_confirmation" class="required label-style">
                                {{ __('shop::app.customer.signup-form.confirm_pass') }}
                            </label>

                            <input
                                type="password"
                                class="form-style"
                                name="password_confirmation"
                                v-validate="'required|min:6|confirmed:password'"
                                data-vv-as="&quot;{{ __('shop::app.customer.signup-form.confirm_pass') }}&quot;" />

                            <span class="control-error" v-if="errors.has('password_confirmation')">
                                @{{ errors.first('password_confirmation') }}
                            </span>
                        </div>

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.after') !!}

                        <button class="theme-btn" type="submit">
                            {{ __('shop::app.customer.signup-form.title') }}
                        </button>
                    </form>

                    {!! view_render_event('bagisto.shop.customers.signup.after') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
