@extends('backoffice.layouts.prestataire')

@section('title', 'Feedbacks')

@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Liste de Feedbacks</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Etoiles</th>
                            <th>Commentaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->prenom . ' ' . $feedback->nom }}</td>
                                <td>{{ $feedback->dateCommit }}</td>
                                <td>{{ $feedback->rating }}</td>
                                <td>{{ $feedback->commentaire }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
