@extends('layouts.master')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
                <h3 class="display-4 text-white text-uppercase mt-4">@yield('title')</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Accueil</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">@yield('title')</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    @yield('containner')

@stop
