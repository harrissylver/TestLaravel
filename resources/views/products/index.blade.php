@extends('layouts.app')
@section('title', 'Produit - Index')
@section('content')
<div class="row">
    <x-message-flash/>
    @foreach ($products as $product)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card text-center">
                @if(count(json_decode($product->images)))
                    @foreach (json_decode($product->images) as $picture)
                
                        @if ($loop->first)
                            <div class="product-preview">
                                <img src="{{ asset($picture) }}" alt="">
                            </div>
                    
                        @endif
                    @endforeach
                   @else
                   <img src="https://via.placeholder.com/90" alt="" srcset=""> 
                 @endif
            <br>
            <h5 >{{ $product->title }}</h5>
            <span>{{ $product->price }} €</span>
            <div class="card-body">

                <a href="{{ route('produits.show',$product->id) }}" class="btn bg-primary text-white"><i class="fa fa-eye mr-3"></i>Afficher</a>
            </div>
        </div>
    </div>
    @endforeach
    <div class="d-flex pt-2">
        {!! $products->links() !!}
    </div>
</div>

@endsection