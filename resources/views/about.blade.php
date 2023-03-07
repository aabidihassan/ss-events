@extends('layouts.pages')
@section('title', 'A propos')
@section('containner')
    <link href="{{ asset('css/contactus.css') }}" rel="stylesheet">

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">TÉMOIGNAGE</h6>
                <h1>Que Disent Nos Clients</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">

                <!-- Témoignage 1 -->
                <div class="text-center pb-4">
                    <img class="img-fluid mx-auto" src="img/testimonial-1.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">"J'ai utilisé ce service pour la première fois et j'ai été vraiment impressionné
                            par la qualité du travail fourni."</p>
                        <h5 class="text-truncate">Jean Dupont</h5>
                    </div>
                </div>

                <!-- Témoignage 2 -->
                <div class="text-center pb-4">
                    <img class="img-fluid mx-auto" src="img/testimonial-2.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">"Je suis un client fidèle de ce service depuis plusieurs années maintenant et je
                            suis toujours satisfait des résultats."</p>
                        <h5 class="text-truncate">Marie Martin</h5>
                    </div>
                </div>

                <!-- Témoignage 3 -->
                <div class="text-center pb-4">
                    <img class="img-fluid mx-auto" src="img/testimonial-3.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">"Je recommande vivement ce service à tous ceux qui cherchent une solution
                            professionnelle et abordable."</p>
                        <h5 class="text-truncate">Pierre Durand</h5>
                    </div>
                </div>

                <!-- Témoignage 4 -->
                <div class="text-center pb-4">
                    <img class="img-fluid mx-auto" src="img/testimonial-4.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">"Le service est rapide, fiable et efficace. Je le recommande à tous ceux qui ont
                            besoin d'un travail de qualité."</p>
                        <h5 class="text-truncate">Sophie Dubois</h5>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    @include('fournisseurs.inscription')


    <div class="container-fluid py-5" style="margin-top: -5%">
        <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="wrapper">
                <div class="row no-gutters mb-5">
                    <div class="col-md-7">
                        <div class="contact-wrap w-100 p-md-5 p-4">
                            <h3 class="mb-4">Nous Contacter</h3>
                            <div id="form-message-warning" class="mb-4"></div>
                            @if (session('success'))
                                <div id="form-message-success" class="mb-4">
                                    Your message was sent, thank you!
                                </div>
                            @endif
                            <form method="POST" id="contactForm" name="contactForm" class="contactForm"
                                action="{{ route('contact') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label" for="name">Nom</label>
                                            <input type="text" class="form-control" name="nom" id="name"
                                                placeholder="Nom">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label" for="email">Prenom</label>
                                            <input type="text" class="form-control" name="prenom" id="email"
                                                placeholder="Prenom">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="label" for="subject">E-Mail</label>
                                            <input type="email" class="form-control" name="email" id="subject"
                                                placeholder="E-Mail">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="label" for="#">Message</label>
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" value="Envoyer le Message" class="btn btn-primary">
                                            <div class="submitting"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5 d-flex align-items-stretch">
                        <div id="map">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div class="text">
                                <p></span> Gueliz, Marrakech, Maroc</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="text">
                                <p><a href="tel://1234567920">+ 212 600-000000</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-envelope"></span>
                            </div>
                            <div class="text">
                                <p><a href="mailto:sseventskech@gmail.com">sseventskech@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-globe"></span>
                            </div>
                            <div class="text">
                                <p><a href="eventkech.com">www.eventkech.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@stop
