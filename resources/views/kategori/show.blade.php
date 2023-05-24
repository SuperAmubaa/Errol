@extends('layouts.index')
@section('content')
<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        @foreach($ar_kategori as $k)
        <h5 class="card-title">{{$k->name}}</h5>
      @endforeach
    </div>
  </div>
  <br/>
  <a class="btn btn-warning" href="{{ url('/kategori')}}">Kembali</a>


@endsection