@extends('backoffice.layouts.administrator')
@section('title', 'Classes')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Liste des Classes</h6>
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
                        <th>Type</th>
                        <th>Prix Monthly</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $c)
                    <tr>
                        <td>{{$c->type}}</td>
                        <td>{{$c->prix_monthly}}</td>
                        <td>
                            <button data-classe="{{$c->id }}" class="btn btn-danger bt-delete" data-toggle="modal" data-target="#exampleModalCenter">Supprimer</button>
                            <button type="button" class="btn btn-primary btn-update" data-toggle="modal" data-target="#staticBackdropUpdate" data-classe="{{$c->id}}">
                                {{__('Modéfier')}}
                            </button>
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
            <form action="{{ route('addClasse')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="type" class="col-form-label">{{__('Type :')}}</label>
                        <input type="text" class="form-control" required id="type" name="type">
                    </div>
                    <div class="form-group">
                        <label for="prix" class="col-form-label">{{__('Prix par mois :')}}</label>
                        <div class="input-group">
                            <input type="number" min="1" max="10000" step="1" id="prix" name="prix" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                              <span class="input-group-text">$</span>
                              <span class="input-group-text">0.00</span>
                            </div>
                        </div>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdropUpdate" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelUpdate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelUpdate">{{__('Formulaire pour modéfier classe')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('updateClasse')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="type" class="col-form-label">{{__('Type :')}}</label>
                        <input type="text" class="form-control" required name="type" id="type_up">
                    </div>
                    <div class="form-group">
                        <label for="prix" class="col-form-label">{{__('Prix par mois :')}}</label>
                        <div class="input-group">
                            <input type="number" min="1" max="10000" step="1" id="prix_up" name="prix" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                              <span class="input-group-text">$</span>
                              <span class="input-group-text">0.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="number" id="id_class_update" name="id_classe" readonly style="display: none;" required>
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
            <form action="{{ route('deleteClasse')}}" method="post">
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
                    <input type="number" id="id_class_delete" name="id_classe" readonly style="display: none;" required>
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
        $(".bn-ac").eq(3).addClass('active');
        $('.btn-update').click(function () {
            $('#id_class_update').val($(this).attr('data-classe'));
            $('#type_up').val($(this).parent().prev().prev().text());
            $('#prix_up').val($(this).parent().prev().text());
        });
        $('.bt-delete').click(function () {
            $('#id_class_delete').val($(this).attr('data-classe'));
            $('.modal-body-delete >h3').text($(this).parent().prev().prev().text());
        });
    });
</script>
@endsection