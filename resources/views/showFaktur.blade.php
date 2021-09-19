@extends('layouts.app')

@section('content')

<table class ="table">
    <tr>
        <th>Product Name</th>
        <th>Product Category</th>
        <th>Product Price</th>
        <th>kuantitas</th>
        <th>alamat</th>
        <th>kode pos</th>
        <th>sub total</th>
        <th>Action</th>
    </tr>
    <tbody>
        @foreach($fakturs as $faktur)
            @if ($faktur->userId == Auth::user()->id)
            <tr>
                <td>
                    {{-- <a href="{{route('showProduct', $faktur->product->id)}}">{{$faktur->product->productName}}</a> --}}
                </td>
                {{-- <td>{{$product->category->categoryName}}</td> --}}
                <td></td>
                <td>
                    {{-- {{$faktur->product->productPrice}} --}}
                </td>
                <td>{{$faktur->kuantitas}}</td>
                
                <td>{{$faktur->alamat}}</td>
                <td>{{$faktur->kodePos}}</td>
                <td>{{$faktur->total}}</td>
                <td>
                    <div class ="d-flex">
                        <a href="{{route('editFaktur', $faktur->id)}}" class="btn btn-success">Edit</a>
                        <form action="{{route('deleteFaktur', $faktur->id)}}" class = "ml-3" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type = "submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endif 
        @endforeach
    </tbody>
</table>
<a href="{{route('printFaktur')}}" class="btn btn-success">print faktur</a>


@endsection