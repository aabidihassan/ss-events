@extends('backoffice.layouts.master')

@section('menu')

    <li class="nav-item active">
        <a class="nav-link" href="{{route('fournisseur-dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('fournisseur-profile')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('fournisseur-feedback')}}">
            <i class="fas fa-fw fa-comment-alt"></i>
            <span>Feedbacks</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('fournisseur-abonnement')}}">
            <i class="fas fa-fw fa-gem"></i>
            <span>Abonnement</span></a>
    </li>

@endsection
