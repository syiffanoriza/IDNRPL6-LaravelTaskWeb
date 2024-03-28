@extends('layouts.app')
@section('main')

<div class="mt-5 mx-auto" style="width: 380px">
    <div class="card">
        <div class="card-body">

            @if (session('status'))
                <div class="alert alert-success">
                    A fresh verification link has been sent to your email
                </div>
            @endif
            
            Before proceeding, please check email for verification.
            Or

            <form class="d-inline" action="{{ route('verification.send') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
            </form>
        </div>
    </div>
</div>


@endsection