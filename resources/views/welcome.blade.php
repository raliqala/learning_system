@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Seed</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

        <!-- Styles -->
        <style>
            html,
            body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links>a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
    </head>

    <body>
        {{-- <div class="landing-page"> --}}
            <section id="hero">
                <div class="hero-container">
                    <div class="wow fadeIn">
                        <div class="hero-logo">
                            <img class="" src=url("./img/logo.png") alt="" />
                        </div>

                        <h1>Welcome to Tholoana-the Seed</h1>
                        {{-- <h2>
                            We all
                            <span class="typewriter" data-typed-items="start somewhere, grow together!, win...!"></span>
                        </h2> --}}
                        <div class="typewriter">
                            <h1>We all start somewhere, we grow together then we all win.</h1>
                          </div>
                        <div class="actions">
                            <a href="{{ route('login') }}" class="btn-get-started">Login</a>
                            <a href="{{ route('register') }}" class="btn-services">Register</a>
                        </div>
                    </div>
                </div>
            </section>
            {{--
        </div> --}}
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    @if (auth()->check())
                        <script>
                            window.location = "/home";

                        </script>
                        @else
                        <a href="{{ url('/home') }}">Home</a>
                    @endif
                    @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (!$users)
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endif

                    @endauth
                </div>
            @endif
        </div> --}}

    </body>

    </html>
