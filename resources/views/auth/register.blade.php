@extends('layouts.pages')
@section('containner')
@section('title', 'Inscription')
<style>
    .pricingTable {
        text-align: center;
        background: #fff;
        margin: 0 10px;
        box-shadow: 0 0 10px #ababab;
        padding-bottom: 40px;
        border-radius: 10px;
        color: #cad0de;
        transform: scale(1);
        transition: all .5s ease 0s
    }

    .pricingTable:hover {
        transform: scale(1.05);
        z-index: 1
    }

    .pricingTable .pricingTable-header {
        padding: 40px 0;
        background: #f5f6f9;
        border-radius: 10px 10px 50% 50%;
        transition: all .5s ease 0s
    }

    .pricingTable:hover .pricingTable-header {
        background: #ff9624
    }

    .pricingTable .pricingTable-header i {
        font-size: 50px;
        color: #858c9a;
        margin-bottom: 10px;
        transition: all .5s ease 0s
    }

    .pricingTable .price-value {
        font-size: 35px;
        color: #ff9624;
        transition: all .5s ease 0s
    }

    .pricingTable .month {
        display: block;
        font-size: 14px;
        color: #cad0de
    }

    .pricingTable:hover .month,
    .pricingTable:hover .price-value,
    .pricingTable:hover .pricingTable-header i {
        color: #fff
    }

    .pricingTable .heading {
        font-size: 24px;
        color: #ff9624;
        margin-bottom: 20px;
        text-transform: uppercase
    }

    .pricingTable .pricing-content ul {
        list-style: none;
        padding: 0;
        margin-bottom: 30px
    }

    .pricingTable .pricing-content ul li {
        line-height: 30px;
        color: #a7a8aa
    }

    .pricingTable .pricingTable-signup a {
        display: inline-block;
        font-size: 15px;
        color: #fff;
        padding: 10px 35px;
        border-radius: 20px;
        background: #ffa442;
        text-transform: uppercase;
        transition: all .3s ease 0s
    }

    .pricingTable .pricingTable-signup a:hover {
        box-shadow: 0 0 10px #ffa442
    }

    .pricingTable.blue .heading,
    .pricingTable.blue .price-value {
        color: #4b64ff
    }

    .pricingTable.blue .pricingTable-signup a,
    .pricingTable.blue:hover .pricingTable-header {
        background: #4b64ff
    }

    .pricingTable.blue .pricingTable-signup a:hover {
        box-shadow: 0 0 10px #4b64ff
    }

    .pricingTable.red .heading,
    .pricingTable.red .price-value {
        color: #ff4b4b
    }

    .pricingTable.red .pricingTable-signup a,
    .pricingTable.red:hover .pricingTable-header {
        background: #ff4b4b
    }

    .pricingTable.red .pricingTable-signup a:hover {
        box-shadow: 0 0 10px #ff4b4b
    }

    .pricingTable.green .heading,
    .pricingTable.green .price-value {
        color: #40c952
    }

    .pricingTable.green .pricingTable-signup a,
    .pricingTable.green:hover .pricingTable-header {
        background: #40c952
    }

    .pricingTable.green .pricingTable-signup a:hover {
        box-shadow: 0 0 10px #40c952
    }

    .pricingTable.blue:hover .price-value,
    .pricingTable.green:hover .price-value,
    .pricingTable.red:hover .price-value {
        color: #fff
    }

    @media screen and (max-width:990px) {
        .pricingTable {
            margin: 0 0 20px
        }
    }

    .pricingTable.clicked {
        transform: scale(1.05);
        z-index: 1;
    }

    .pricingTable.clicked .pricingTable-header {
        
    }

    .pricingTable.clicked .month,
    .pricingTable.clicked .price-value,
    .pricingTable.clicked .pricingTable-header i {
        color: #fff;
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
                            @if(session()->has('message'))
                                <div class="alert alert-success" role="alert">les informations sont bien enregistrées, on va vous communiquer par la suite!</div>
                            @endif
                            <!-- <div class="mb-3 mb-md-0">
                                <select class="custom-select px-4" name="type" id="type" style="height: 47px;">
                                    <option value="client"  selected>Client</option>
                                    <option value="pre">Fournisseur</option>
                                </select>
                            </div> -->
                            <input type="text" value="client" hidden/>
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

    <!-- Contact Start -->
    <div id="prefournisseur-register" class="container-fluid py-5" style="margin-top:-2%; display:none; ">
        <div class="container py-5">
            <div class="text-center mb-1 pb-3">
                <h2>{{__('Améliorez votre présence en ligne !')}}</h2>
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
                            <input type="text" value="client" hidden/>
                                <div class="form-row mt-3">
                                    <div class="control-group col-sm-6">
                                        <input type="text" class="form-control p-4" placeholder="Nom" name="nom" id="nom"
                                            required="required" data-validation-required-message="Veuillez entrer votre nom" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <input type="text" class="form-control p-4" placeholder="Prenom" name="prenom" id="prenom"
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
                                    <textarea class="form-control py-3 px-4" rows="2" name="adresse" id="adresse" placeholder="Adresse"
                                        required="required"
                                        data-validation-required-message="Veuillez entrer votre adresse"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>          
                                <div class="control-group row">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary active col-md-12">
                                            <input type="radio" name="options" value="6" id="option6month" autocomplete="off" checked> 
                                            <div class="pricingTable green">
                                                <div class="pricingTable-header">
                                                    <div class="price-value"> $10.00 <span class="month">per month</span> </div>
                                                </div>
                                                <h3 class="heading">BUSINESS</h3>
                                                <div class="pricing-content">
                                                    <ul>
                                                        <li><b>50GB</b> Disk Space</li>
                                                        <li><b>50</b> Email Accounts</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </label>
                                        <label class="btn btn-secondary col-md-12">
                                          <input type="radio" name="options" value="12" id="option12month" autocomplete="off"> 
                                          <div class="pricingTable blue">
                                            <div class="pricingTable-header">
                                                <div class="price-value"> $20.00 <span class="month">per month</span> </div>
                                            </div>
                                            <h3 class="heading">PREMIUM</h3>
                                            <div class="pricing-content">
                                                <ul>
                                                    <li><b>50GB</b> Disk Space</li>
                                                    <li><b>50</b> Email Accounts</li>
                                                </ul>
                                            </div>
                                        </div>
                                        </label>
                                    </div>
                                </div>
                                <input type="text" value="pre" name="type" readonly style="display: none;" required>
                                <div class="mt-3">
                                    Vous avez deja un compte? <a href="/login">Authentifier par ici!</a>
                                </div>
                                <div class="text-center mt-3">
                                    <button class="btn btn-primary" id="btnSub" type="submit">Creer un compte</button>
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
      <a href="#" class="btn btn-primary prest clickPre">Référencer mon entreprise</a>
    </div>
  </div>
</div>
@stop

@section('script')
    <script>
        var currentUrl = window.location.href;
        console.log(currentUrl);
        if (currentUrl.includes("client")) {
                document.querySelector('.card-group').style.display = 'none';
                document.querySelector('#client-register').style.display = 'block';
        }
        if (currentUrl.includes("prefournisseur")) {
            document.querySelector('.card-group').style.display = 'none';
            document.querySelector('#prefournisseur-register').style.display = 'block';
        }
        document.querySelector('.cli').addEventListener('click', function() {
            document.querySelector('.card-group').style.display = 'none';
            document.querySelector('#client-register').style.display = 'block';
        });
        document.querySelector('.clickPre').addEventListener('click', function() {
            document.querySelector('.card-group').style.display = 'none';
            document.querySelector('#prefournisseur-register').style.display = 'block';
        });
        $(document).ready(function () {
            $('.green').click(function () {
                $('.pricingTable').removeClass('clicked');
                $('.blue').children().eq(0).css('background','#f5f6f9');
                $(this).children().eq(0).css('background','#40c952');
                $(this).children().eq(0).css('color','#40c952');
                $(this).addClass("clicked");
            });
            $('.blue').click(function () {
                $('.pricingTable').removeClass('clicked');
                $('.pricingTable').children().eq(0).css('background','#f5f6f9');
                $(this).children().eq(0).css('background','#4b64ff');
                $(this).children().eq(0).css('color','#4b64ff');
                $(this).addClass("clicked");
            });
            $('.green').click();
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


