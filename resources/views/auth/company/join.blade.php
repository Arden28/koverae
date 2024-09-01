@extends('layouts.auth')

@section('title', 'Join '. current_company()->name)

@section('content')

<div class="shadow-lg k_website_register card">
    <img class="mx-auto k_logo" src="{{ asset('assets/images/logo/logo-black.png') }}" width="130px" />
    <div class="card-body">
        <div class="text-center k-alert alert-info">
            <p>
                {{ __("You're just a step away from joining the team! Complete your details below to become a part of ". current_company()->name) }}
            </p>
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <x-input-error :messages="$errors->get('password')" class="mt-2 mb-4" />

        <form method="POST" action="{{ route('company.invitations.accept.post', $invitation->token) }}" class="k_register_form">
            @csrf

            <!-- First Name & Name -->
            <div class="mt-2 mb-2 row">
                <div class="mb-1 field-login col-md-6">
                    <input name="first_name" required id="first_name" class="form-control" type="text" value="{{ old('first_name') }}" placeholder="{{ __('Your First Name') }}"/>
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    <div class="alert alert-info" style="display: none;"></div>
                </div>

                <div class="mb-1 field-login col-md-6">
                    <input name="name" required id="name" class="form-control" type="text" value="{{ old('name') }}" placeholder="{{ __('Your Name') }}"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <div class="alert alert-info" style="display: none;"></div>
                </div>
            </div>
            <!-- Birthday -->
            <div class="mt-2 mb-3 row">
                <div class="mb-2 col-12">
                    <h4 class="m-0">{{ __('General Informations') }}</h4>
                    <span>{{ __('Enter your date of birth and gender.') }}</span>
                </div>
                <div class="mb-1 col-md-4">
                    <select id="day" name="day_of_birth" class="form-control">
                        <option value="">{{ __('Day') }}</option>
                        <script>
                            for (let day = 1; day <= 31; day++) {
                                let dayPadded = String(day).padStart(2, '0');
                                document.write(`<option value="${dayPadded}">${dayPadded}</option>`);
                            }
                        </script>
                    </select>

                    <x-input-error :messages="$errors->get('day_of_birth')" class="mt-2" />
                    <div class="alert alert-info" style="display: none;"></div>
                </div>
                <div class="mb-1 col-md-4">
                    <select name="month_of_birth" id="month" class="form-control">
                        <option value="">{{ __('Month') }}</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <x-input-error :messages="$errors->get('month_of_birth')" class="mt-2" />
                    <div class="alert alert-info" style="display: none;"></div>
                </div>
                <div class="mb-1 col-md-4">
                    <select id="year" name="year_of_birth" class="form-control">
                        <option value="">{{ __('Year') }}</option>
                    </select>
                    <x-input-error :messages="$errors->get('year_of_birth')" class="mt-2" />
                    <div class="alert alert-info" style="display: none;"></div>
                </div>
                <div class="mt-2 col-md-12">
                    <select name="gender" id="gender" class="form-control">
                        <option value="" {{ old('gender') }}>{{ __('Gender') }}</option>
                        <option value="male" {{ old('gender') }}>{{ __('Male') }}</option>
                        <option value="female" {{ old('gender') }}>{{ __('Female') }}</option>
                    </select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    <div class="alert alert-info" style="display: none;"></div>
                </div>
            </div>
            <!-- Email & Phone -->
            <div class="mt-2 mb-3 row">
                <div class="mb-2 col-12">
                    <h4 class="m-0">{{ __('Contact Informations') }}</h4>
                    <span>{{ __('Enter your e-mail address and and phone number.') }}</span>
                </div>
                <div class="mb-1 field-login col-md-6 input-group">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input name="email" required id="email" class="form-control" type="email" value="{{ old('email') }}" placeholder="{{ __('Your email address') }}"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <div class="alert alert-info" style="display: none;"></div>
                </div>

                <div class="mb-1 field-login col-md-6 input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                    <input name="phone" required id="phone" class="form-control" type="tel" value="{{ old('phone') }}" placeholder="{{ __('Your phone number') }}"/>
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    <div class="alert alert-info" style="display: none;"></div>
                </div>
            </div>
            <!-- Password -->
            <div class="mt-2 mb-3 row">
                <div class="mb-2 col-12">
                    <h4 class="m-0">{{ __('Security Informations') }}</h4>
                    <span>{{ __('Enter your password and choose your security options.') }}</span>
                </div>
                <div class="py-2 mb-1 col-md-6 field-password koverae_password_revear">
                    <input class="form-control" name="password" type="password" id="password" placeholder="Your password"
                        required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="py-2 mb-1 col-md-6 field-password koverae_password_revear">
                    <input class="form-control" name="password_confirmation" type="password" id="password_confirmation" placeholder="Confirm"
                        required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="field-login col-12 input-group">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input name="recovery_email" required id="recovery_email" class="form-control" type="email" value="{{ old('recovery_email') }}" placeholder="{{ __('Your recovery email') }}"/>
                    <x-input-error :messages="$errors->get('recovery_email')" class="mt-2" />
                    <div class="alert alert-info" style="display: none;"></div>
                </div>
            </div>

            <button class="mb-2 btn btn-primary float-start text-uppercase font-weight-bold" type="submit">
                {{ __('Join '. current_company()->name) }}
            </button>
            <small style="font-size: 14px;"><i class="bi bi-info-circle-fill"></i> {{ new Illuminate\Support\HtmlString(__("We will handle your personal data as described in our <a class=\"hover:underline\" href=\":url\">Privacy Policy</a>.")) }}</small>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Get the current year and calculate the start and end years
    const currentYear = new Date().getFullYear();
    const startYear = 1960;
    const endYear = currentYear - 18;

    // Get the year select element
    const yearSelect = document.getElementById('year');

    // Populate the year select element
    for (let year = endYear; year >= startYear; year--) {
        const option = document.createElement('option');
        option.value = year;
        option.text = year;
        yearSelect.add(option);
    }
</script>
@endsection
