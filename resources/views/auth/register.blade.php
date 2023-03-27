@extends('layouts.pages')
@section('containner')
@section('title', 'Inscription')
<style>
    .selected {
        background-color: #FA86C4 !important;
    }

    #offere tr :hover {
        cursor: pointer;
    }
</style>
<!-- Contact Start -->
<div id="client-register" class="container-fluid py-5" style="margin-top:-2%; display:none;">
    <div class="container py-5">
        <div class="text-center mb-1 pb-3">
            <h2>Créer un compte Client</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form bg-white" style="padding: 30px;">
                    <div id="success"></div>
                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">les informations sont bien enregistrées, on
                                va vous communiquer par la suite!</div>
                        @endif
                        <input type="text" value="client" hidden />
                        <div class="control-group">
                            <input type="text" class="form-control p-4" placeholder="Nom complet" name="nom"
                                required="required"
                                data-validation-required-message="Veuillez entrer votre nom complet" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="tel" class="form-control p-4" placeholder="Telephone" name="phone"
                                required="required"
                                data-validation-required-message="Veuillez entrer votre NºTelephone" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control p-4" id="username" name="username"
                                placeholder="Nom d'utilisateur" required="required"
                                data-validation-required-message="Veuillez entrer un nom d'utilisateur"
                                autocomplete="off" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="password" class="form-control p-4" id="password" name="password"
                                placeholder="Mot de passe" required="required"
                                data-validation-required-message="Veuillez entrer un mot de passe"
                                autocomplete="new-password" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <select name="citie" class="custom-select px-4" style="height: 47px;" required="required">
                                <option value="" selected>Choisir une ville</option>
                                @foreach ($cities as $citie)
                                    <option value="{{ $citie->name }}">{{ $citie->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            Vous avez deja un compte? <a href="/login">Authentifier par ici!</a>
                        </div>
                        <div class="text-center mt-3">
                            <button class="btn btn-primary" type="submit">Creer un compte</button>
                        </div>
                        <div class="text-center mt-3">
                            Vous etes un prestataire évenementiel ? <a href="/register#fournisseur">Référencer votre
                                entreprise par ici!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Start -->
<div id="prefournisseur-register" class="container-fluid py-5" style="margin-top:-2%; display:none;">
    <div class="container py-5">
        <div class="text-center mb-1 pb-3">
            <h2>{{ __('Améliorez votre présence en ligne !') }}</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form bg-white" style="padding: 30px;">
                    <div id="success"></div>
                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">les informations sont bien enregistrées, on
                                va vous communiquer par la suite!</div>
                        @endif
                        <input type="text" value="client" hidden />
                        <div class="form-row mt-3">
                            <div class="control-group col-sm-6">
                                <input type="text" class="form-control p-4" placeholder="Nom" name="nom"
                                    id="nom" required="required"
                                    data-validation-required-message="Veuillez entrer votre nom" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group col-sm-6">
                                <input type="text" class="form-control p-4" placeholder="Prenom" name="prenom"
                                    id="prenom" required="required"
                                    data-validation-required-message="Veuillez entrer votre prenom" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="control-group col-sm-6">
                                <input type="tel" class="form-control p-4" placeholder="Telephone" name="phone"
                                    required="required"
                                    data-validation-required-message="Veuillez entrer votre NºTelephone" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group col-sm-6">
                                <input type="email" class="form-control p-4" placeholder="E-Mail" name="email"
                                    required="required"
                                    data-validation-required-message="Veuillez entrer votre E-Mail" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <input type="text" value="pre" name="type" readonly style="display: none;"
                            required>
                        <div class="mt-3">
                            Vous avez deja un compte? <a href="/login">Authentifier par ici!</a>
                        </div>
                        <div class="text-center mt-3">
                            <button class="btn btn-primary" id="btnSub" type="submit">Creer un compte</button>
                        </div>
                        <div class="text-center mt-3">
                            Vous etes un client ? <a href="/register#client">Chercher un prestataire par ici!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="card-group" style="display:none;">
    <div class="card">
        <img src="../../img/event.jpg" class="card-img-top" alt="Connect with Customer">
        <div class="card-body">
            <h5 class="card-title">Vous souhaitez trouver un prestataire ?</h5>
            <p class="card-text">Recherchez des lieux pour vos événements professionnels et recevez des devis
                rapidement</p>
            <a href="#" class="btn btn-primary cli">Créer un compte client</a>
        </div>
    </div>

    <div class="card">
        <img src="../../img/prestataire0.jpg" class="card-img-top" alt="Connect with Seller">
        <div class="card-body">
            <h5 class="card-title">Vous etes un prestataire évenementiel ?</h5>
            <p class="card-text">Créez votre fiche lieu et recevez vos premières demandes de devis</p>
            <a href="#" class="btn btn-primary prest clickPre">Référencer mon entreprise</a>
        </div>
    </div>
</div>
@stop

@section('script')
<script>
    var currentUrl = window.location.href;
    if (currentUrl.includes("client")) {
        document.querySelector('.card-group').style.display = 'none';
        document.querySelector('#client-register').style.display = 'block';
    } else if (currentUrl.includes("prefournisseur")) {
        document.querySelector('.card-group').style.display = 'none';
        document.querySelector('#prefournisseur-register').style.display = 'block';
    } else
        document.querySelector('.card-group').style.display = 'flex';
    document.querySelector('.cli').addEventListener('click', function() {
        document.querySelector('.card-group').style.display = 'none';
        document.querySelector('#client-register').style.display = 'block';
    });
    document.querySelector('.clickPre').addEventListener('click', function() {
        document.querySelector('.card-group').style.display = 'none';
        document.querySelector('#prefournisseur-register').style.display = 'block';
    });
    $(document).ready(function() {
        $('.green').click(function() {
            $('.pricingTable').removeClass('clicked');
            $('.blue').children().eq(0).css('background', '#f5f6f9');
            $(this).children().eq(0).css('background', '#40c952');
            $(this).children().eq(0).css('color', '#40c952');
            $(this).addClass("clicked");
        });
        $('.blue').click(function() {
            $('.pricingTable').removeClass('clicked');
            $('.pricingTable').children().eq(0).css('background', '#f5f6f9');
            $(this).children().eq(0).css('background', '#4b64ff');
            $(this).children().eq(0).css('color', '#4b64ff');
            $(this).addClass("clicked");
        });
        $('.green').click();
    });

    $('#offere tbody').on('hover', 'tr', function() {
        $(this).style();
    });
    $('#offere tbody').on('click', 'tr', function() {
        if (!$(this).hasClass('footerTb')) {
            $('#offere tbody > tr ').removeClass('selected');
            $(this).toggleClass('selected');
            $(this).children().eq(0).children().filter('input').attr('checked', true);
        }
    });
</script>
@stop
