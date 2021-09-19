@extends('layouts.app')

@section('content')
    <table class ="table">
        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Stock</th>
            <th>Product Category</th>
            <th>Action</th>
        </tr>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        <a href="{{route('showProduct', $product->id)}}">{{$product->productName}}</a>
                    </td>
                    <td>{{$product->productPrice}}</td>
                    <td>{{$product->productStock}}</td>
                    {{-- <td>{{$product->category->categoryName}}</td> --}}
                    <td></td>
                    <td>
                        <div class ="d-flex">
                            <a href="{{route('editProduct', $product->id)}}" class="btn btn-success">Edit</a>
                            <form action="{{route('deleteProduct', $product->id)}}" class = "ml-3" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type = "submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href = "{{route('createProduct')}}" class = "btn btn-primary" style = "display: block; margin: auto; width: 20%">
        Create data product
    </a>
@endsection