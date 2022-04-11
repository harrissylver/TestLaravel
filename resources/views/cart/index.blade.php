@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<x-message-flash/>
<div class="card">
    <div class="card-header">
        Produits dans le panier
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantite</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["products"] as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ session('products')[$product->id] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="text-end">
                <a class="btn btn-outline-secondary mb-2"><b>Total à payer:</b> Euro {{ $viewData["total"] }}</a>
                @if (count($viewData["products"]) > 0)
                <a href="{{ route('commandes.create') }}" class="btn bg-primary text-white mb-2">Commander</a>
                <a href="{{ route('cart.delete') }}">
                    <button class="btn btn-danger mb-2">
                        Vider le panier
                    </button>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection