@extends('template.template')

@section('head')

@endsection

@section('body')
   View Product

   <a class="btn btn-primary" href="{{route('createProduct')}}">Create Product</a>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach ($products as $p)
        <tbody>
            <tr>
            <th scope="row">{{$p->id}}</th>
            <td>{{$p->item_name}}</td>
            <td>
                <a href="{{route('viewProductById', $p->id)}}" class="btn btn-primary">View</a>
                <a href="{{route('editProduct', $p->id)}}" class="btn btn-success">Edit</a>

                <form action="{{route('deleteProduct', $p->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            </tr>
        </tbody>
        @endforeach
        </table>
@endsection
