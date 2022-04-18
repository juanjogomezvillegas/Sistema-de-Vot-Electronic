@extends('layouts.admin')

@section('content')
    <div class="container mt-6">
        <form action="/configuration/{{ session('config')['id'] }}" method="POST">
            @method('PUT')
            @csrf

            <div class="is-flex is-justify-content-center">
                <div class="field">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-dark" name="title" type="text" placeholder="Title" value="{{ session('config')['title'] }}">
                        <span class="icon is-small is-left">
                            <i class="fa-solid fa-heading"></i>
                        </span>
                    </div>
                </div>
                <div class="field ml-4">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-dark" name="seats" type="text" placeholder="Seats" value="{{ session('config')['seats'] }}">
                        <span class="icon is-small is-left">
                            <i class="fa-solid fa-chair"></i>
                        </span>
                    </div>
                </div>
                <div class="ml-6">
                    <button class="button is-link">Save Changes <i class="fa-solid fa-floppy-disk ml-2"></i></button>
                </div>
            </div>
        </form>
    </div>
@endsection
