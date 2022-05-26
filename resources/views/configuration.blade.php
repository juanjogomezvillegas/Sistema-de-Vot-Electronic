@extends('layouts.admin')

@section('content')
    <div class="container mt-6">
        <form action="/configuration/{{ session('config')['id'] }}" method="POST">
            @method('PUT')
            @csrf

            <div class="is-flex is-flex-direction-column is-justify-content-center">
                <div class="mb-6">
                    <button class="button is-fullwidth is-black">Save Changes <i class="fa-solid fa-floppy-disk ml-2"></i></button>
                </div>
                <div class="field mt-2">
                    <div class="control">
                        <div class="select is-fullwidth is-dark">
                            <select name="countries" class="has-background-black has-text-light">
                                @foreach($countries as $key => $value)
                                    @if($value->logo == session('config')['logo'])
                                        <option value="{{ $value->logo }}" selected>{{ $value->name }}</option>
                                    @else
                                        <option value="{{ $value->logo }}">{{ $value->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-dark has-background-black has-text-light" name="title" type="text" placeholder="Title" value="{{ session('config')['title'] }}">
                        <span class="icon is-small is-left">
                            <i class="fa-solid fa-heading"></i>
                        </span>
                    </div>
                </div>
                <div class="field mt-2">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-dark has-background-black has-text-light" name="seats" type="text" placeholder="Seats" value="{{ session('config')['seats'] }}">
                        <span class="icon is-small is-left">
                            <i class="fa-solid fa-chair"></i>
                        </span>
                    </div>
                </div>
                <div class="field is-horizontal mt-5">
                    <div class="field-label is-normal">
                        <label for="allowElection" class="label has-text-light">Elections</label>
                    </div>
                    <div class="field-body">
                        <label class="switch">
                            @if($allowElection)
                                <input type="checkbox" name="allowElection" id="allowElection" checked>
                            @else
                                <input type="checkbox" name="allowElection" id="allowElection">
                            @endif
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
