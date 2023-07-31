@extends('layouts.app')

@section('title', 'Home page')

@section('content')
    @include('layouts.inc.frontend.header')

    @include('layouts.inc.frontend.carousel')
    @include('layouts.inc.frontend.main')
    @include('layouts.inc.frontend.footer')
@endsection