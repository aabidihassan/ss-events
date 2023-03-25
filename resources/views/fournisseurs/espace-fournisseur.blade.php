@extends('layouts.pages')
@section('title', 'Prestataire')
@section('containner')

<link rel="stylesheet" href="{{ asset('css/espace-prestataire.css') }}">

    <div class="wrapper">
        <div class="container">
            <h2 class="text-center">Améliorez votre présence en ligne !</h2>

            <div class="row mt-5">

                <div class="col-md-4 ">
                    <div class="card shadow-sm">
                        <img src="../../img/visibility.png" />
                        <div class="card-body">
                            <h5>Augmentez votre visibilité</h5>
                            <p>Vous présentez dans votre vitrine tous vos offres et services d'une manière attractive,
                                persuasive et professionnelle.</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="../../img/demande.png" />
                        <div class="card-body">
                            <h5>Recevez plus de demandes de prestations</h5>
                            <p>On va vous aider à attirer plus de prestations et vous mettre au coeur de notre priorité</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="../../img/client.png" />
                        <div class="card-body">
                            <h5>Obtenez plus de clients</h5>
                            <p>Vous développez votre activité en obtenant plus de nouveaux clients intéressées par votre
                                prestations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <h2 class="text-center">Quels sont nos services ?</h2>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Augmentez votre portée</h5>
                            <p class="m-0">Augmenter votre visibilité en ligne et toucher un public plus large.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Gagnez en crédibilité</h5>
                            <p class="m-0">Bénéficier d'un système de notation et d'avis sur votre plateforme.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Gagnez du temps</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Économisez de l'argent</h5>
                            <p class="m-0">Économiser de l'argent en évitant les coûts de publicité traditionnels</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Best Services</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3"
                            style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Worldwide Coverage</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('fournisseurs.inscription')

    <div class="demo">
        <div class="container">
            <h2 class="text-center mb-4">Découvrez Nos Offres !</h2>
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-6">
                    <div class="pricingTable">
                        <div class="pricingTable-header">
                            <div class="price-value"> <b> Gold </b></div>
                        </div>
                        <div class="pricing-content mt-4">
                            <ul>
                                <li><b>Affichage</b> gratuit de votre annonce.</li>
                                <li><b>Demande</b> d'information et de devis.</li>
                                <li><b>Coordonés</b> complétes.</li>
                                <li><b>Lien</b> vers votre site web.</li>
                                <li><b>Recevez</b> des demandes d'information par téléphone.</li>
                                <li><b>Utilisation</b> de la fonctionnalités Galerie photos et vidéos</li>
                                <li><b>Dashboard</b> de suivie et gestion.</li>
                            </ul>
                        </div>
                        <div class="pricingTable-signup">
                            <a>Inscrivez-Vous</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="pricingTable green">
                        <div class="pricingTable-header">
                            <div class="price-value"> <b> Platinum </b></div>
                        </div>
                        <div class="pricing-content mt-4">
                            <ul>
                                <li><b>Affichage</b> gratuit de votre annonce.</li>
                                <li><b>Demande</b> d'information et de devis.</li>
                                <li><b>Coordonés</b> complétes.</li>
                                <li><b>Lien</b> vers votre site web.</li>
                                <li><b>Recevez</b> des demandes d'information par téléphone.</li>
                                <li><b>Utilisation</b> de la fonctionnalités Galerie photos et vidéos</li>
                                <li><b>Dashboard</b> de suivie et gestion.</li>
                                <li><b>Position</b> téte de List.</li>
                                <li><b>Position</b> dans les recommandations (page d'acceuil)</li>
                                <li><b>Personalinsé</b>vos pubs</li>
                            </ul>
                        </div>
                        <div class="pricingTable-signup">
                            <a>Inscrivez-Vous</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2 mt-4">
            <h2 class="text-center mb-4">Découvrez Nos Abonnements !!</h2>
            <div class="table-responsive compare-packages">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="240px">
                                Services
                                {{-- <p>Total Prices for each service</p> --}}
                            </th>
                            @foreach ($classes as $classe)
                                <th data-classe="{{ $classe->id }}">
                                    {{ $classe->type }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td data-group="{{ $service->id_classe }}">{{ $service->libelle }}</td>
                                @foreach ($classes as $classe)
                                    @if ($service->id_classe == $classe->id)
                                        <td><i class="fa fa-check-circle text-success"></i></td>
                                    @else
                                        <td><i class="fa fa-times-circle text-danger"></i></td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                        <tr>
                            <td>Total Prices</td>
                            @foreach ($classes as $classe)
                                <td>
                                    {{ $classe->prix_monthly }} (MAD)
                                    <br />
                                    <a href="#{{ $classe->type }}" class="btn btn-warning">Continue</a>
                                </td>
                            @endforeach
                        </tr>
                        <script></script>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
