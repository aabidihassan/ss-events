@extends('backoffice.layouts.administrator')
@section('title', 'Services')
@section('content')

@isset($message)
@if ($message == 0)
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Service !</strong> Libelle déjà existe.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@elseif($message == 1)
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Service !</strong>à été ajouté.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif    
@endisset
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
                <h5 class="modal-title" id="staticBackdropLabel">{{__('Formulaire pour ajouter un nouveau service')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('addService')}}" method="post">
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
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">{{__('Services:')}}</label>
                        <select class="form-control form-control-lg" name="classe">
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
@stop

@section('script')
<script>
    $(document).ready(function() {
        $('.bn-ac').removeClass('active');
        $(".bn-ac").eq(2).addClass('active');
    });
</script>
@endsection