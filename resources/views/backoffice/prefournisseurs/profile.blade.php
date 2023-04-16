@extends('backoffice.layouts.prefournisseur')
@section('title', 'Profile')
@section('content')

    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin"
                                class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <h4 class="mb-3">{{ session('profile')->nom }} {{ session('profile')->prenom }} </h4>
                                <p class="text-muted font-size-sm">{{ session('profile')->telephone }}</p>
                                <p class="text-muted font-size-sm">{{ session('profile')->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active nav-card-header" href="#acount-info">Informations du compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-card-header" href="#personal-info">Informations personnels</a>
                        </li>
                    </ul>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="content-body-card" id="acount-info">
                        <form method="POST" action="{{ route('editComptePer') }}">
                            @csrf
                            <h5 class="text-center">Informations de compte</h5>
                            <div class="row mb-3 mt-4">
                                <div class="col-sm-3 text-secondary">
                                    <h6>E-Mail</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" class="form-control" name="email" required
                                        value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                            <div class="row mb-3 mt-4">
                                <div class="col-sm-3 text-secondary mt-4">
                                    <h6>Nouveau mot de passe</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" class="form-control" name="password" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col text-secondary">
                                <input type="submit" class="btn btn-primary px-4 mt-4" value="Modifier">
                            </div>
                        </form>
                    </div>
                    <div class="content-body-card" id="personal-info" style="display: none;">
                        <form method="POST" action="{{ route('editProfilePer') }}">
                            @csrf
                            <div class="row mb-3 mt-4">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="nom" value="{{ session('profile')->nom }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Prénom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="prenom"
                                        value="{{ session('profile')->prenom }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Télèphone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="telephone"
                                        value="{{ session('profile')->telephone }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Service</h6>
                                </div>
                                <div class="control-group col-sm-6">
                                    <select name="service" class="custom-select px-4" style="height: 47px;" required>
                                        <option disabled selected>Choisir un service</option>
                                        @foreach ($services as $service)
                                            
                                            <option value="{{ $service->libelle }}" @if (session('profile')->service == $service->libelle) @selected(true) @endif>{{ $service->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ville</h6>
                                </div>
                                <div class="control-group col-sm-6">
                                    <select name="citie" class="custom-select px-4" style="height: 47px;"
                                        required="required">
                                        <option value="" selected>Choisir une ville</option>
                                        @foreach ($cities as $citie)
                                            <option value="{{ $citie->name }}" @if (session('profile')->citie == $citie->name) @selected(true) @endif>{{ $citie->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col text-secondary">
                                <input type="submit" class="btn btn-primary px-4 mt-4" value="Modifier">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function() {
            $('.bn-ac').removeClass('active');
            $(".bn-ac").eq(8).addClass('active');
            $('.nav-card-header').click(function(e) {
                e.preventDefault();
                $('.nav-card-header').removeClass('active');
                $(this).addClass('active');
                var target = $(this).attr('href');
                $('.content-body-card').hide();
                $(target).show();
            });
        });
    </script>
@endsection
