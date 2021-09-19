@extends('layouts.app')

@section('content')
@foreach ($fakturs as $faktur)
@if ($faktur->userId == Auth::user()->id && $total += $faktur->total)
@if ($invoice == 1 && $invoice++)
@if ($faktur->id > 100)
<h1>inv{{$faktur->id}}</h1>

@elseif ($faktur->id > 9 && $faktur->id < 100)
<h1>inv0{{$faktur->id}}</h1>

@else
<h1>inv00{{$faktur->id}}</h1>
@endif
@endif
<h1>
    {{-- {{$faktur->product->productName}} --}}
</h1>
{{-- <img src="{{asset('storage/image/'.$faktur->product->productImage)}}" alt="asas" style="width: 100px"> --}}
{{-- <p>{{$faktur->product->category->categoryName}}</p> --}}
<p>x{{$faktur->kuantitas}}</p>
<p>subtotal</p>
<p>{{$faktur->total}}</p>
@endif
@endforeach
<h3>Total:</h3>
    <p>Rp{{$total}}</p>
    <a href = "{{route('userHome')}}" class = "btn btn-primary" style = "display: block; margin: auto; width: 20%">
        home
    </a>

@endsection