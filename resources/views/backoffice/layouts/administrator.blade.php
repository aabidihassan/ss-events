@extends('backoffice.layouts.master')

@section('menu')

    <li class="nav-item bn-ac active">
        <a class="nav-link" href="{{route('adminbackOffice')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

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

@endsection