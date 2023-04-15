@extends('backoffice.layouts.prefournisseur')
@section('title', 'Dashboard')
@section('content')
    <div class="alert alert-warning text-center" role="alert">Votre compte n'a pas encore été accepté !</div>
@stop
@section('script')
    <script>
        $(document).ready(function() {
            $('.bn-ac').removeClass('active');
            $(".bn-ac").eq(8).addClass('active');
        });
    </script>
@endsection
