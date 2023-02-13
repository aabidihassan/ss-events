@extends('layouts.pages')
@section('containner')
@section('title', 'Inscription')


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
                            @if(session()->has('message'))
                                <div class="alert alert-success" role="alert">les informations sont bien enregistrées, on va vous communiquer par la suite!</div>
                            @endif
                            <!-- <div class="mb-3 mb-md-0">
                                <select class="custom-select px-4" name="type" id="type" style="height: 47px;">
                                    <option value="client"  selected>Client</option>
                                    <option value="pre">Fournisseur</option>
                                </select>
                            </div> -->
                            <div class="form-row mt-3">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" placeholder="Nom" name="nom"
                                        required="required" data-validation-required-message="Veuillez entrer votre nom" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" placeholder="Prenom" name="prenom"
                                        required="required" data-validation-required-message="Veuillez entrer votre prenom" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="tel" class="form-control p-4" placeholder="Telephone" name="phone"
                                        required="required" data-validation-required-message="Veuillez entrer votre NºTelephone" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="email" class="form-control p-4" placeholder="E-Mail" name="email"
                                        required="required" data-validation-required-message="Veuillez entrer votre E-Mail" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="username" name="username" placeholder="Nom d'utilisateur"
                                    required="required" data-validation-required-message="Veuillez entrer un nom d'utilisateur" autocomplete="off" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="password" class="form-control p-4" id="password" name="password" placeholder="Mot de passe"
                                    required="required" data-validation-required-message="Veuillez entrer un mot de passe" autocomplete="new-password" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="2" name="adresse" id="adresse" placeholder="Adresse"
                                    required="required"
                                    data-validation-required-message="Veuillez entrer votre adresse"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="mt-3">
                                Vous avez deja un compte? <a href="/login">Authentifier par ici!</a>
                            </div>
                            <div class="text-center mt-3">
                                <button class="btn btn-primary" type="submit">Creer un compte</button>
                            </div>
                            <div class="text-center mt-3">
                                Vous etes un prestataire évenementiel ? <a href="/register-fournisseur">Référencer votre entreprise par ici!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 


<div class="card-group">
  <div class="card">
    <img src="../../img/event.jpg" class="card-img-top" alt="Connect with Customer">
    <div class="card-body">
      <h5 class="card-title">Vous souhaitez trouver un prestataire ?</h5>
      <p class="card-text">Recherchez des lieux pour vos événements professionnels et recevez des devis rapidement</p>
      <a href="#" class="btn btn-primary cli">Créer un compte client</a>
    </div>
  </div>
  
  <div class="card">
    <img src="../../img/prestataire0.jpg" class="card-img-top" alt="Connect with Seller">
    <div class="card-body">
      <h5 class="card-title">Vous etes un prestataire évenementiel ?</h5>
      <p class="card-text">Créez votre fiche lieu et recevez vos premières demandes de devis</p>
      <a href="/register-fournisseur" class="btn btn-primary prest">Référencer mon entreprise</a>
    </div>
  </div>
</div>




    <!-- Contact End -->
@stop


@section('script')

    <script>

        document.querySelector('.cli').addEventListener('click', function() {
            document.querySelector('.card-group').style.display = 'none';
            document.querySelector('#client-register').style.display = 'block';
        });

            // $('#type').on('change', function(){
            //     console.log($(this).val())
            //     if($(this).val() == 'pre'){
            //         $('#username').hide().removeAttr('required');
            //         $('#password').hide().removeAttr('required');
            //         $('#adresse').hide().removeAttr('required');
            //     }else{
            //         $('#username').show().attr('required', 'true');
            //         $('#password').show().attr('required', 'true');
            //         $('#adresse').show().attr('required', 'true');
            //     }
            // })
        </script>

@stop


