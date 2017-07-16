@extends('layouts.app')

@section('content')
    <header class="hero-header-main">
        <section class="container">
            <div class="hero-text">
                <h1>
                    {!! App::getDescription() !!}
                </h1>
            </div>
        </section>
    </header>
@endsection
