@extends('layouts.pages')
@section('containner')
@section('title', 'Profile')

<div class="container mt-4">
    @if (session()->has('message'))
        <div class="alert alert-success mt-4" role="alert">les informations sont bien enregistrées!</div>
    @endif
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin"
                                class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <h4 class="mb-3">{{ $client->nom }} {{ $client->prenom }} </h4>
                                <p class="text-muted font-size-sm">{{ $client->telephone }}</p>
                                <p class="text-muted font-size-sm">{{ $client->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <form method="POST" action="{{ route('editCompte') }}">
                            @csrf
                            <div class="d-flex flex-column">
                                <div class="col text-secondary">
                                    <h6>Nom d'utilisateur</h6>
                                </div>
                                <div class="col text-secondary">
                                    <input type="text" class="form-control" name="username"
                                        value="{{ auth()->user()->username }}">
                                </div>
                                <div class="col text-secondary mt-4">
                                    <h6>Nouveau mot de passe</h6>
                                </div>
                                <div class="col text-secondary">
                                    <input type="password" class="form-control" name="password"
                                        autocomplete="new-password">
                                </div>
                                <div class="col text-secondary">
                                    <input type="submit" class="btn btn-primary px-4 mt-4" value="Modifier">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active nav-card-header" href="#personal-info">Informations
                                    personnels</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-card-header" href="#contact-info">Feedback Table</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div id="personal-info" class="content-body-card">
                            <!-- personal info fields here -->
                            <form method="POST" action="{{ route('editProfile') }}">
                                @csrf
                                <h5 class="text-center">Les informations personnels</h5>
                                <div class="row mb-3 mt-4">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nom Complet</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="nom"
                                            value="{{ $client->nom }}">
                                    </div>
                                </div>
                                <!--div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Prenom</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="prenom"
                                            value="{{ $client->prenom }}">
                                    </div>
                                </div-->
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $client->email }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Telephone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="telephone"
                                            value="{{ $client->telephone }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{__('Ville')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="citie" class="custom-select px-4" style="height: 47px;" required="required">
                                            <option value="" >Choisir une ville</option>
                                            @foreach ($cities as $citie)
                                                <option value="{{ $citie->name }}" 
                                                @if ($citie->name == $client->citie )
                                                    selected
                                                @endif
                                                >{{ $citie->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control py-3 px-4" rows="3" name="adresse" id="adresse" placeholder="Adresse"
                                            required="required" data-validation-required-message="Veuillez entrer votre adresse">{{ $client->adresse }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Modifier">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="contact-info" class="content-body-card" style="display: none;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" d="dataTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Fournisseur</th>
                                                <th>Commentaire</th>
                                                <th>Date</th>
                                                <th>Rating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($feedbacks as $feedback)
                                                <tr>
                                                    <td>{{ $feedback->raison }}</td>
                                                    <td>{{ $feedback->commentaire }}</td>
                                                    <td>{{ $feedback->dateCommit }}</td>
                                                    <td>{{ $feedback->rating }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                    <h5 class="d-flex align-items-center mb-3">Project Status</h5>
                    <p>Web Design</p>
                    <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p>Website Markup</p>
                    <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p>One Page</p>
                    <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p>Mobile Template</p>
                    <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p>Backend API</p>
                    <div class="progress" style="height: 5px">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    </div>
                </div>
                </div>
                </div> -->
        </div>
    </div>
</div>
</div>

@stop

@section('script')
<script>
    $(document).ready(function() {
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
