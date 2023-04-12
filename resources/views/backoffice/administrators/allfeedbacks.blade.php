@extends('backoffice.layouts.administrator')
@section('title', 'Liste de feedbacks')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des feedbacks par Fournisseurs</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Prestataire</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>etoiles</th>
                        <th>Commentaire</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $feedback)
                    <tr>
                        <td>{{$feedback->raison}}</td>
                        <td>{{ $feedback->prenom . ' ' . $feedback->nom }}</td>
                        <td>{{ $feedback->dateCommit }}</td>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>{{ $feedback->rating }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>{{ $feedback->commentaire }}</td>
                        <td>
                            <a class="btn btn-info btn-Accepter updateFK" data-fournisseur="{{$feedback}}">Modifier</a>
                            <a class="btn btn-info btn-danger" href="{{ '/administrator/feedbacks/delete/' . $feedback->id_client . '/'. $feedback->id_fournisseur }}">Supprimier</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Modifier Feedback -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('updateFeedback')}}" method="post">
                @csrf
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Formulaire de modéfication feedback fournisseur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h3 id="client"></h3>
                        <label for="comment">Avis :</label>
                        <textarea class="form-control mb-2" name="commentaire" id="commentaire" rows="3"></textarea>
                        <input name="rating" type="radio" class="d-none" checked value="0" id="rating_0">
                        <label for="rating_1" class="hover-lb lb-1">
                            <span class="star" data-value="1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#FA86C4"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </span>
                        </label>
                        <input name="rating" type="radio" class="d-none" value="1" id="rating_1">
                        <label for="rating_2" class="hover-lb lb-2">
                            <span class="star" data-value="2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#FA86C4"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </span></label>
                        <input name="rating" type="radio" class="d-none" value="2" id="rating_2">
                        <label for="rating_3" class="hover-lb lb-3">
                            <span class="star" data-value="3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#FA86C4"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </span></label>
                        <input name="rating" type="radio" class="d-none" value="3" id="rating_3">
                        <label for="rating_4" class="hover-lb lb-4">
                            <span class="star" data-value="4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#FA86C4"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </span>
                        </label>
                        <input name="rating" type="radio" class="d-none" value="4" id="rating_4">
                        <label for="rating_5" class="hover-lb lb-5">
                            <span class="star" data-value="5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#FA86C4"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </span>
                        </label>
                        <input name="rating" type="radio" class="d-none" value="5" id="rating_5">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="number" id="id_fournisseur" name="id_fournisseur" readonly style="display: none;" required>
                    <input type="number" id="id_client" name="id_client" readonly style="display: none;" required>
                    <button type="button" class="btn btn-secondary mb-2" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
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
            $(".bn-ac").eq(4).addClass('active');
       $('.updateFK').click(function() {
            data = JSON.parse($(this).attr('data-fournisseur'));
            $('#client').text(data.nom+' '+data.prenom);
            $('#commentaire').val(data.commentaire);
            $('#id_fournisseur').val(data.id_fournisseur);
            $('#id_client').val(data.id_client);
            $('.hover-lb').children(0).children(0).attr('fill', '#FA86C4');
            i = data.rating;
            for (let index = 1; index <= i; index++) {
                    $('.lb-' + index).children(0).children(0).attr('fill', 'GOLD');
            }
            $('#staticBackdrop').modal('show');
       });
       $('.hover-lb').click(function() {
            if ($(this).hasClass('actv')) {
                $('.hover-lb').children(0).children(0).attr('fill',
                    '#FA86C4'); //you can add while for keep first start active when all stars active
                $(this).children(0).children(0).attr('fill', '#FA86C4');
                $(this).removeClass('actv')
            } else {
                $('.hover-lb').off("mouseenter mouseleave");
                $('.hover-lb').children(0).children(0).attr('fill', '#FA86C4');
                $(this).children(0).children(0).attr('fill', 'GOLD');
                i = $(this).children(0).attr('data-value');
                for (let index = 1; index < i; index++) {
                    $('.lb-' + index).children(0).children(0).attr('fill', 'GOLD');
                }
                $('.lb-1').addClass('actv');
            }
        });
    });
</script>
@endsection
