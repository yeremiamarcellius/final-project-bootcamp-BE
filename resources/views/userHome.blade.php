@extends('layouts.app')

@section('content')
    <table class ="table">
        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Stock</th>
            <th>Product Category</th>
            <th>product Image</th>
            <th>Action</th>
        </tr>
        <tbody>
            @foreach($products as $product)
            @if ($product!=null && $count++)
                
            @endif
                <tr>
                    <td>
                        <a href="{{route('showProduct', $product->id)}}">{{$product->productName}}</a>
                    </td>
                    <td>{{$product->productPrice}}</td>
                    <td>{{$product->productStock}}</td>
                    <td></td>
                    {{-- <td>{{$product->category->categoryName}}</td> --}}
                    <td><img src="{{asset('storage/image/'.$product->productImage)}}" alt="" style="width: 300px"></td>
                    <td><a href="{{route('addFaktur', $product->id)}}" class="btn btn-success">Add to Faktur</a></td>
                </tr>
            @endforeach
            @if ($count == 0)
                <h1>Barang sudah habis, silahkan tunggu hingga barang di-restock ulang</h1>
            @endif
        </tbody>
    </table>
<td><a href="{{route('showFaktur')}}" class="btn btn-success">Show Faktur</a></td>
@endsection