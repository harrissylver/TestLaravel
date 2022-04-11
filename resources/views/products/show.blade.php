@extends('layouts.app')
@section('title', '')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        @if(count(json_decode($produit->images)))
                        <div class="images p-3">
                            <div class="text-center p-4">
                                @foreach (json_decode($produit->images) as $picture)
                                @if ($loop->first)
                                <img id="main-image" src="{{ asset($picture) }}" width="300" />
                                @endif
                                @endforeach

                            </div>
                            <div class="thumbnail text-center">
                                @foreach (json_decode($produit->images) as $picture)
                                <img onclick="change_image(this)" src="{{ asset($picture) }}" width="70">
                                @endforeach

                            </div>
                        </div>
                        @else
                            <img src="https://via.placeholder.com/300" alt="" srcset=""> 
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">

                            <div class="mt-4 mb-3"> 
                                <h5 class="text-uppercase">{{ $produit->title }}</h5>
                                <div class="price d-flex flex-row align-items-center">
                                    <span>{{ $produit->price }} Euro</span>
                                </div>
                            </div>
                            <p class="about">
                                {{ $produit->description }}
                            </p>
                            <form method="POST" action="{{ route('cart.add', ['id'=> $produit->id]) }}">
                                @csrf
                                <div class="col-auto">
                                    <div class="input-group col-auto">
                                        <div class="input-group-text">Quantite</div>
                                        <input type="number" min="1" max="10" class="form-control quantity-input"
                                            name="quantity" value="1">
                                    </div>
                                </div>
                                <div class="cart mt-4 align-items-center"> <button
                                        class="btn btn-primary text-uppercase mr-2 px-4">Ajouter au panier</button> <i
                                        class="fa fa-heart text-muted">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="row g-0">
    <div class="col-md-4">

        @foreach (json_decode($produit->images) as $picture)
        <img src="{{ asset($picture) }}" class="img-fluid rounded-start">
        @endforeach
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title">
                {{ $produit->title }} ({{ $produit->price }}) Euro
            </h5>
            <p class="card-text">{{ $produit->description }}</p>
            <p class="card-text">
            <form method="POST" action="{{ route('cart.add', ['id'=> $produit->id]) }}">
                <div class="row">
                    @csrf
                    <div class="col-auto">
                        <div class="input-group col-auto">
                            <div class="input-group-text">Quantite</div>
                            <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity"
                                value="1">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button class="btn bg-primary text-white" type="submit">Ajouter au panier</button>
                    </div>
                </div>
            </form>
            </p>
        </div>
    </div>
</div> --}}
@endsection