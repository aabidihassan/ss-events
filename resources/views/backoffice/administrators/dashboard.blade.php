@extends('backoffice.layouts.administrator')
@section('title', 'Dashboard')
@section('content')

    <!-- Content Row -->
    <div class="row">
        <!-- Card Total clients -->
        <div class="col-xl-2 col-md-2 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Nombre de Clients</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dataClient}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Total Fournisseur -->
        <div class="col-xl-2 col-md-2 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Nombre de Fournisseur</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data->trueCount+$data->falseCount;}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Total Vues -->
        <div class="col-xl-2 col-md-2 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Nombre de Vues</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countVues}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Total Contact -->
        <div class="col-xl-2 col-md-2 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Nombre de Contact</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countContact}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Total Feedbacks -->
        <div class="col-xl-2 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Feedbacks</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dataFeedback}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Total clients -->
        <div class="col-xl-2 col-md-2 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Nombre Abonnés Newsletter</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dataNewsL}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-lg-7">            
            <!-- Bar Chart Fournisseurs -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary" id="titel_charts_bar">Chart Fournisseurs Par Villes</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinkFournisseur"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLinkFournisseur">
                            <div class="dropdown-header">Afficher Par:</div>
                            <a class="dropdown-item" href="#">Villes</a>
                            <a class="dropdown-item" href="#">Service</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <script>
                            var _data_myAreaChartBarFournissuer = [20,100,50,10,5,60];
                            var _data_libelle_cities =  ["Rabat","Salé","Agadir","Safi","Marrakech","Casa"];
                        </script>
                        <canvas id="myBarChartFournisseur"></canvas>
                    </div>
                </div>
            </div>
            <!-- Bar Chart Client -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary" id="titel_charts_bar">Chart Client Par Villes</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <script>
                            var _data_myAreaChartBarClients = [@foreach ($countByCity as $item) {{$item->count}}, @endforeach];
                        </script>
                        <canvas id="myBarChartClient"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <!-- Pie Chart -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Vues Par Villes</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinkVues"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLinkVues">
                            <div class="dropdown-header">Afficher Par:</div>
                            <a class="dropdown-item" href="#">Villes</a>
                            <a class="dropdown-item" href="#">Service</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <script>
                            var _data_myPieChartVeus = [100,80,60,40,20,10];//[{{$data->trueCount;}},{{$data->falseCount;}}];
                        </script>
                        <canvas id="myPieChartVues"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Rabat
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Salé
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Agadir
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Safi
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Marrakech
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-dark"></i> Casa
                        </span>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cantact Par Villes</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinkCantact"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLinkCantact">
                            <div class="dropdown-header">Afficher Par:</div>
                            <a class="dropdown-item" href="#">Villes</a>
                            <a class="dropdown-item" href="#">Service</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <script>
                            var _data_myPieChartCantact = [100,50,25,12,6,3];//[{{$data->trueCount;}},{{$data->falseCount;}}];
                        </script>
                        <canvas id="myPieChartCantact"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Rabat
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Salé
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Agadir
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Safi
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Marrakech
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-dark"></i> Casa
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.bn-ac').removeClass('active');
        $(".bn-ac").eq(0).addClass('active');
    });
</script>
@endsection