@extends('layouts.pages')
@section('containner')
@section('title', 'Services ')
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Services</h6>
            <h1>Découvrez Nos Services</h1>
        </div>
        <div class="row">
            @foreach ($services as $service)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="destination-item position-relative overflow-hidden mb-2">
                    <img class="img-fluid" src="services/{{$service->description}}" alt="image 404" style="height: 230px">
                    <a class="destination-overlay text-white text-decoration-none">
                        <h5 class="text-white mt-2">{{$service->libelle}}</h5>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop
