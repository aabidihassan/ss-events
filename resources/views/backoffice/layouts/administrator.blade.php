@extends('backoffice.layouts.master')

@section('menu')

    <hr class="sidebar-divider">
    <li class="nav-item bn-ac">
        <a class="nav-link" href="{{ route('adminPreFournisseur')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Prefournisseur</span></a>
    </li>

    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item bn-ac">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Fournisseurs</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('adminFournisseur')}}">Fournisseurs Active</a>
                <a class="collapse-item" href="{{ route('adminFournisseurReActive')}}">Fournisseurs has abon dés</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item bn-ac">
        <a class="nav-link" href="{{ route('adminAbonnements')}}">
            <i class="fas fa-database"></i>
            <span>Abonnement</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item bn-ac">
        <a class="nav-link" href="{{ route('fournisseur-feedback')}}">
            <i class="fas fa-comment"></i>
            <span>Feedbacks</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item bn-ac">
        <a class="nav-link" href="{{ route('adminService')}}">
            <i class="fas fa-fw fa-comment-alt"></i>
            <span>Services</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item bn-ac">
        <a class="nav-link" href="{{ route('adminClasses')}}">
            <i class="fas fa-object-group"></i>
            <span>Classe</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item bn-ac">
        <a class="nav-link" href="{{ route('adminClient')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Clients</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item bn-ac ">
        <a class="nav-link" href="{{ route('adminProfile')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>

@endsection
