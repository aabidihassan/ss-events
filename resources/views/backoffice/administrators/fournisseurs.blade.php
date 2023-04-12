@extends('backoffice.layouts.administrator')
@section('title', 'Fournisseurs')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste de Fournisseurs</h6>
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
                            @if($l->statut) Actif
                            @else Desactive
                            @endIf
                        </td>
                        <td>{{$l->countContact}}</td>
                        <td>{{$l->vues}}</td>
                        <td>
                            @if($l->statut)
                            <a href="{{ '/admin/fournisseurs/desactivate/' . $l->id }}" class="btn btn-danger">Desactiver</a>
                            @else
                            <a class="btn btn-primary btn-Accepter" data-fournisseur="{{$l}}">Activer</a>
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
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('createAbonnement')}}" method="post">
                @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Formulaire d'acceptation fournisseur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <h3 id="nomF"></h3>
                    <h5 id="ditail"></h5>
                    <div class="form-group">
                        <input type="number" min="1" max="1000" step="1"  class="form-control p-4" placeholder="Nombre des mois" name="numbreMonth"
                            required data-validation-required-message="Veuillez entrer votre prenom"  id="numbreMonth"/>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="input-group mb-4">
                        <input type="number" readonly id="total" class="form-control" placeholder="{{__('Totale des frais pay : ')}}" aria-label="Amount (to the nearest MAD)">
                        <div class="input-group-append">
                            <span class="input-group-text">MAD</span>
                            <span class="input-group-text">0.00</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dateEND" class="col-form-label" >{{__('Date Fin d\'abonnement : ')}}</label>
                        <input type="date" readonly id="dateEnd" class="form-control" name="end_date" >
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="number" id="id_prefournisseur" name="id_prefournisseur" readonly style="display: none;" required>
                    <input type="text" id="libelle_service" name="service" readonly style="display: none;" required>
                    <button type="button" class="btn btn-secondary mb-2" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Accepter</button>
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
        $('.btn-Accepter').click(function () {
            data = JSON.parse($(this).attr('data-fournisseur'));
            $('#id_prefournisseur').val(data.id);
            $('#libelle_service').val(data.service);
            $('#nomF').html(data.nom + " " + data.prenom);
            $('#ditail').html(data.email + "<br>" + data.telephone + "<br>" +data.service );
            $('#numbreMonth').val(data.optionAb);
            $('#staticBackdrop').modal('show');
            currentDate = new Date(); 
            var x = ($('#numbreMonth').val() *1);
            futureDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + x, currentDate.getDate());
            formattedDate = futureDate.toISOString().slice(0,10); 
            document.getElementById("dateEnd").value = formattedDate;
        })
        $('#SelService').change(function () {
           $('#total').val($('#SelService :selected').attr('prix')*$('#numbreMonth').val());
        });
        $('#numbreMonth').change(function () {
            try {
                currentDate = new Date(); 
                var x = ($('#numbreMonth').val() *1);
                futureDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + x, currentDate.getDate());
                formattedDate = futureDate.toISOString().slice(0,10); 
                document.getElementById("dateEnd").value = formattedDate;
                $('#total').val($('#SelService :selected').attr('prix')*$('#numbreMonth').val());
            } catch (error) {
                console.log(eror.message);
            }
        });
    });
</script>
@endsection