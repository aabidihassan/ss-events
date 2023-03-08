@extends('layouts.pages')
@section('containner')
@section('title', 'Detail')

    <div class="container my-2">
        <div class="row p-2 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1"> {{$fournisseur[0]->raison}} </h1>
                @if($avgRating)
                <h4 class="fw-bold m-0">
                    <i class="fa fa-star text-primary mr-2"></i>{{$avgRating->average}}
                    <small>({{$avgRating->count}})</small> 
                <h4 class="m-0">
                @endif
                <p class="lead">Raison : {{$fournisseur[0]->raison}}.</p>
                <p class="lead">Email : {{$fournisseur[0]->email}}.</p>
                <p class="lead">Telephone : {{$fournisseur[0]->telephone}}.</p>
                <p class="lead">Ville : {{$fournisseur[0]->citie}}.</p>
                <p class="lead">Service : {{$fournisseur[0]->service}}.</p>
                <p class="lead">Address : {{$fournisseur[0]->adresse}}. </p>
                <p class="lead">{{$fournisseur[0]->description}}. </p>
                <ul class="nav col-md-6 list-unstyled d-flex" >
                    @if ($fournisseur[0]->insta != null)
                        <li class="ms-3">
                            <a class="text-muted" href="{{$fournisseur[0]->fb}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FA86C4" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                </svg>
                            </a>
                        </li> 
                    @endif
                    @if ($fournisseur[0]->twitter != null)
                        <li class="ms-3">
                            <a class="text-muted" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FA86C4" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                </svg>
                            </a>
                        </li>
                    @endif
                    @if ($fournisseur[0]->whatsapp != null)
                        <li class="ms-3">
                            <a class="text-muted" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FA86C4" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                </svg>
                            </a>
                        </li>
                    @endif
                    @if ($fournisseur[0]->fb != null)
                        <li class="ms-3">
                            <a class="text-muted" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FA86C4" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                <img class="rounded-lg-3" src="/fournisseurs/{{ $fournisseur[0]->photo }}" alt="" width="720">
            </div>
        </div>
    </div>

    <div class="container px-4 py-2" id="custom-cards">
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            @foreach (File::allFiles(public_path('fournisseurs/6/')) as $file)
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg">
                  <img style="width: 100%;height: 100%;object-fit: cover;" src="{{ asset('fournisseurs/6/' . $file->getFilename()) }}" />
                </div>
              </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-4">
        <h2>Comments : {{ $feedbacks->count()}}</h2>
        <hr>
        <div class="comment-list">
        @foreach ($feedbacks as $feedback)
        
            <!-- Single comment -->
            <div class="row mb-4">
                <div class="col-md-2">
                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="User Profile Picture" class="img-fluid rounded-circle">
                </div>
                <div class="col-md-10">
                    <div class="d-flex justify-content-between">
                    <h5>{{ $feedback->nom}} {{ $feedback->prenom}}</h5>
                    <small class="text-muted">{{ $feedback->dateCommit}}</small>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex">
                            <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>{{ $feedback->rating}}</h6>
                        </div>
                    </div>
                    <p>{{ $feedback->commentaire}}</p>
                </div>
            </div>
        
        @endforeach
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <a href="#" class="btn  load-more active" role="button" data-bs-toggle="button" aria-pressed="true">Voir plus >></a>
        </div>
        <!-- Add Comment Form -->
        <h4 class="mt-4">Add Comment</h4>
        <form id="addCommit">
            @csrf
            <div class="form-group">
                <label for="comment">Votre Commentaire :</label>
                <textarea class="form-control mb-2" name="commentaire" id="commentaire"  rows="3" ></textarea>
                <input name="rating" type="radio" class="d-none" checked  value="0" id="rating_0">
                <label for="rating_1" class="hover-lb lb-1" >
                    <span class="star" data-value="1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#FA86C4" class="bi bi-star-fill" viewBox="0 0 16 16" >
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </span>
                </label>
                <input name="rating" type="radio" class="d-none"  value="1" id="rating_1">
                <label for="rating_2" class="hover-lb lb-2">
                    <span class="star" data-value="2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#FA86C4" class="bi bi-star-fill" viewBox="0 0 16 16" >
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                </span></label>
                <input name="rating" type="radio" class="d-none"  value="2" id="rating_2">
                <label for="rating_3" class="hover-lb lb-3">
                    <span class="star" data-value="3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#FA86C4" class="bi bi-star-fill" viewBox="0 0 16 16" >
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                </span></label>
                <input name="rating" type="radio" class="d-none"  value="3" id="rating_3">
                <label for="rating_4" class="hover-lb lb-4">
                    <span class="star" data-value="4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#FA86C4" class="bi bi-star-fill" viewBox="0 0 16 16" >
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </span>
                </label>
                <input name="rating" type="radio" class="d-none"  value="4" id="rating_4">
                <label for="rating_5" class="hover-lb lb-5">
                    <span class="star" data-value="5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#FA86C4" class="bi bi-star-fill" viewBox="0 0 16 16" >
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </span>
                </label>
                <input name="rating" type="radio" class="d-none"  value="5" id="rating_5">
                <input name="fournisseur" class="d-none" readonly value="{{$fournisseur[0]->id}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ModalErreur" tabindex="-1" role="dialog" aria-labelledby="ModalErreurTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalErreurTitle">Message Erreur</h5>
                    <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                    <a type="button" id="conx" href="/login" class="btn btn-primary">Connecter-Vous</a>
                </div>
            </div>
        </div>
    </div>
     

  @stop

  @section('script')
        <script>
            $(function(){
                $('.hover-lb').click(function () {
                    if ($(this).hasClass('actv')){
                        $('.hover-lb').children(0).children(0).attr('fill','#FA86C4');//you can add while for keep first start active when all stars active
                        $(this).children(0).children(0).attr('fill','#FA86C4');
                        $(this).removeClass('actv')
                    }
                    else{
                        $('.hover-lb').off( "mouseenter mouseleave" );
                        $('.hover-lb').children(0).children(0).attr('fill','#FA86C4');
                        $(this).children(0).children(0).attr('fill','GOLD');
                        i = $(this).children(0).attr('data-value');
                        for (let index = 1; index < i; index++) {
                            $( '.lb-'+index).children(0).children(0).attr('fill','GOLD');
                        }
                        $('.lb-1').addClass('actv');
                    }
                });
 
               $('.hover-lb').mouseenter(function () {
                    $(this).children(0).children(0).attr('fill','GOLD');
                    i = $(this).children(0).attr('data-value');
                    for (let index = 0; index < i; index++) {
                        $( '.lb-'+index).children(0).children(0).attr('fill','GOLD');
                    }
                })
                .mouseleave(function () {
                    $(this).children(0).children(0).attr('fill','#FA86C4');
                    i = $(this).children(0).attr('data-value');
                    for (let index = 0; index < i; index++) {
                        $('.lb-'+index).children(0).children(0).attr('fill','#FA86C4');
                    }
                });
                
                // Set number of comments and comments per page
                var numComments = $(".comment-list").children().length;
                var commentsPerPage = 8;
                // Calculate number of pages
                var numPages = Math.ceil(numComments / commentsPerPage);
                // Hide all comments after the first page
                $(".comment-list > div").slice(commentsPerPage).hide();
                // Hide the "Load More" button if there is only one page
                if (numPages <= 1) {
                    $(".load-more").hide();
                }
                // Handle "Load More" button clicks
                $(".load-more").click(function() {
                    // Get the current number of visible comments
                    var currentCount = $(".comment-list > div:visible").length;
                    // Show the next set of comments
                    $(".comment-list > div").slice(currentCount, currentCount + commentsPerPage).show();
                    
                    // Hide the "Load More" button if we have reached the last page
                    if (currentCount + commentsPerPage >= numComments) {
                        $(".load-more").hide();
                    }
                });

                var myModal = new bootstrap.Modal(document.getElementById('ModalErreur'), 'keyboard');
                $('#addCommit').on('submit', function(e) {

                    e.preventDefault();
                    dataCom = $(this).serialize();
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('addFeedback') }}',
                        data: dataCom,
                        success: function(response) {
                            try {
                                $('#addCommit')[0].reset();
                                $('.hover-lb').children(0).children(0).attr('fill','#FA86C4');
                                if (response.hasOwnProperty('error')) {
                                    $('.modal-body').html(response.error);  
                                    myModal.show(); 
                                    $('#conx').hide();
                                }
                            } catch (error) {
                                
                            }
                        },
                        error: function(xhr) {
                            try {
                                obj = JSON.parse(xhr.responseText);
                                myModal.show();
                                if(obj.message == "Unauthenticated."){
                                    $('.modal-body').html("Veuillez vous connecter pour ajouter un commentaire");
                                }
                            } catch (e) {
                                console.error('Error parsing response:', xhr.responseText);
                            }

                        }
                    });
                });
                $('#conx').click(function() {
                    myModal.hide();
                    $('#addCommit')[0].reset();
                    $('.modal-body').html("");
                });
                $('#addCommit').on('reset', function(e)
                {
                    $('.hover-lb').children(0).children(0).attr('fill','#FA86C4');   
                });
                                            //add this commentaire o the list
                                            /*$('.comment-list').prepend('<div class="row mb-4">'+
                                                            '<div class="col-md-2">'+
                                                                '<img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="User Profile Picture" class="img-fluid rounded-circle">'+
                                                            '</div>'+
                                                            '<div class="col-md-10">'+
                                                                '<div class="d-flex justify-content-between">'+
                                                                '<h5>'+ dataCom.nom +' '+ dataCom.prenom +'</h5>'+
                                                                '<small class="text-muted">'+ dataCom.now() +'</small>' +
                                                                '</div>'+
                                                                '<div class="d-flex justify-content-between align-items-center">'+
                                                                    '<div class="d-flex">'+
                                                                        '<h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>'+ dataCom.rating +'</h6>'+
                                                                    '</div>'+
                                                                '</div>'+
                                                                '<p>'+ dataCom.commentaire +'</p>'+
                                                            '</div>'+
                                                        '</div>');*/
            });
        </script>
  @endsection