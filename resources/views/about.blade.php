@extends('layouts.pages')
@section('containner')
@section('title', 'A propos')
<link href="{{ asset('css/aboutus.css') }}" rel="stylesheet">
<div class="wrapper" style="width: 80%; padding:2%;">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="inner" style="background-image: url('img/registration-form-2.jpeg');">
        <form method="post" action="{{ route('contact') }}">
            @csrf
            <h3>contactez-nous</h3>
            <div class="form-group">
                <div class="form-wrapper">
                    <label for="">Prenom</label>
                    <input type="text" name="prenom" class="form-control" required>
                </div>
                <div class="form-wrapper">
                    <label for="">Nom</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>
            </div>
            <div class="form-wrapper">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-wrapper">
                <label for="">Message</label>
                <textarea class="form-control" name="message" rows="6" required></textarea>
            </div>
            <button>Envoyer</button>
        </form>
    </div>
</div>
@stop
