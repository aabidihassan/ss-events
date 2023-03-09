@extends('backoffice.layouts.administrator')
@section('title', 'Prefournisseurs')
@section('content')
 <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste de demande Prefournisseurs</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NOM</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>statut</th>
                        <th>Nb vues</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prefournisseurs as $l)
                    <tr>
                        <td>{{$l->nom}}</td>
                        <td>{{$l->prenom}}</td>
                        <td>{{$l->email}}</td>
                        <td>{{$l->telephone}}</td>
                        <td>
                            @if($l->statut) Refuse
                            @else En attent
                            @endIf
                        </td>
                        <td>
                            @if(!$l->statut)
                            <a href="{{ '/admin/pres/accept/' . $l->id }}" class="btn btn-primary">Accepter</a>
                            <a href="{{ '/admin/pres/decline/' . $l->id }}" class="btn btn-danger">Refuser</a>
                            @endIf
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop