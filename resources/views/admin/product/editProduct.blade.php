@extends('template.template')

@section('head')

@endsection

@section('body')
<div class="p-5">
    <h1>Edit Product </h1>
    <form action="{{route('updateProduct', $product->id)}}" method="POST">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="" class="form-label">Item Name</label>
            <input name="item_name" type="text" class="form-control" id="" value={{$product->item_name}}>
        </div>

        @error('item_name')
            <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="" class="form-label">Item Description</label>
            <textarea class="form-control" name="item_desc" id="" cols="30" rows="10">{{$product->item_desc}}</textarea>
        </div>

        @error('item_desc')
            <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input name="price" type="number" class="form-control" id="" value="{{$product->price}}">
        </div>

        @error('price')
            <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
