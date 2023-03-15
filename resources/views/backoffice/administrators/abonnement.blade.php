@extends('backoffice.layouts.administrator')
@section('title', 'Abonnements')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Liste de Services</h6>
        <div class="dropdown no-arrow">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                {{__('Créer un classe')}}
            </button>
        </div>
    </div>
    <div class="card-body">
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
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{__('Formulaire pour ajouter un nouveau classe')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{__('Libelle :')}}</label>
                        <input type="text" class="form-control" required id="recipient-name" name="libelle">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">{{__('Description :')}}</label>
                        <textarea class="form-control" id="message-text" name="description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('Fermer')}}</button>
                    <button type="submit" class="btn btn-success">{{__('Ajouter')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('script')
<script>
    $(document).ready(function() {
        $('.bn-ac').removeClass('active');
        $(".bn-ac").eq(7).addClass('active');
    });
</script>
@endsection