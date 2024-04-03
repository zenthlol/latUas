@extends('template.template')

@section('head')

@endsection

@section('body')
    <div class="d-flex flex-row justify-content-center">
        <div class="card" style="width: 100rem; height:50rem">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Item Name:  {{$product->item_name}}</h5>
            <h5 class="card-title">Price:  {{$product->price}}</h5>
            <p class="card-text">Description : {{$product->item_desc}}</p>

            <form action="{{route('addToCart', $product->id)}}" method="POST">
                @csrf
                <button class="btn btn-success" type="submit">Add To Cart</button>
            </form>
            </div>
        </div>
    </div>

@endsection
