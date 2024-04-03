@extends('template.template')

@section('head')

@endsection

@section('body')
    @guest
        Home
    <br>
        Find and Buy Your Grocery Here!
        <br>
        <a href="{{route('register')}}">Register</a>
        <a href="{{route('login')}}">Login</a>
    @endguest

    @auth
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-5 p-5">
            <div class="row row-cols-5">
                @foreach ($products as $product)
                <div class="col mb-4">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->item_name}}</h5>

                            <a href="{{route('productById', $product->id)}}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $products->links('pagination::bootstrap-5') }}
        </div>


    @endauth
@endsection
