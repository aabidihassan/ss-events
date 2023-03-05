@extends('layouts.pages')
@section('title', 'A propos')
@section('containner')
    <link href="{{ asset('css/aboutus.css') }}" rel="stylesheet">

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonial</h6>
                <h1>What Say Our Clients</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="text-center pb-4">
                    <img class="img-fluid mx-auto" src="img/testimonial-1.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod
                            eos labore diam
                        </p>
                        <h5 class="text-truncate">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
                <div class="text-center">
                    <img class="img-fluid mx-auto" src="img/testimonial-2.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod
                            eos labore diam
                        </p>
                        <h5 class="text-truncate">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
                <div class="text-center">
                    <img class="img-fluid mx-auto" src="img/testimonial-3.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod
                            eos labore diam
                        </p>
                        <h5 class="text-truncate">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
                <div class="text-center">
                    <img class="img-fluid mx-auto" src="img/testimonial-4.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod
                            eos labore diam
                        </p>
                        <h5 class="text-truncate">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Registration Start -->
    <div class="container-fluid bg-registration py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Offre limitée</h6>
                        <h1 class="text-white"><span class="text-primary">4 mois</span> gratuit</h1>
                    </div>
                    <p class="text-white">Inscrivez-vous dès maintenant pour bénéficier de cette offre exceptionnelle et
                        commencez à explorer toutes les fonctionnalités et avantages de notre plateforme. </p>
                    <ul class="list-inline text-white m-0">
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Augmenter votre visibilité.</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Trouver de nouveaux clients.</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Économisez de l'argent.</li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="card" style="background-color: rgba(0,0,0,.7)">
                        <div class="text-center">
                            <h2 class="card-title pt-2 text-white">
                                <strong>Accès prestataire</strong>
                            </h2>
                        </div>
                        <div>
                            <a class="btn btn-primary btn-block py-3" href="/register-fournisseur">Inscrivez-vous</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->


    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="wrapper" style="width: 80%; padding:2%;">
        <div class="inner" style="background-image: url('img/registration-form-2.jpeg');">
            <form method="post" action="{{ route('contact') }}">
                @csrf
                <h3>contactez-nous</h3>
                <div class="form-group">
                    <div class="form-wrapper">
                        <label for="">Prenom</label>
                        <input type="text" name="prenom" class="form-control" required>
                    </div>
                    <div class="form-wrapper">
                        <label for="">Nom</label>
                        <input type="text" name="nom" class="form-control" required>
                    </div>
                </div>
                <div class="form-wrapper">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="form-wrapper">
                    <label for="">Message</label>
                    <textarea class="form-control" name="message" rows="6" required></textarea>
                </div>
                <button>Envoyer</button>
            </form>
        </div>
    </div>
@stop
