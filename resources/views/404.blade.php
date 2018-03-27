
@extends('layouts.app')

@section('content')
    <div class="alert -warning">
        {{ __('404 - Page Not Found', 'setrobot') }}
    </div>
    {!! get_search_form(false) !!}
@stop
