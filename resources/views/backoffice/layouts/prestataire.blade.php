@extends('backoffice.layouts.master')

@section('menu')

    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/profile">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/feedbacks">
            <i class="fas fa-fw fa-comment-alt"></i>
            <span>Feedbacks</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/abonnement">
            <i class="fas fa-fw fa-gem"></i>
            <span>Abonnement</span></a>
    </li>

@endsection
