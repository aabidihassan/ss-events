@extends('layouts.adminmenu')
@section('title', 'Pre Fournisseurs')
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
@stop
