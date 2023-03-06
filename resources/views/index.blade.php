@extends('layouts.master')
@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/mariage.png" alt="Image" height="600">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Trouvé un assistant pour votre</h4>
                            <h1 class="display-3 text-white mb-md-4">Mariage</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">go!</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img class="w-100" src="img/soiree.png" alt="Image" height="600">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Trouvé un assistant pour votre</h4>
                            <h1 class="display-3 text-white mb-md-4">soirée</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">go!</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img class="w-100" src="img/seminaire.png" alt="Image" height="600">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Trouvé un assistant pour votre</h4>
                            <h1 class="display-3 text-white mb-md-4">seminaire</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">go!</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/annv.png" alt="Image" height="600">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Trouvé un assistant pour votre</h4>
                            <h1 class="display-3 text-white mb-md-4">Anniversaire</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">go!</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Booking Start -->
    <div class="container-fluid booking mt-5 pb-5">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 30px;">
                <div class="row align-items-center" style="min-height: 60px;">
                    <form method="POST" action="{{ route('search') }}">
                        @csrf
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-md-0">
                                        <select name="service" class="custom-select px-4" style="height: 47px;">
                                            <option disabled selected>Choisir un service</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->libelle }}">{{ $service->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-md-0">
                                        <select name="citie" class="custom-select px-4" style="height: 47px;">
                                            <option disabled selected>Choisir une ville</option>
                                            @foreach ($cities as $citie)
                                                <option value="{{ $citie->name }}">{{ $citie->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input class="btn btn-primary btn-block mb-md-0" type="submit"
                                        style="height: 47px; margin-top: -2px;" value="Chercher">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5" style="margin-top: -9%;">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Avantages</h6>
                <h1>Tours & Travel Services</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                        <h5 class="mb-2">Gagnez du temps</h5>
                        <p class="m-0">Economiser du temps en utilisant une plateforme en ligne pour trouver des prestataires de services</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-ticket-alt mx-auto mb-4"></i>
                        <h5 class="mb-2">Gagnez en confiance</h5>
                        <p class="m-0">Consulter les avis et les notations des autres clients pour trouver des prestataires de services de qualité.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2">Économisez de l'argent</h5>
                        <p class="m-0">Economiser de l'argent en comparant les prix des différents prestataires de services.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                        <h5 class="mb-2">Économisez de l'énergie</h5>
                        <p class="m-0">Economiser de l'énergie en utilisant une plateforme en ligne pour trouver des prestataires de services</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-ticket-alt mx-auto mb-4"></i>
                        <h5 class="mb-2">Bénéficiez d'un support client</h5>
                        <p class="m-0">Bénéficier d'un support client pour répondre à vos questions et résoudre les problèmes éventuels.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2">Prestataires variées</h5>
                        <p class="m-0">Un large choix de prestataires de services pour répondre à tous vos besoins.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Destination Start -->
    <div class="container-fluid py-5" style="margin-top: -8%;">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Services</h6>
                <h1>Découvrez Nos Services</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/traiteur.jpeg" alt="Traiteur" style="height: 230px">
                        <a class="destination-overlay text-white text-decoration-none">
                            <h5 class="text-white mt-2">Traiteur</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/photographie.jpeg" alt="Photographie" style="height: 230px">
                        <a class="destination-overlay text-white text-decoration-none">
                            <h5 class="text-white mt-2">Photographie</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/musique.jpeg" alt="Musique" style="height: 230px">
                        <a class="destination-overlay text-white text-decoration-none">
                            <h5 class="text-white mt-2">Groupe Musical</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/assiste.jpeg" alt="Assiste marie" style="height: 230px">
                        <a class="destination-overlay text-white text-decoration-none">
                            <h5 class="text-white mt-2">Negafa</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/makeup.png" alt="Assiste marie" style="height: 230px">
                        <a class="destination-overlay text-white text-decoration-none">
                            <h5 class="text-white mt-2">Mekeup artist</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/local.jpeg" alt="Assiste marie" style="height: 230px">
                        <a class="destination-overlay text-white text-decoration-none">
                            <h5 class="text-white mt-2">Locals</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Destination Start -->




    <!-- Packages Start -->
    <div class="container-fluid py-5" style="margin-top: -7%">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Prestateurs</h6>
                <h1>Notre Perfects Prestateurs</h1>
            </div>
            <div class="row">
                @foreach ($fournisseurs as $fournisseur)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2" style="height: 410px;">
                            <a href="#">
                                <img class="img-fluid" src="fournisseurs/{{ $fournisseur->photo }}" alt=""
                                    style="height: 250px; width:100%">
                            </a>
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i
                                            class="fa fa-map-marker-alt text-primary mr-2"></i>{{ $fournisseur->citie }}</small>
                                    <small class="m-0"><i
                                            class="fa fa-bullseye text-primary mr-2"></i>{{ $fournisseur->service }}</small>
                                    <small class="m-0"><i
                                            class="fa fa-eye text-primary mr-2"></i>{{ $fournisseur->vues }}</small>
                                </div>
                                <a class="h5 text-decoration-none" href="">{{ $fournisseur->raison }}</a>
                                <div class="border-top mt-2 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5
                                            <small>(250)</small>
                                        </h6>
                                        <button class="btn btn-sm btn-secondary ml-auto"
                                            style="width:30%; margin-top:-2%">Voir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <center>
                    <a class="btn btn-primary btn-block" style="width: 40%;" href="/fournisseur">Voir plus</a>
                </center>
            </div>
        </div>
    </div>
    <!-- Packages End -->

    <style>
        .border-rad {

            border-top-right-radius: 28px;
            border-bottom-right-radius: 28px;

            color: #fff;
            background-color: #f9a826;
            border-color: #f9a826;
        }

        #newsletter {
            background-image: url("img/newsletter.jpeg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary  close-btn" data-dismiss="modal">close</button>
            </div>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center align-items-center rows" id="newsletter">

        <div class="col-md-6">


            <div class="row">


                <div class="text-center">

                    <img src="https://i.imgur.com/Dh7U4bp.png" width="250">
                    <span class="d-block mt-3">Inscrivez-vous à notre Newsletter pour ne pas manquer les nouveaux
                        arrivages, <br>
                        les promotions, et les remises de notre magasin.</span>

                    <div class="mx-5">


                        <form id="newsletter-form" method="post">
                            <div class="input-group mb-3 mt-4">
                                <input type="text" name="email" class="form-control" placeholder="Enter email"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-success border-rad" type="submit"
                                    id="button-addon2">Subscribe</button>
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

        $(function() {
            var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'),'keyboard');
            $('#newsletter-form').on('submit', function(e) {
                e.preventDefault();
                
                myModal.show();
                $.ajax({
                    type: 'POST',
                    url: '/subscribe',
                    data: $('#newsletter-form').serialize(),
                    success: function(response) {
                        $('#newsletter-form')[0].reset();
                        $('.modal-body').html(response);
                    },
                    error: function(xhr) {
                        const obj = JSON.parse(xhr.responseText);
                        $('.modal-body').html(obj.message);
                    }
                });
            });
            $('.close-btn').click(function() {
                    myModal.hide();
                    $('.modal-body').html("");
                });
        });
    </script>
@endsection
