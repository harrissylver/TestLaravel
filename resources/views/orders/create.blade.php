@extends('layouts.app')
@section('title', 'Commande - Index')
@section('content')
<div class="row">
    @if ($productsInCart)
    <div class="mb-3">
        @foreach ($productsInCart as $item)
        <h5>{{ $item->title }}</h5>
        @endforeach
    </div>
    <hr>
    <form method="POST" action="{{ route('commandes.store') }}">
        @csrf
        <div class="mb-3">
            <label for="firstName" class="form-label">Nom</label>
            <input type="text" name="firstName" class="form-control @if($errors->has('firstName'))is-invalid @endif"
                id="firstName">
            @if ($errors->has('firstName'))
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $errors->first('firstName') }}
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Prénom</label>
            <input type="text" name="lastName" class="form-control @if($errors->has('lastName'))is-invalid @endif"
                id="firstName">
            @if ($errors->has('lastName'))
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $errors->first('lastName') }}
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>
            <input type="email" name="email" class="form-control @if($errors->has('email'))is-invalid @endif"
                id="firstName">
            @if ($errors->has('email'))
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label>
            <input type="text" name="address" class="form-control @if($errors->has('address'))is-invalid @endif"
                id="firstName">
            @if ($errors->has('address'))
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $errors->first('address') }}
            </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Confirmer la commande</button>
    </form>
    @else

    @endif

</div>

@endsection