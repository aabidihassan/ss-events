@extends('layouts.pages')
@section('title', 'Prestataire')
@section('containner')

    <div class="wrapper">
        <div class="container">
            <h2 class="text-center">Améliorez votre présence en ligne !</h2>

            <div class="row mt-5">

                <div class="col-md-4 ">
                    <div class="card shadow-sm">
                        <img src="../../img/visibility.png" />
                        <div class="card-body">
                            <h5>Augmentez votre visibilité</h5>
                            <p>Vous présentez dans votre vitrine tous vous offres et services d'une manière attractive et
                                persuasive</p>
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

    <style>
        .compare-packages table thead th {
            border-bottom: 2px solid #dee2e6;
            vertical-align: middle;
            font-size: 20px;
            color: #ff9800;
        }
        .compare-packages table thead th p {
            font-size: 16px;
            font-weight: 400;
            color: #333;
        }
        .compare-packages table td {
            text-align: center;
        }
        .compare-packages table td:first-child {
            text-align: left;
        }
        .compare-packages table tr:last-child td {
            font-weight: bold;
            line-height: 40px;
            font-size: 20px;
        }
    </style>

    <div class="demo">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 mt-5">
                    <h3 class="bg-light p-2 mb-3">Compare Packages</h3>
                    <div class="table-responsive compare-packages">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="240px">
                                        Plans
                                        <p>Total Prices for each service</p>
                                    </th>
                                    @foreach ($classes as $classe)
                                        <th data-classe="{{$classe->id}}">
                                            {{$classe->type}}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                <tr>
                                    <td data-group="{{$service->id_classe}}">{{$service->libelle}}</td>
                                    @foreach ($classes as $classe)
                                        @if ($service->id_classe == $classe->id)
                                            <td>Yes</td>
                                        @else
                                            <td>No</td>
                                        @endif
                                    @endforeach
                                </tr> 
                                @endforeach
                                <tr>
                                    <td>Total Prices</td>
                                    @foreach ($classes as $classe)
                                    <td>
                                        {{$classe->prix_monthly}} (MAD)
                                        <br/>
                                        <a href="#{{$classe->type}}" class="btn btn-warning">Continue</a>
                                    </td>
                                    @endforeach
                                </tr>
                                <script>

                                </script>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
