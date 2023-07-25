@extends('layouts.index')

@section('content')
@foreach($ar_user as $us)
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ url('/user')}}">User</a></li>
  <li class="breadcrumb-item">Detail User</li>
  </ol>
<div class="card" style="width: 18rem;">

    {{-- @php
    if(!empty($br->foto)){
    @endphp
        <img src="{{ asset('images')}}/{{ $br->foto }}" width="100%"/>
    @php
    } else {
    @endphp
        <img src="{{ asset('images')}}/noimages.png" width="100%"/>
    @php
    }
    @endphp --}}
    <div class="card-body">
        @foreach($ar_user as $us)
      <h5 class="card-title">{{$us->name}}</h5>
      <h5 class="card-title">{{$us->email}}</h5>
      <h5 class="card-title">{{$us->rol}}</h5>
      @endforeach
    </div>
  </div>
  <br/>
  <a class="btn btn-warning" href="{{ url('/barang')}}">Kembali</a>
@endforeach
@endsection