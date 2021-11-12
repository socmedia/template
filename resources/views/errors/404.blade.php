@extends('errors::illustrated-layout')

@section('title', __('Not Found'))
@section('code', '404')

@section('message')
{{ $exception->getMessage() ?: 'Not found'}}
@endsection