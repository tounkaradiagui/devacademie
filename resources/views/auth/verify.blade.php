@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" style="background-color:#0B6623 ;">{{ __('Verifier votre adresse email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un lien de vérification a été envoyé à votre adresse email.') }}
                        </div>
                    @endif

                    {{ __('Avant de procéder, merci de vérifier votre adresse email.') }}
                    {{ __('Si vous n'avez pas reçu le lien par email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Cliquez ici pour obtenir un autre lien !') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
