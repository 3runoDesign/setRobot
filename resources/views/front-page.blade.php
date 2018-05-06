@extends('layouts.app')

@section('notification')
    @component('components.notification-area', ['class' => 'success', 'time' => 2000])
        {{ __('Logged in successfully!', 'setrobot') }}
    @endcomponent
@endsection

@section('content')
<my-teste></my-teste>
@endsection
