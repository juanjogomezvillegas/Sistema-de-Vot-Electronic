@extends('layouts.app')

@section('content')
    <div class="mt-6 p-6">
        <h1 class="title has-text-centered mb-3">Change Image</h1>
        <form action="/change-image/{{ Auth::user()->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="is-flex is-justify-content-center is-align-items-center mb-4">
                <figure class="image is-128x128">
                    <img src="img/users/user-example.png" class="is-rounded" alt="image example 1">
                </figure>
                <input type="hidden" name="image" value="img/users/user-example.png">
                <button type="submit" class="button is-black ml-5">Change Image <i class="fas fa-image ml-2"></i></button>
            </div>
        </form>
        <form action="/change-image/{{ Auth::user()->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="is-flex is-justify-content-center is-align-items-center mb-4">
                <figure class="image is-128x128">
                    <img src="img/users/user-example2.png" class="is-rounded" alt="image example 2">
                </figure>
                <input type="hidden" name="image" value="img/users/user-example2.png">
                <button type="submit" class="button is-black ml-5">Change Image <i class="fas fa-image ml-2"></i></button>
            </div>
        </form>
        <form action="/change-image/{{ Auth::user()->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="is-flex is-justify-content-center is-align-items-center mb-4">
                <figure class="image is-128x128">
                    <img src="img/users/user-example3.png" class="is-rounded" alt="image example 3">
                </figure>
                <input type="hidden" name="image" value="img/users/user-example3.png">
                <button type="submit" class="button is-black ml-5">Change Image <i class="fas fa-image ml-2"></i></button>
            </div>
        </form>
        <form action="/change-image/{{ Auth::user()->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="is-flex is-justify-content-center is-align-items-center mb-4">
                <figure class="image is-128x128">
                    <img src="img/users/user-example4.png" class="is-rounded" alt="image example 4">
                </figure>
                <input type="hidden" name="image" value="img/users/user-example4.png">
                <button type="submit" class="button is-black ml-5">Change Image <i class="fas fa-image ml-2"></i></button>
            </div>
        </form>
        <form action="/change-image/{{ Auth::user()->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="is-flex is-justify-content-center is-align-items-center mb-4">
                <figure class="image is-128x128">
                    <img src="img/users/user-example5.png" class="is-rounded" alt="image example 5">
                </figure>
                <input type="hidden" name="image" value="img/users/user-example5.png">
                <button type="submit" class="button is-black ml-5">Change Image <i class="fas fa-image ml-2"></i></button>
            </div>
        </form>
        <form action="/change-image/{{ Auth::user()->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="is-flex is-justify-content-center is-align-items-center mb-4">
                <figure class="image is-128x128">
                    <img src="img/users/user-example6.png" class="is-rounded" alt="image example 6">
                </figure>
                <input type="hidden" name="image" value="img/users/user-example6.png">
                <button type="submit" class="button is-black ml-5">Change Image <i class="fas fa-image ml-2"></i></button>
            </div>
        </form>
    </div>
@endsection
