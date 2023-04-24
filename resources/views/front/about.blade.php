@extends('layouts.front')
@section('title', 'The Royal Hotel | About')

@section('content')

    <div class="inn-banner">
        <div class="container">
            <div class="row">
                <h4>About</h4>
                <p> </p>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li><a href="{{ url('/about') }}">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="inn-body-section">
        <div class="container">
            <div class="row">
                <div class="page-head">
                    <h2>About</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <p>
                    Our Hotel is best among all.
                </p>
            </div>
        </div>
    </div>
@endsection
