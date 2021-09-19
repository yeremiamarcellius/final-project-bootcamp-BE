@extends('layouts.app')

@section('content')
    <h1>{{$product->productName}}</h1>
    {{-- <p>{{$product->category->categoryName}}</p> --}}
    <p>{{$product->productPrice}}</p>
    <p>{{$product->productStock}}</p>
    <p>{{$product->expireddate}}</p>
    <img src="{{asset('storage/image/'.$product->productImage)}}" alt="asas" style="width: 100px">
    <form class = "col-lg-6" action="{{route('storeFaktur', $product->id)}}" method ="POST">
        @csrf
        <div class="mb-3">
            <label for="">kuantitas</label>
            <input name = "kuantitas" type="number" class="form-control">
            @error('kuantitas') <span>{{$message}}</span>@enderror
        </div>
        <div class="mb-3">
            <label for="">alamat</label>
            <input name = "alamat" type="text" class="form-control">
            @error('alamat') <span>{{$message}}</span>@enderror
        </div>
        <div class="mb-3">
            <label for="">kode pos</label>
            <input name = "kodePos" type="number" class="form-control">
            @error('kodePos') <span>{{$message}}</span>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection