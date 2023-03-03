@extends('layouts.layout')

@section('title')
    404 Error : Not Found
@endsection

@section('content')
    <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
@endsection
