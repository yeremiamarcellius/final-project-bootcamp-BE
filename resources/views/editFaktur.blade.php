@extends('layouts.app')

@section('content')

{{-- <h1>{{$faktur->product->productName}}</h1>
    <p>{{$product->category->categoryName}}</p> 
    <p>{{$faktur->product->productPrice}}</p>
    <p>{{$faktur->product->productStock}}</p>
    <p>{{$faktur->product->expireddate}}</p> --}}
    {{-- <img src="{{asset('storage/image/'.$faktur->product->productImage)}}" alt="asas" style="width: 100px"> --}}
    <form class = "col-lg-6" action="{{route('updateFaktur', $faktur->id)}}" method ="POST">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="">kuantitas</label>
            <input name = "kuantitas" type="number" class="form-control" value = "{{$faktur->kuantitas}}">
            @error('kuantitas') <span>{{$message}}</span>@enderror
        </div>
        <div class="mb-3">
            <label for="">alamat</label>
            <input name = "alamat" type="text" class="form-control" value="{{$faktur->alamat}}">
            @error('alamat') <span>{{$message}}</span>@enderror
        </div>
        <div class="mb-3">
            <label for="">kode pos</label>
            <input name = "kodePos" type="number" class="form-control" value="{{$faktur->kodePos}}">
            @error('kodePos') <span>{{$message}}</span>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection