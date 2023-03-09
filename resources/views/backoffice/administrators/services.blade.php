@extends('backoffice.layouts.administrator')
@section('title', 'Services')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Liste de Services</h6>
        <div class="dropdown no-arrow">
            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#myModal">
                Creer un service
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Libelle</th>
                        <th>Description</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $l)
                    <tr>
                        <td>{{$l->libelle}}</td>
                        <td>{{$l->description}}</td>
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
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
</div>
@stop