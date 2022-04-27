@extends('layouts.app')

@section('content')
    <section class="hero is-link is-medium has-text-centered">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div data-aos="zoom-in-up" class="column is-8">
                        <div class="box has-background-black">
                            <div class="is-flex is-justify-content-center mb-4">
                                <figure class="image is-128x128">
                                    <img src="{{ Auth::user()->icon }}" alt="Avatar user" class="is-rounded">
                                </figure>
                            </div>
                            <a href="{{ route('changeImage') }}" class="button is-black">Change Image <i class="fas fa-image ml-2"></i></a>
                            <a href="{{ route('changePassword') }}" class="button is-black ml-3">Change Password <i class="fas fa-lock ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container p-6">
        <h1 class="title has-text-centered">Basic Information</h1>
        @if(session()->exists('messageUpdateAuth'))
            <article class="message is-success">
                <div class="message-body">
                    {{ session()->get('messageUpdateAuth') }}
                </div>
            </article>
        @endif
        <form action="/change-data/{{ Auth::user()->id }}" method="POST">
            @method('PUT')
            @csrf

            <div class="field ">
                <label class="label m-2">Name</label>
                <div class="control has-icons-left has-icons-right">
                    <input name="name" class="input is-dark" type="text" placeholder="name" value="{{ Auth::user()->name }}">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>
            <div class="field ">
                <label class="label m-2">Lastname</label>
                <div class="control has-icons-left has-icons-right">
                    <input name="lastname" class="input is-dark" type="text" placeholder="lastname" value="{{ Auth::user()->lastname }}">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>
            <div class="field ">
                <label class="label m-2">Email</label>
                <div class="control has-icons-left has-icons-right">
                    <input name="email" class="input is-dark" type="email" placeholder="example@election.daw" value="{{ Auth::user()->email }}">
                    <span class="icon is-small is-left">
                        <i class="fas fa-at"></i>
                    </span>
                </div>
            </div>
            <div class="field ">
                <label class="label m-2">Role: {{ Auth::user()->role }}</label>
            </div>
            <button type="submit" class="button is-fullwidth is-dark mt-5">Apply Changes <i class="fas fa-user ml-2"></i></button>
        </form>
    </div>
@endsection
