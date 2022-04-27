@extends('layouts.app')

@section('content')
    <section class="hero is-info is-medium has-text-centered">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div data-aos="zoom-in-up" class="column is-8">
                        <h1 class="title is-1 mb-6">
                            Election.daw
                        </h1>
                        <div>
                            <h2 class="subtitle is-1 mb-6"></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="p-6">
        <div class="container is-max-desktop">
            @if($candidates->count() > 0)
                <h1 class="title has-text-centered section-title">Candidate Select</h1>
                <br/>
                @foreach($candidates as $key => $value)
                    <form action="/vote/{{ $value->id }}" method="POST">
                        @csrf
                        <div class="card mt-4 has-background-white-ter">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48" style="background-color: {{ $value->color }};">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">{{ $value->name }}</p>
                                        <p class="subtitle is-6">{{ $value->party }}</p>
                                    </div>
                                </div>
                                <div class="content">
                                    {{ $value->campaign }}
                                </div>
                                <br>
                                <div class="is-flex is-justify-content-end">
                                    <button type="submit" class="button is-dark">Vote <i class="fa-solid fa-paper-plane ml-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            @else
                <article class="message is-info">
                    <div class="message-body">
                        There are not candidates
                    </div>
                </article>
            @endif
        </div>
    </div>
@endsection
