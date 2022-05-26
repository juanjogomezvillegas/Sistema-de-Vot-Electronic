@extends('layouts.app')

@section('content')
    @if(Auth::check() && $allowElection)
        <div class="mt-6 p-6">
            <div class="container is-fluid">
                @if($candidates->count() > 0)
                    <h1 class="title has-text-centered section-title">Candidate Select</h1>
                    <br/>
                    @foreach($candidates as $key => $value)
                        <form action="/vote/{{ $value->id }}" method="POST">
                            @csrf
                            <div class="card mt-4 has-background-grey-lighter">
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
                                        <button type="submit" class="button is-black">Vote <i class="fa-solid fa-paper-plane ml-2"></i></button>
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
    @else
        <section class="pt-6 hero is-link is-medium has-text-centered">
            <div class="hero-body">
                <div class="container">
                    <div class="columns is-centered">
                        <div data-aos="zoom-in-up" class="column is-8">
                            <div class="box has-background-black">
                                <h1 class="title is-size-3 mt-4 mb-4">{{ session('config')['title'] }}</h1>
                                <a href="{{ route('contact') }}" class="button is-black ml-3">Contact <i class="fas fa-paper-plane ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="section has-background-dark services">
            <div class="container">
                <div class="columns is-multiline">
                    <div class="column is-12 mb-6" data-aos="fade-in" data-aos-easing="linear">
                        <h1 class="title has-text-centered section-title has-text-light">Services</h1>
                    </div>
                    <div class="columns is-12">
                        <div class="column is-4 has-text-centered has-text-light" data-aos="fade-in" data-aos-easing="linear">
                            <i class="fa-solid fa-meteor fa-3x"></i>
                            <hr/>
                            <h2>
                                Reliability, fast and to test of the most common attacks.
                                Visually light for any modern browser.
                            </h2>
                        </div>
                        <div class="column is-4 has-text-centered has-text-light" data-aos="fade-in" data-aos-easing="linear">
                            <i class="fa-solid fa-paint-brush fa-3x"></i>
                            <hr/>
                            <h2>
                                Clean and visually modifiable interface.
                                Polished down to the last detail to enhance the user experience.
                            </h2>
                        </div>
                        <div class="column is-4 has-text-centered has-text-light" data-aos="fade-in" data-aos-easing="linear">
                            <i class="fa-solid fa-rocket fa-3x"></i>
                            <hr/>
                            <h2>
                                Light navigation, forgot about useless preloads.
                            </h2>
                        </div>
                    </div>
                    <div class="columns is-12">
                        <div class="column is-4 has-text-centered has-text-light" data-aos="fade-in" data-aos-easing="linear">
                            <i class="fa-solid fa-microchip fa-3x"></i>
                            <hr/>
                            <h2>
                                Capacity to users management, candidates and other features.
                                Thanks to our control panel.
                            </h2>
                        </div>
                        <div class="column is-4 has-text-centered has-text-light" data-aos="fade-in" data-aos-easing="linear">
                            <i class="fa-solid fa-landmark fa-3x"></i>
                            <hr/>
                            <h2>
                                Features designed for any democratic state.
                            </h2>
                        </div>
                        <div class="column is-4 has-text-centered has-text-light" data-aos="fade-in" data-aos-easing="linear">
                            <i class="fa-solid fa-code fa-3x"></i>
                            <hr/>
                            <h2>
                                Made code with the latest technologies in security and reliability.
                                Latest technologies on the market.
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
