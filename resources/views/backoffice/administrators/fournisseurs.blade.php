@extends('backoffice.layouts.administrator')
@section('title', 'Fournisseurs')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste de Fournisseurs has Abonnement encour</h6>
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
                        <th>Nb contact</th>
                        <th>Nb vues</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fournisseurs as $l)
                    <tr>
                        <td>{{$l->nom}}</td>
                        <td>{{$l->prenom}}</td>
                        <td>{{$l->email}}</td>
                        <td>{{$l->telephone}}</td>
                        <td>
                            @if($l->statut) Actif jusqu'à {{$l->end_date}}
                            @else Desactive
                            @endIf
                        </td>
                        <td>{{$l->countContact}}</td>
                        <td>{{$l->vues}}</td>
                        <td>
                            @if($l->statut)
                            <a href="{{ '/admin/fournisseurs/desactivate/' . $l->id }}" class="btn btn-danger">Desactiver</a>
                            @else
                            <a class="btn btn-primary" href="{{ '/admin/fournisseurs/activate/' . $l->id }}" >Activer</a>
                            @endIf
                            <a class="btn btn-info" href="{{ '/administrator/feedbacks/' . $l->id }}">Feefbacks</a>
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
        $(".bn-ac").eq(2).addClass('active');
        $('#collapseTwo').addClass('show')
                        .children().eq(0).children().eq(1).addClass('active');
    });
</script>
@endsection