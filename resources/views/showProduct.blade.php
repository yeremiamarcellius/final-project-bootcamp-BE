@extends('layouts.app')

@section('content')
    <h1>{{$product->productName}}</h1>
    {{-- <p>{{$product->category->categoryName}}</p> --}}
    <p>{{$product->productPrice}}</p>
    <p>{{$product->productStock}}</p>
    <img src="{{asset('storage/image/'.$product->productImage)}}" alt="asas" style="width: 100px">
    <a href = "{{route('home')}}" class = "btn btn-primary" style = "display: block; margin: auto; width: 20%">
        home
    </a>
@endsection