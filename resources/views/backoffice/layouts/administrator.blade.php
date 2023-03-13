@extends('backoffice.layouts.master')

@section('menu')

    <hr class="sidebar-divider">
    <li class="nav-item bn-ac ">
        <a class="nav-link" href="{{ route('adminProfile')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item bn-ac">
        <a class="nav-link" href="{{ route('adminService')}}">
            <i class="fas fa-fw fa-comment-alt"></i>
            <span>Services</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item bn-ac">
        <a class="nav-link" href="{{ route('adminFournisseur')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Fournisseurs</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item bn-ac">
        <a class="nav-link" href="{{ route('adminPreFournisseur')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Prefournisseur</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item bn-ac">
        <a class="nav-link" href="{{ route('adminClient')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Clients</span></a>
    </li>

    
    <hr class="sidebar-divider">
    <li class="nav-item bn-ac">
        <a class="nav-link" href="{{ route('adminClasses')}}">
            <i class="fas fa-object-group"></i>
            <span>Classe</span></a>
    </li>

    
    <hr class="sidebar-divider">
    <li class="nav-item bn-ac">
        <a class="nav-link" href="{{ route('adminAbonnements')}}">
            <i class="fas fa-database"></i>
            <span>Abonnement</span></a>
    </li>

@endsection
