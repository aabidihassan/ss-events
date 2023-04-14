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
                            <th>Ville</th>
                            <th>Service</th>
                            <th>statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prefournisseurs as $l)
                            <tr>
                                <td>{{ $l->nom }}</td>
                                <td>{{ $l->prenom }}</td>
                                <td>{{ $l->email }}</td>
                                <td>{{ $l->telephone }}</td>
                                <td>{{ $l->citie }}</td>
                                <td>{{ $l->service }}</td>
                                <td>
                                    @if ($l->statut)
                                        Refuse
                                    @else
                                        En attent
                                    @endIf
                                </td>
                                <td data-order="{{ $l->created_at }}">
                                    @if (!$l->statut)
                                        <a href="#" class="btn btn-primary btn-Accepter"
                                            data-fournisseur="{{ $l }}">Accepter</a>&nbsp;&nbsp;
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
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('accecptFournisseur') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="nomF">Affecter un abonnement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Type d'abonmment :</label>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="typeAbon" id="Gold" value="Gold"
                                    required>
                                <label class="form-check-label" for="Gold">Gold</label>
                                <div class="form-check d-none c-radio">
                                    <input class="form-check-input" type="radio" name="prix" id="gold6"
                                        data-n="6" disabled required value="gold_6_months">
                                    <label class="form-check-label" for="gold6">Gold 6 Months <span
                                            id="prix_gold6"></span></label>
                                </div>
                                <div class="form-check d-none c-radio">
                                    <input class="form-check-input" type="radio" name="prix" id="gold12"
                                        data-n="12" disabled required value="gold_12_months">
                                    <label class="form-check-label" for="gold12">Gold 12 Months <span
                                            id="prix_gold12"></span></label>
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="typeAbon" id="Platinum"
                                    value="Platinum" required>
                                <label class="form-check-label" for="Platinum">Platinum</label>
                                <div class="form-check d-none c-radio">
                                    <input class="form-check-input" type="radio" name="prix" id="platinum6"
                                        data-n="6" disabled value="platinum_6_months">
                                    <label class="form-check-label" for="platinum6">Platinum 6 Months <span
                                            id="prix_platinum6"></span></label>
                                </div>
                                <div class="form-check d-none c-radio">
                                    <input class="form-check-input" type="radio" name="prix" id="platinum12"
                                        data-n="12" disabled required value="platinum_12_months">
                                    <label class="form-check-label" for="platinum12">Platinum 12 Months <span
                                            id="prix_platinum12"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="number" id="id_prefournisseur" name="id_prefournisseur" readonly
                            style="display: none;" required>
                        <input type="number" id="number_month" name="number_month" readonly style="display: none;"
                            required>
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
            $('#dataTable').DataTable().destroy();
            $('#dataTable').DataTable({
                order: [
                    [7, 'desc']
                ]
            });
            $('.bn-ac').removeClass('active');
            $(".bn-ac").eq(1).addClass('active');
            $('.btn-Accepter').click(function() {
                data = JSON.parse($(this).attr('data-fournisseur'));
                $('#id_prefournisseur').val(data.id);
                $('#staticBackdrop').modal('show');
            });
            $('input[name=typeAbon]').change(function() {
                $('.c-radio').addClass('d-none')
                    .children().eq(0).attr('disabled', 'disabled');
                $(this).parent().children().eq(2).removeClass('d-none');
                $(this).parent().children().eq(2).children().eq(0).removeAttr('disabled');
                $(this).parent().children().eq(3).removeClass('d-none');
                $(this).parent().children().eq(3).children().eq(0).removeAttr('disabled');
            });
            $('input[name=prix]').change(function() {
                $('#number_month').val($(this).attr('data-n'));
            });
        });
    </script>
@endsection
