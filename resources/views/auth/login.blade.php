<head>
    <title>Login | {{ session('config')['title'] }}</title>
</head>
<section class="hero is-link is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                    <div class="box">
                        <x-guest-layout>
                            <x-auth-card>
                                <x-slot name="logo">
                                    <a href="/">
                                        <img src="{{ session('config')['logo'] }}" alt="Logo" />
                                    </a>
                                </x-slot>

                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <br>

                                    <!-- Email Address -->
                                    <div>
                                        <div class="field">
                                            <x-label for="email" class="label" :value="__('Email')"/>
                                            <div class="control has-icons-left">
                                                <x-input class="input" id="email" class="input is-dark" type="email"
                                                         placeholder="example@election.daw" type="email"
                                                         name="email" :value="old('email')" required autofocus/>
                                                <span class="icon is-small is-left">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <!-- Password -->
                                    <div class="field">
                                        <x-label for="password" :value="__('Password')" class="label"/>
                                        <div class="control has-icons-left">
                                            <x-input id="password" class="block mt-1 w-full"
                                                     type="password"
                                                     name="password"
                                                     placeholder="*******"
                                                     class="input is-dark"
                                                     required autocomplete="current-password"/>
                                            <span class="icon is-small is-left">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Remember Me -->
                                    <div class="block mt-4">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox"
                                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                   name="remember">
                                            <span class="text-sm text-gray-600">{{ __("Remember me") }}</span>
                                        </label>
                                    </div>


                                    <div class="is-flex is-justify-content-end mt-4">
                                        <div class="field mt-4">
                                            <x-button class="button is-link">
                                                {{ __('Login') }} <i class="fas fa-right-to-bracket ml-2"></i>
                                            </x-button>
                                            <a href="{{ route('register') }}" class="button is-light">
                                                {{ __('Sign up') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </x-auth-card>
                        </x-guest-layout>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

