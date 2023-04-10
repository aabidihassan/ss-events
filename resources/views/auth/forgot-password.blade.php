@extends('layouts.pages')
@section('containner')
@section('title', 'Réinitialisation du mot de passe')
    <!-- Contact Start -->
    <div class="container-fluid py-5" style="margin-top:-5%;">
        <div class="container py-5">
            <div class="text-center mb-1 pb-3">
                <h2>Réinitialisation du mot de passe</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form method="POST" action="{{ route('password.email') }}" autocomplete="off">
                        @csrf
                        @if($errors->get('username'))
                            <div class="alert alert-danger" role="alert">les informations sont incorrects!!</div>
                        @endif
                                <div class="mb-4 text-sm text-gray-600">
                                    {{ __('Mot de passe oublié? Aucun problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d\'en choisir un nouveau.') }}
                                </div>
                            <div class="control-group mt-4">
                                <input type="email" class="form-control p-4" id="email" name="email" placeholder="Votre email"
                                    required="required" data-validation-required-message="Veuillez entrer email" autocomplete="off" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center" style="margin-top:4%;">
                                <button class="btn btn-primary py-3 px-4" type="submit" id="sendMessageButton">{{__('Lien de réinitialisation du mot de passe par e-mail')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@stop