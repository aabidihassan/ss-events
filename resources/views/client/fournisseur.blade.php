@extends('layouts.pages')
@section('containner')
@section('title', 'Fournisseurs')

<!-- Packages Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">

        <div class="row parent-Item-Fornisseur">
            @php
                $nub_Items = 6 ;// Number of Items in page view
                $nubFr = 0;
            @endphp
            @foreach ($fournisseurs as $fournisseur)
                @php
                    $nubFr++;
                @endphp
                <div class="col-lg-4 col-md-6 mb-4 item-fornisseur {{ $nubFr >= $nub_Items+1  ? 'd-none' : '' }}">
                    <div class="package-item bg-white mb-2" style="height: 410px;">
                        <a href="#">
                            <img class="img-fluid" src="fournisseurs/{{ $fournisseur->photo }}" alt=""
                                style="height: 250px; width:100%">
                        </a>
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i
                                        class="fa fa-map-marker-alt text-primary mr-2"></i>{{ $fournisseur->citie }}</small>
                                <small class="m-0"><i
                                        class="fa fa-bullseye text-primary mr-2"></i>{{ $fournisseur->service }}</small>
                                <small class="m-0"><i
                                        class="fa fa-eye text-primary mr-2"></i>{{ $fournisseur->vues }}</small>
                            </div>
                            <a class="h5 text-decoration-none" href="">{{ $fournisseur->raison }}</a>
                            <div class="border-top mt-2 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5
                                        <small>(250)</small>
                                    </h6>
                                    <button class="btn btn-sm btn-secondary ml-auto"
                                        style="width:30%; margin-top:-2%">Voir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @php
                
                $num_pages = intval($nubFr/$nub_Items) ; // Replace with the actual number of pages
                if(($nubFr % $nub_Items) !=0);
                    $num_pages++;
                $current_page = 1;
                $prev_disabled = $current_page == 1 ? 'disabled' : '';
                $next_disabled = $current_page == $num_pages ? 'disabled' : '';
            @endphp

            <div class="d-flex justify-content-center mt-2">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-lg" style="width: 70%;">
                        <li class="page-item btn-previous {{ $prev_disabled }}">
                            <a class="page-link " href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        @if ($num_pages > 7)
                            @for ($i = 1; $i <= $num_pages; $i++)
                                @if ($i < 5)
                                    <li class="page-item get_Fornisseur {{ $i == $current_page ? 'active' : '' }}"><a class="page-link"
                                        href="#">{{ $i }}</a></li>
                                @else
                                    <li class="page-item get_Fornisseur d-none" ><a class="page-link"
                                        href="#">{{ $i }}</a></li>
                                @endif
                            @endfor
                        @else
                            @for ($i = 1; $i <= $num_pages; $i++)
                                <li class="page-item get_Fornisseur {{ $i == $current_page ? 'active' : '' }}"><a class="page-link"
                                        href="#">{{ $i }}</a></li>
                            @endfor
                        @endif

                       {{-- @if ($num_pages > 7)
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            @if ($current_page > 4)
                                <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                            @endif
                            @for ($i = max(2, $current_page - 2); $i <= min($current_page + 2, $num_pages - 1); $i++)
                                <li class="page-item {{ $i == $current_page ? 'active' : '' }}"><a class="page-link"
                                        href="#">{{ $i }}</a></li>
                            @endfor
                            @if ($current_page < $num_pages - 3)
                                <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                            @endif
                        @else
                            @for ($i = 1; $i <= $num_pages; $i++)
                                <li class="page-item {{ $i == $current_page ? 'active' : '' }}"><a class="page-link"
                                        href="#">{{ $i }}</a></li>
                            @endfor
                        @endif--}}
                        <li class="page-item btn-next ">
                            <a class="page-link" href="#">Next </a>
                        </li>
                    </ul>
                </nav>
            </div>
            {{-- <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="img/package-1.jpg" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Thailand</small>
                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>3 days</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>2 Person</small>
                            </div>
                            <a class="h5 text-decoration-none" href="">Discover amazing places of the world with us</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                    <h5 class="m-0">$350</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="img/package-2.jpg" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Thailand</small>
                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>3 days</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>2 Person</small>
                            </div>
                            <a class="h5 text-decoration-none" href="">Discover amazing places of the world with us</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                    <h5 class="m-0">$350</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="img/package-3.jpg" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Thailand</small>
                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>3 days</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>2 Person</small>
                            </div>
                            <a class="h5 text-decoration-none" href="">Discover amazing places of the world with us</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                    <h5 class="m-0">$350</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="img/package-4.jpg" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Thailand</small>
                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>3 days</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>2 Person</small>
                            </div>
                            <a class="h5 text-decoration-none" href="">Discover amazing places of the world with us</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                    <h5 class="m-0">$350</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="img/package-5.jpg" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Thailand</small>
                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>3 days</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>2 Person</small>
                            </div>
                            <a class="h5 text-decoration-none" href="">Discover amazing places of the world with us</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                    <h5 class="m-0">$350</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="img/package-6.jpg" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Thailand</small>
                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>3 days</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>2 Person</small>
                            </div>
                            <a class="h5 text-decoration-none" href="">Discover amazing places of the world with us</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                    <h5 class="m-0">$350</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
        </div>
    </div>
</div>
<!-- Packages End -->
@stop

@section('script')
    <script>
        $(function() {
            $('.get_Fornisseur').click(function () {
                current_item = $('.get_Fornisseur').filter('.active');
                $('.get_Fornisseur').removeClass("active");
                $(this).addClass("active");
                $(this).removeClass("d-none");
                if ($(this).prev().hasClass("btn-previous"))
                    $(this).prev().addClass("disabled");
                else{
                    $(this).prev().removeClass("d-none");
                    $('.btn-previous').removeClass("disabled");
                }
                if ($(this).next().hasClass("btn-next")) 
                    $(this).next().addClass("disabled");
                else{
                    $('.btn-next').removeClass("disabled");
                    $(this).next().removeClass("d-none");
                }
                if ($(this).children().eq(0).text() > current_item.children().eq(0).text()) {
                    index = 1;
                    while ($('.get_Fornisseur').filter('.d-none').children().length < 6) {
                        $('.pagination').children().eq(index).addClass('d-none');
                        index++;
                    }
                }
                if ($(this).children().eq(0).text() < current_item.children().eq(0).text()) {
                    index = $('.get_Fornisseur').children().length;
                    while ($('.get_Fornisseur').filter('.d-none').children().length < 6) {
                        $('.pagination').children().eq(index).addClass('d-none');
                        index--;
                    }
                }
                getItemsFournisseur();
            });
            
            $('.btn-previous').click(function () {
                current_item = $('.get_Fornisseur').filter('.active');
                if(!current_item.prev().hasClass("btn-previous"))
                {
                    current_item.removeClass('active');
                    current_item.prev().addClass('active');
                }
                else
                    $(this).addClass("disabled");
                if (current_item.prev().prev().hasClass("btn-previous")) 
                    $(this).addClass("disabled");
                
                if (current_item.prev().prev().hasClass('d-none')) {
                    current_item.prev().prev().removeClass('d-none');
                    console.log($('.get_Fornisseur').filter('.d-none').children().length);
                    index = $('.get_Fornisseur').children().length;
                    while ($('.get_Fornisseur').filter('.d-none').children().length < 6) {
                        $('.pagination').children().eq(index).addClass('d-none');
                        index--;
                    }
                }
                $('.btn-next').removeClass('disabled');
                getItemsFournisseur();
            });

            $('.btn-next').click(function () {
                current_item = $('.get_Fornisseur').filter('.active');
                if(!current_item.next().hasClass("btn-next"))
                {
                    current_item.removeClass('active');
                    current_item.next().addClass("active");
                }else
                    $(this).addClass("disabled");
                if (current_item.next().next().hasClass("btn-next")) 
                    $(this).addClass("disabled");
                if (current_item.next().next().hasClass('d-none')) {
                    current_item.next().next().removeClass('d-none');
                    index = 1;
                    while ($('.get_Fornisseur').filter('.d-none').children().length < 6) {
                        $('.pagination').children().eq(index).addClass('d-none');
                        index++;
                    }
                }   
                $('.btn-previous').removeClass('disabled');
                getItemsFournisseur(); 
            });
            
            function getItemsFournisseur() {
                $('.item-fornisseur').addClass("d-none");
                last_Item = $('.get_Fornisseur').filter('.active').children(0).text();
                for (let index = ((last_Item*6)-6); index < last_Item*6; index++) {
                    $(".parent-Item-Fornisseur").children().eq(index).removeClass("d-none");
                }
            }
        });
    </script>
@endsection
