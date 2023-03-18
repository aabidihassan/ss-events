@extends('backoffice.layouts.administrator')
@section('title', 'Services')
@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Liste des Services</h6>
        <div class="dropdown no-arrow">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                {{__('Créer un service')}}
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Libelle</th>
                        <th>Classe</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $l)
                    <tr>
                        <td>{{$l->libelle}}</td>
                        <td>{{$l->type}} ({{$l->prix_monthly}} MAD)</td>
                        <td>
                            @if($l->statut) Actif
                            @else Desactive
                            @endIf
                        </td>
                        <td>
                            @if($l->statut)
                            <a href="{{ '/admin/services/desactivate/' . $l->id }}" class="btn btn-danger">Desactiver</a>
                            @else
                            <a href="{{ '/admin/services/activate/' . $l->id }}" class="btn btn-primary">Activer</a>
                            @endIf
                            <button type="button" class="btn btn-warning btn-update" data-toggle="modal" data-target="#staticBackdropUpdate" 
                                data-classe="{{$l->id_classe}}" data-service="{{$l->id}}">
                                {{__('Modéfier')}}
                            </button>
                            <button data-service="{{$l->id }}" class="btn btn-danger bt-delete" data-toggle="modal" data-target="#exampleModalCenter">
                                {{__('Supprimer')}}
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Add service -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{__('Formulaire pour ajouter un nouveau service')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('addService')}}" method="post" id="addService" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{__('Libelle :')}}</label>
                        <input type="text" class="form-control" required id="recipient-name" id="addLibelle" name="libelle">
                    </div>
                    <div class="form-group">
                        <label for="image-input" class="col-form-label">{{__('Image :')}}</label>
                        <input type="file" class="file-input" placeholder="Choisir une photo" accept="image/*" name="image" id="image-input">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">{{__('Services:')}}</label>
                        <select class="form-control form-control-lg" name="classe" id="addClasse">
                            @foreach ($classes as $classe)
                            <option value="{{$classe->id}}">{{$classe->type}} ({{$classe->prix_monthly}} {{__('MAD')}})</option>
                            @endforeach
                        </select>
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

<!-- Modal update service -->
<div class="modal fade" id="staticBackdropUpdate" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelUpdate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelUpdate">{{__('Formulaire pour ajouter un nouveau service')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('updateService')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{__('Libelle :')}}</label>
                        <input type="text" class="form-control" required id="libelleUp" name="libelle">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">{{__('Services:')}}</label>
                        <select class="form-control form-control-lg" id="id_classe_update" name="classe">
                            @foreach ($classes as $classe)
                            <option value="{{$classe->id}}">{{$classe->type}} ({{$classe->prix_monthly}} {{__('MAD')}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="number" id="id_service_update" name="id_service" readonly style="display: none;" required>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('Fermer')}}</button>
                    <button type="submit" class="btn btn-success">{{__('Modéfier')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal delete -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('deleteService')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body-delete">
                    <h3 class="m-4"></h3>
                </div>
                <div class="modal-footer">
                    <input type="number" id="id_service_delete" name="id_service" readonly style="display: none;" required>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Fermer')}}</button>
                    <button type="submit" class="btn btn-danger">{{__('Oui')}}</button>
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
        $(".bn-ac").eq(2).addClass('active');
        $('.bt-delete').click(function () {
            $('#id_service_delete').val($(this).attr('data-service'));
            $('.modal-body-delete >h3').text($(this).parent().prev().prev().prev().text());
        });
        $('.btn-update').click(function () {
            $('#id_service_update').val($(this).attr('data-service'));
            $('#libelleUp').val($(this).parent().prev().prev().prev().text());
            $('#id_classe_update').val($(this).attr('data-classe'));
        });
        /*$("#addService").on('submit', function (event) {
            event.preventDefault();
            var form = new FormData();
            var image = $('#image-input')[0].files[0];
            var libelle = $('#addLibelle').val();
            var classe = $('#addClasse').val();
            form.append('image', image);
            form.append('libelle', libelle);
            form.append('classe', classe);
            $(this).submit();
        });*/
    });
</script>
@endsection