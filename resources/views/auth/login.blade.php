@extends('layouts.pages')
@section('containner')
@section('title', 'Connexion')
    <!-- Contact Start -->
    <div class="container-fluid py-5" style="margin-top:-5%;">
        <div class="container py-5">
            <div class="text-center mb-1 pb-3">
                <h2>S'authentifier</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form  method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        @if($errors->get('username'))
                            <div class="alert alert-danger" role="alert">les informations sont incorrects!!</div>
                        @endif
                            <!-- <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="name" placeholder="Your Name"
                                        required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="email" class="form-control p-4" id="email" placeholder="Your Email"
                                        required="required" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div> -->
                            <div class="control-group mt-4">
                                <input type="text" class="form-control p-4" id="username" name="username" placeholder="Nom d'utilisateur"
                                    required="required" data-validation-required-message="Veuillez entrer un nom d'utilisateur" autocomplete="off" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group" style="margin-top:7%;">
                                <input type="password" class="form-control p-4" id="password" name="password" placeholder="Mot de passe"
                                    required="required" data-validation-required-message="Veuillez entrer un mot de passe" autocomplete="newpassword" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <!-- <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Message"
                                    required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div> -->
                            <div style="margin-top:4%;">
                                Vous n'avez pas de compte? <a href="/register">Creer un par ici!</a>
                            </div>
                            <div style="margin-top:4%;">
                                Vous avez oublié votre mot de passe? <a href="/forgot-password">Récupérer un par ici!</a>
                            </div>
                            <div class="text-center" style="margin-top:4%;">
                                <button class="btn btn-primary py-3 px-4" type="submit" id="sendMessageButton">S'authentifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@stop
