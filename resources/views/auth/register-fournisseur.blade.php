@extends('layouts.pages')
@section('title', 'Prestataire')
@section('containner')
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
</style>
    <!-- Contact Start -->
    <div id="client-register" class="container-fluid py-5" style="margin-top:-2%; ">
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
<div class="demo">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <div class="price-value"> $10.00 <span class="month">per month</span> </div>
                    </div>
                    <h3 class="heading">Standard</h3>
                    <div class="pricing-content">
                        <ul>
                            <li><b>50GB</b> Disk Space</li>
                            <li><b>50</b> Email Accounts</li>
                            <li><b>50GB</b> Monthly Bandwidth</li>
                            <li><b>10</b> subdomains</li>
                            <li><b>15</b> Domains</li>
                        </ul>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="{{route('register-fournisseur')}}">sign up</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable green">
                    <div class="pricingTable-header">
                        <div class="price-value"> $20.00 <span class="month">per month</span> </div>
                    </div>
                    <h3 class="heading">Business</h3>
                    <div class="pricing-content">
                        <ul>
                            <li><b>60GB</b> Disk Space</li>
                            <li><b>60</b> Email Accounts</li>
                            <li><b>60GB</b> Monthly Bandwidth</li>
                            <li><b>15</b> subdomains</li>
                            <li><b>20</b> Domains</li>
                        </ul>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="{{route('register-fournisseur')}}">sign up</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable blue">
                    <div class="pricingTable-header">
                        <div class="price-value"> $30.00 <span class="month">per month</span> </div>
                    </div>
                    <h3 class="heading">Premium</h3>
                    <div class="pricing-content">
                        <ul>
                            <li><b>70GB</b> Disk Space</li>
                            <li><b>70</b> Email Accounts</li>
                            <li><b>70GB</b> Monthly Bandwidth</li>
                            <li><b>20</b> subdomains</li>
                            <li><b>25</b> Domains</li>
                        </ul>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="{{route('register-fournisseur')}}">sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
<script>
    $(document).ready(function () {
        $('#username').change(function () {
            var user = $(this).val();
            $.ajax({
                type: 'POST',
                url: '{{ route('checkUsername') }}',
                data: {'username' : user},
                success: function(response) {
                    if (response) {
                        $('#username').addClass('is-invalid');
                        $('#username').siblings('.help-block').text('Veuillez entrer un nom d\'utilisateur');
                        $('#btnSub').prop('disabled', true);
                    }else{
                        $('#username').removeClass('is-invalid');
                        $('#username').siblings('.help-block').text('');
                        $('#btnSub').prop('disabled', false);
                    }
                },
                error: function(xhr) {
                    console.log( JSON.parse(xhr.responseText));
                }
            }); 
        });
    });
</script>
@endsection