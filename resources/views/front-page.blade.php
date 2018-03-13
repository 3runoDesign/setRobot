@extends('layouts.app')

@section('content')
    <example-component></example-component>

    <h1>Um test com Blade {{ 2+2 }}</h1>
    <img src="{{\App\get_image('db-bg.jpg')}}" alt="">
@endsection
