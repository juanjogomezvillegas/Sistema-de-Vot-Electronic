<head>
    <title>Register | {{ session('config')['title'] }}</title>
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

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- Name -->
                                    <div>
                                        <div class="field">
                                            <x-label for="name" class="has-text-weight-bold" :value="__('Name')" />
                                            <div class="control has-icons-left">
                                                <x-input class="input" id="name" class="input is-dark"
                                                    type="name" placeholder="Name" type="text" name="name"
                                                    :value="old('name')" required autofocus />
                                                <span class="icon is-small is-left">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- lastname -->
                                    <div>
                                        <div class="field">
                                            <x-label for="lastname" class="has-text-weight-bold" :value="__('Lastname')" />
                                            <div class="control has-icons-left">
                                                <x-input class="input" id="lastname" class="input is-dark"
                                                    type="lastname" placeholder="Lastname" type="text"
                                                    name="lastname" :value="old('lastname')" required autofocus />
                                                <span class="icon is-small is-left">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email Address -->
                                    <div>
                                        <div class="field">
                                            <x-label for="email" class="has-text-weight-bold" :value="__('Email')" />
                                            <div class="control has-icons-left">
                                                <x-input class="input" id="email" class="input is-dark"
                                                    type="email" placeholder="example@election.daw" type="email"
                                                    name="email" :value="old('email')" required autofocus />
                                                <span class="icon is-small is-left">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="field">
                                        <x-label for="password" class="has-text-weight-bold" :value="__('Password')" />

                                        <div class="control has-icons-left">
                                            <x-input id="password" class="block mt-1 w-full" type="password"
                                                name="password" placeholder="********" class="input is-dark" required
                                                autocomplete="current-password" />
                                            <span class="icon is-small is-left">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="field">
                                        <x-label for="password_confirmation" class="has-text-weight-bold" :value="__('Password Verify')" />

                                        <div class="control has-icons-left">
                                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password" name="password_confirmation" placeholder="********"
                                                class="input is-dark" required autocomplete="current-password" />
                                            <span class="icon is-small is-left">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="is-flex is-align-items-center is-justify-content-center mt-5">
                                        <x-button class="button is-link mr-3">
                                            {{ __('Sign up') }}
                                        </x-button>

                                        <a class="content"
                                            href="{{ route('login') }}">
                                            {{ __('Already account?') }}
                                        </a>
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
