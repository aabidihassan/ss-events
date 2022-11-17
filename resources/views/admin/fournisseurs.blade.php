@extends('layouts.adminmenu')
@section('title', 'Fournisseurs')
@section('content')
<div class="container mt-4">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                    @foreach($data as $l)
                    <tr>
                        <td>{{$l->nom}}</td>
                        <td>{{$l->prenom}}</td>
                        <td>{{$l->email}}</td>
                        <td>{{$l->telephone}}</td>
                        <td>
                            @if($l->statut) Actif
                            @else Desactive
                            @endIf
                        </td>
                        <td>{{$l->vues}}</td>
                        <td>
                            @if($l->statut)
                            <a href="{{ '/admin/fournisseurs/desactivate/' . $l->id }}" class="btn btn-danger">Desactiver</a>
                            @else
                            <a href="{{ '/admin/fournisseurs/activate/' . $l->id }}" class="btn btn-primary">Activer</a>
                            @endIf
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
</div>
@stop
