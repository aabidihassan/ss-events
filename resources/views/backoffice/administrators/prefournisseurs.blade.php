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
                        <th>Action</th>
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
                            <a href="#" class="btn btn-primary btn-Accepter" data-fournisseur="{{$l}}" >Accepter</a>&nbsp;&nbsp;
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
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('accecptFournisseur')}}" method="post">
                @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="nomF">Formulaire d'acceptation fournisseur :</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">{{__('Services :')}}</label>
                        <select class="form-control form-control-lg" name="service" id="SelService" required>
                            <option value="">{{__('-- Veuillez choisir une service --')}}</option>
                            @foreach ($services as $service)
                            <option value="{{$service->id}}" data-service="{{$service}}">{{$service->libelle}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Type d'abonmment :</label>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="typeAbon" id="typeAbonGold" required>
                            <label class="form-check-label" for="typeAbonGold">Gold</label>
                            <div class="form-check d-none c-radio">
                                <input class="form-check-input" type="radio" name="prix" id="gold6" value="gold6" disabled required>
                                <label class="form-check-label" for="gold6">Gold 6 Months <span id="prix_gold6"></span></label>
                            </div>
                            <div class="form-check d-none c-radio">
                                <input class="form-check-input" type="radio" name="prix" id="gold12" value="gold12" disabled required>
                                <label class="form-check-label" for="gold12">Gold 12 Months <span id="prix_gold12"></span></label>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="typeAbon" id="typeAbonPlatinum" value="platinum6" required>
                            <label class="form-check-label" for="typeAbonPlatinum">Platinum</label>
                            <div class="form-check d-none c-radio">
                                <input class="form-check-input" type="radio" name="prix" id="platinum6" disabled>
                                <label class="form-check-label" for="platinum6">Platinum 6 Months <span id="prix_platinum6"></span></label>
                            </div>
                            <div class="form-check d-none c-radio">
                                <input class="form-check-input" type="radio" name="prix" id="platinum12" value="platinum12" disabled required>
                                <label class="form-check-label" for="platinum12">Platinum 12 Months <span id="prix_platinum12"></span></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="number" id="id_prefournisseur" name="id_prefournisseur" readonly style="display: none;" required required>
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
        $(".bn-ac").eq(1).addClass('active');
        $('.btn-Accepter').click(function () {
            data = JSON.parse($(this).attr('data-fournisseur'));
            $('#id_prefournisseur').val(data.id);
            $('#nomF').html( $('#nomF').html() + data.nom + " " + data.prenom);
            $('#SelService').val(data.optionAb);
            $('#staticBackdrop').modal('show');
        });
        $('input[name=typeAbon]').change(function() {
            $('.c-radio').addClass('d-none')
                            .children().eq(0).attr('disabled','disabled');
            $(this).parent().children().eq(2).removeClass('d-none')
            $(this).parent().children().eq(2).children().eq(0).removeAttr('disabled');
            $(this).parent().children().eq(3).removeClass('d-none')
            $(this).parent().children().eq(3).children().eq(0).removeAttr('disabled');
            
        });
        $('#SelService').change(function () {
            data = JSON.parse($('#SelService :selected').attr('data-service'));
            $('#prix_gold6').html(data.gold_6_months);
            $('#prix_gold12').html(data.gold_12_months);
            $('#prix_platinum6').html(data.platinum_6_months);
            $('#prix_platinum12').html(data.platinum_12_months);
            $('#gold6').val(data.gold_6_months);
            $('#gold12').val(data.gold_12_months);
            $('#platinum6').val(data.platinum_6_months);
            $('#platinum12').val(data.platinum_12_months);
        });
    });
</script>
@endsection
