@extends('template.template')

@section('head')

@endsection

@section('body')

    <div class="p-5">
        <h1>Cart</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            @foreach ($carts as $c)
                <tbody>
                    <tr>
                        <th scope="row">{{$c->id}}</th>
                        <td>{{$c->product->item_name}}</td>
                        <td>@currency($c->product->price)</td>
                        <td>
                            <form action="{{route('deleteCart', $c->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        <h2>Total: @currency($totalPrice)</h2>

        <form action="{{route('deleteAllCart')}}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-secondary">Checkout</button>
        </form>
    </div>
@endsection
