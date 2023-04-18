@extends('layouts.pages')
@section('containner')
@section('title', 'Verification')
<div id="client-register" class="container-fluid py-5">
    <div class="container py-3">
        <div class="text-center mb-1 pb-3">
            <h2>verification compte </h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form bg-white" style="padding: 30px;">
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </div>
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif
                    <div class="row mt-4 flex items-center justify-between">
                        <div class="col-lg-6">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <div>
                                <button class="btn btn-primary" type="submit">{{ __('Resend Verification Email') }}</button>
                            </div>
                        </form>
                        </div>
                        <div class="col-lg-6">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-secondary" style="width: 80%;margin: 20px auto;border-radius: 5px;padding: 10px 20px;margin-top: 20px;" type="submit"> {{ __('Log Out') }}</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop