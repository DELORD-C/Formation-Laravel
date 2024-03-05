@extends('base')

@section('title') Default @endsection

@section('body')
    <h1>{{ $var }}</h1>
    {{--{!! $var !!}--}}
    <p>The current timestamp is {{ time() }}</p>
@endsection
