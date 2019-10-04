@extends('layouts.main')

@hasSection('content')
    @section('content')
        @yield('content')
    @endsection
@endif

@hasSection('js')
    @section('js')
        @yield('js')
    @endsection
@endif

@hasSection('css')
    @section('css')
        @yield('css')
    @endsection
@endif