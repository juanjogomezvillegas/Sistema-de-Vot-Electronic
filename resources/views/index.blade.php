@extends('layouts.app')

@section('content')
    <div class="mt-6 p-6">
        <div class="container is-fluid">
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
    {{-- <section class="hero is-info is-medium has-text-centered">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div data-aos="zoom-in-up" class="column is-8">
                        <h1 class="title is-1 mb-6">
                            Election.daw
                        </h1>
                        <div>
                            <a class="button is-link m-1 is-size-5" href="#contactHome">Contact <i class="fas fa-paper-plane ml-2"></i></a>
                            <a class="button is-link m-1 is-size-5" href="{{ route('vote') }}">Vote <i class="fa-solid fa-share ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="services p-6">
        <div class="container">
            <div class="columns is-multiline">
                <div class="column is-12 about-me" data-aos="fade-in" data-aos-easing="linear">
                    <h1 class="title has-text-centered section-title services-title">Services</h1>
                    <br/>
                </div>
                <div class="columns is-12">
                    <div class="column is-4 has-text-centered" data-aos="fade-in"  data-aos-easing="linear">
                        <i class="fas fa-meteor fa-3x"></i>
                        <hr/>
                        <h2>
                            Reliability, speed and test of the most common attacks.
                            Visually light for any modern browser.
                        </h2>
                    </div>
                    <div class="column is-4 has-text-centered" data-aos="fade-in" data-aos-easing="linear">
                        <i class="fas fa-paint-brush fa-3x"></i>
                        <hr/>
                        <h2>
                            Clean and visually modifiable interface.
                            Polished down to the last detail to enhance the user experience.
                        </h2>
                    </div>
                    <div class="column is-4 has-text-centered" data-aos="fade-in" data-aos-easing="linear">
                        <i class="fas fa-rocket fa-3x"></i>
                        <hr/>
                        <h2>
                            Light navigation, forget about useless reloads.
                        </h2>
                    </div>
                </div>
                <hr/>
                <div class="columns is-12">
                    <div class="column is-4 has-text-centered" data-aos="fade-in" data-aos-easing="linear">
                        <i class="fa-solid fa-server fa-3x"></i>
                        <hr/>
                        <h2>
                            Possibility to manage candidates, and to manage the results of the elections, and to create pacts, etc ...
                            Thanks to our control panel.
                        </h2>
                    </div>
                    <div class="column is-4 has-text-centered" data-aos="fade-in" data-aos-easing="linear">
                        <i class="fas fa-globe fa-3x"></i>
                        <hr/>
                        <h2>
                            Functionalities designed by any Democratic State.
                            Specializing in the simplicity of running our project.
                        </h2>
                    </div>
                    <div class="column is-4 has-text-centered" data-aos="fade-in" data-aos-easing="linear">
                        <i class="fas fa-code fa-3x"></i>
                        <hr/>
                        <h2>
                            Code made with the latest technologies in security and reliability.
                            Latest technologies on the market.
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
