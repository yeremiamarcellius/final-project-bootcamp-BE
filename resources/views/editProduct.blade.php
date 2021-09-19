@extends('layouts.app')

@section('content')
    <div class = "d-flex align-items-center justify-content-center" style="min-height: 95vh">
        <form class = "col-lg-6" action="{{route('updateProduct', $product->id)}}" method ="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="">product name</label>
                <input name = "name" type="text" placeholder = "product name" class="form-control" value="{{$product->productName}}">
                @error('name') <span>{{$message}}</span>@enderror
            </div>
            <div class="mb-3">
                <label for="">product price</label>
                <div>Rp.</div>
                <input name = "price" type="number" placeholder = "price" class="form-control" value="{{$product->productPrice}}">
                @error('price') <span>{{$message}}</span>@enderror
            </div>
            <div class="mb-3">
                <label for="">product stock</label>
                <input name = "stock" type="number" placeholder = "stock" class="form-control" value="{{$product->productStock}}">
                @error('stock') <span>{{$message}}</span>@enderror
            </div>
            <div class ="mb-3">
                <label for="">category</label>
                <select name="category" class="form-control" placeholder ="category">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->categoryName}}</option>
                @endforeach
                </select>
                @error('category') <span>{{$message}}</span>@enderror
            </div>
            <div class="mb-3">
                <label for="">product image</label>
                <input name = "image" type="file" placeholder = "image" class="form-control">
                @error('image') <span>{{$message}}</span>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection