@extends('backoffice.layouts.master')

@section('menu')

    <hr class="sidebar-divider">
    <li class="nav-item bn-ac">
        <a class="nav-link" href="{{route('fournisseur-profile')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>

@endsection
