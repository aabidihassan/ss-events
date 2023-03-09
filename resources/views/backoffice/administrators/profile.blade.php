@extends('backoffice.layouts.administrator')
@section('title', 'Profile')
@section('content')

<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin"
                            class="rounded-circle p-1 bg-primary" width="110">
                        <div class="mt-3">
                            <h4 class="mb-3">Admin</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                <form method="POST" action="{{ route('editCompte') }}">
                    @csrf
                    <h5 class="text-center">Informations de compte</h5>
                    <div class="d-flex flex-column mt-4">
                        <div class="col text-secondary">
                            <h6>Nom d'utilisateur</h6>
                        </div>
                        <div class="col text-secondary">
                            <input type="text" class="form-control" name="username"
                                value="{{ auth()->user()->username }}">
                        </div>
                        <div class="col text-secondary mt-4">
                            <h6>Nouveau mot de passe</h6>
                        </div>
                        <div class="col text-secondary">
                            <input type="password" class="form-control" name="password"
                                autocomplete="new-password">
                        </div>
                        <div class="col text-secondary">
                            <input type="submit" class="btn btn-primary px-4 mt-4" value="Modifier">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
<script>
    $(document).ready(function() {
        $('.bn-ac').removeClass('active');
        $(".bn-ac").eq(1).addClass('active');
    });
</script>
@endsection