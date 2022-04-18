@extends('layouts.app')

@section('content')
    <section class="hero is-info is-medium has-text-centered">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div data-aos="zoom-in-up" class="column is-8">
                        <div class="box">
                            <div class="is-flex is-justify-content-center mb-4">
                                <figure class="image is-128x128">
                                    <img src="{{ Auth::user()->icon }}" alt="Avatar user" class="is-rounded">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="p-6">
        <h1 class="title has-text-centered mb-3">Change Image</h1>
        <form action="/change-image/{{ Auth::user()->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="is-flex is-justify-content-center is-align-items-center mb-4">
                <figure class="image is-128x128">
                    <img src="img/users/user-example.png" class="is-rounded" alt="Placeholder image">
                </figure>
                <input type="hidden" name="image" value="img/users/user-example.png">
                <button type="submit" class="button is-dark ml-5">Change Image <i class="fas fa-image ml-2"></i></button>
            </div>
        </form>
        <form action="/change-image/{{ Auth::user()->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="is-flex is-justify-content-center is-align-items-center mb-4">
                <figure class="image is-128x128">
                    <img src="img/users/user-example2.png" class="is-rounded" alt="Placeholder image">
                </figure>
                <input type="hidden" name="image" value="img/users/user-example2.png">
                <button type="submit" class="button is-dark ml-5">Change Image <i class="fas fa-image ml-2"></i></button>
            </div>
        </form>
        <form action="/change-image/{{ Auth::user()->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="is-flex is-justify-content-center is-align-items-center mb-4">
                <figure class="image is-128x128">
                    <img src="img/users/user-example3.png" class="is-rounded" alt="Placeholder image">
                </figure>
                <input type="hidden" name="image" value="img/users/user-example3.png">
                <button type="submit" class="button is-dark ml-5">Change Image <i class="fas fa-image ml-2"></i></button>
            </div>
        </form>
        <form action="/change-image/{{ Auth::user()->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="is-flex is-justify-content-center is-align-items-center mb-4">
                <figure class="image is-128x128">
                    <img src="img/users/user-example4.png" class="is-rounded" alt="Placeholder image">
                </figure>
                <input type="hidden" name="image" value="img/users/user-example4.png">
                <button type="submit" class="button is-dark ml-5">Change Image <i class="fas fa-image ml-2"></i></button>
            </div>
        </form>
        <form action="/change-image/{{ Auth::user()->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="is-flex is-justify-content-center is-align-items-center mb-4">
                <figure class="image is-128x128">
                    <img src="img/users/user-example5.png" class="is-rounded" alt="Placeholder image">
                </figure>
                <input type="hidden" name="image" value="img/users/user-example5.png">
                <button type="submit" class="button is-dark ml-5">Change Image <i class="fas fa-image ml-2"></i></button>
            </div>
        </form>
        <form action="/change-image/{{ Auth::user()->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="is-flex is-justify-content-center is-align-items-center mb-4">
                <figure class="image is-128x128">
                    <img src="img/users/user-example6.png" class="is-rounded" alt="Placeholder image">
                </figure>
                <input type="hidden" name="image" value="img/users/user-example6.png">
                <button type="submit" class="button is-dark ml-5">Change Image <i class="fas fa-image ml-2"></i></button>
            </div>
        </form>
    </div>
@endsection
