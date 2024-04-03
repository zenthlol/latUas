@extends('template.template')

@section('head')

@endsection

@section('body')
   View Product By Id

   <a class="btn btn-primary" href="{{route('viewProducts')}}">Back</a>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Descriptin</th>
            <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{$product->item_name}}</td>
            <td>{{$product->item_desc}}</td>
            <td>{{$product->price}}</td>
            </tr>
        </tbody>
        </table>
@endsection
