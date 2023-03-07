@extends('layouts.pages')
@section('containner')
@section('title', 'Detail')


  <div class="container px-4 py-5" id="custom-cards">
    <h2 class="pb-2 border-bottom">{{$fournisseur[0]->raison}}</h2>
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        @foreach (File::allFiles(public_path('fournisseurs/' .  '6/')) as $file)
        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-1.jpg');">
            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Short title, long jacket</h3>
                <ul class="d-flex list-unstyled mt-auto">
                <li class="me-auto">
                    <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                </li>
                <li class="d-flex align-items-center me-3">
                    <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"/></svg>
                    <small>Earth</small>
                </li>
                <li class="d-flex align-items-center">
                    <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
                    <small>3d</small>
                </li>
                </ul>
            </div>
            </div>
        </div>
        @endforeach
    </div>
      {{--
    
    @foreach (File::allFiles(public_path('fournisseurs/' . auth()->user()->id . '/')) as $file)
                            <div class="card p-1" style="width: 14rem;">
                                <img class="card-img-top"
                                    src="{{ asset('fournisseurs/' . auth()->user()->id . '/' . $file->getFilename()) }}"
                                    style="height: 200px;">
                                <button type="button" class="btn btn-primary mt-1 ml-3 mr-3 set-profile-picture"
                                    style="font-size : 10px;" data-image="{{ $file->getFilename() }}">Choisir photo
                                    de profile</button>
                            </div>
                        @endforeach
        --}}
    
  </div>
  @stop