@extends('backoffice.layouts.administrator')
@section('title', 'Abonnements')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Liste des abonnements</h6>
    </div>
    <div class="card-body" >
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre des mois</th>
                        <th>Date d'ctivation</th>
                        <th>Date d'expiration</th>
                        <th>État d'abonnement</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($abonnements as $abo)
                        <tr>
                            <td>{{$abo->number_month}}</td>
                            <td>{{$abo->start_date}}</td>
                            <td>{{$abo->end_date}}</td>
                            <td>
                                @php
                                    $startDate = strtotime($abo->start_date);
                                    $endDate = strtotime($abo->end_date);
                                    $dateToCheck = strtotime('now');

                                    if ($dateToCheck >= $startDate && $dateToCheck <= $endDate) {
                                        echo '<span class="text-success"><i class="fas fa-check-circle"></i> Active</span>.';
                                    } else {
                                        echo '<span class="text-danger"><i class="fas fa-times-circle"></i> Désactive</span>';
                                    }
                                @endphp 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('script')
<script>
    $(document).ready(function() {
        $('.bn-ac').removeClass('active');
        $(".bn-ac").eq(3).addClass('active');
        $('.nav-card-header').click(function(e) {
            e.preventDefault();
            $('.nav-card-header').removeClass('active');
            $(this).addClass('active');
            var target = $(this).attr('href');
            $('.content-body-card').hide();
            $(target).show();
        });
    });
</script>
@endsection