@extends('backoffice.layouts.administrator')
@section('title', 'Classes')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Liste des Classes</h6>
            <div class="dropdown no-arrow">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                    {{ __('Créer un classe') }}
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2">Nom</th>
                            <th rowspan="1" colspan="2" class="text-center">Gold</th>
                            <th rowspan="1" colspan="2" class="text-center">Platinum</th>
                            <th rowspan="2" class="text-center">Action</th>
                        </tr>
                        <tr>
                            <th>Prix 6 mois</th>
                            <th>Prix 12 mois</th>
                            <th>Prix 6 mois</th>
                            <th>Prix 12 mois</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $c)
                            <tr>
                                <td>{{ $c->type }}</td>
                                <td>{{ $c->gold_6_months }}</td>
                                <td>{{ $c->gold_12_months }}</td>

                                <td>{{ $c->platinum_6_months }}</td>
                                <td>{{ $c->platinum_12_months }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-update" data-toggle="modal"
                                        data-target="#staticBackdropUpdate" data-classe="{{ $c->id }}">
                                        {{ __('Modifier') }}
                                    </button>
                                    <button data-classe="{{ $c->id }}" class="btn btn-danger bt-delete"
                                        data-toggle="modal" data-target="#exampleModalCenter">Supprimer</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ __('Nouvelle Classe') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('addClasse') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="type" class="col-form-label">{{ __('Nom :') }}</label>
                            <input type="text" class="form-control" required id="type" name="type">
                        </div>
                        <div class="form-group">
                            <label for="prix" class="col-form-label">{{ __('Prix par 6 mois (Gold) :') }}</label>
                            <div class="input-group">
                                <input type="number" min="1" step="1" id="gold_6_months" name="gold_6_months"
                                    class="form-control" aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                    <span class="input-group-text">0.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prix" class="col-form-label">{{ __('Prix par 12 mois (Gold) :') }}</label>
                            <div class="input-group">
                                <input type="number" min="1" step="1" id="gold_12_months"
                                    name="gold_12_months" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                    <span class="input-group-text">0.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prix" class="col-form-label">{{ __('Prix par 6 mois (Platinum) :') }}</label>
                            <div class="input-group">
                                <input type="number" min="1" step="1" id="platinum_6_months"
                                    name="platinum_6_months" class="form-control"
                                    aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                    <span class="input-group-text">0.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prix"
                                class="col-form-label">{{ __('Prix par 12 mois (Platinum) :') }}</label>
                            <div class="input-group">
                                <input type="number" min="1" step="1" id="platinum_12_months"
                                    name="platinum_12_months" class="form-control"
                                    aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                    <span class="input-group-text">0.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Fermer') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('Ajouter') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdropUpdate" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabelUpdate" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabelUpdate">{{ __('Formulaire pour modifier classe') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('updateClasse') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="type" class="col-form-label">{{ __('Nom :') }}</label>
                            <input type="text" class="form-control" required name="type" id="type_up">
                        </div>
                        <div class="form-group">
                            <label for="prix" class="col-form-label">{{ __('Prix par 6 mois (Gold) :') }}</label>
                            <div class="input-group">
                                <input type="number" min="1" max="10000" step="1"
                                    id="gold_6_months_up" name="gold_6_months" class="form-control"
                                    aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                    <span class="input-group-text">0.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prix" class="col-form-label">{{ __('Prix par 12 mois (Gols) :') }}</label>
                            <div class="input-group">
                                <input type="number" min="1" max="10000" step="1"
                                    id="gold_12_months_up" name="gold_12_months" class="form-control"
                                    aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                    <span class="input-group-text">0.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prix" class="col-form-label">{{ __('Prix par 6 mois (Platinum) :') }}</label>
                            <div class="input-group">
                                <input type="number" min="1" max="10000" step="1"
                                    id="platinum_6_months_up" name="platinum_6_months" class="form-control"
                                    aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                    <span class="input-group-text">0.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prix" class="col-form-label">{{ __('Prix par 12 mois (Platinum) :') }}</label>
                            <div class="input-group">
                                <input type="number" min="1" max="10000" step="1"
                                    id="platinum_12_months_up" name="platinum_12_months" class="form-control"
                                    aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                    <span class="input-group-text">0.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="number" id="id_class_update" name="id_classe" readonly style="display: none;"
                            required>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Fermer') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('Modifier') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal delete -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('deleteClasse') }}" method="post">
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
                        <input type="number" id="id_class_delete" name="id_classe" readonly style="display: none;"
                            required>
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Fermer') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Oui') }}</button>
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
            $(".bn-ac").eq(6).addClass('active');
            $('.btn-update').click(function() {
                $('#id_class_update').val($(this).attr('data-classe'));
                $('#type_up').val($(this).parent().prev().prev().prev().prev().prev().text());
                $('#gold_6_months_up').val($(this).parent().prev().prev().prev().prev().text());
                $('#gold_12_months_up').val($(this).parent().prev().prev().prev().text());
                $('#platinum_6_months_up').val($(this).parent().prev().prev().text());
                $('#platinum_12_months_up').val($(this).parent().prev().text());
            });
            $('.bt-delete').click(function() {
                $('#id_class_delete').val($(this).attr('data-classe'));
                $('.modal-body-delete >h3').text($(this).parent().prev().prev().text());
            });
        });
    </script>
@endsection
