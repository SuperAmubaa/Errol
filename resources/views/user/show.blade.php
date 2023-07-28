@extends('layouts.index')

@section('content')
@foreach($ar_user as $us)
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ url('/user')}}">User</a></li>
  <li class="breadcrumb-item">Detail User</li>
  </ol>

  
<div class="card" style="width: 50rem;">
<div class="row">
  <div class="col-6">
    @php
    if(!empty($us->foto)){
    @endphp
        <img src="{{ asset('images')}}/{{ $us->foto }}" width="100%"/>
    @php
    } else {
    @endphp
        <img src="{{ asset('images')}}/noimages.png" width="100%"/>
    @php
    }
    @endphp
  </div>
  <div class="col-6">
    <div class="card-body">
      @foreach($ar_user as $us)
    <h5 class="card-title"><a>Username : {{""}}</a>{{$us->name}}</h5>
    <h5 class="card-title"><a>Email : {{""}}</a>{{$us->email}}</h5>
    <h5 class="card-title"><a>Phone : {{""}}</a>{{$us->phone}}</h5>
    <h5 class="card-title"><a>Address : {{""}}</a>{{$us->address}}</h5>
    <h5 class="card-title"><a>Role : {{""}}</a>{{$us->rol}}</h5>
    @endforeach
  </div>
</div>
  </div>
</div>
   
    
  <br/>
  <a class="btn btn-warning" href="{{ url('/user')}}">Kembali</a>
@endforeach
@endsection