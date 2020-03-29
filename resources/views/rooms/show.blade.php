@extends('layouts.layout')
@section('main')
   <h2>Dettaglio stanza</h2>
   <div class="wrap-rooms d-flex flex-wrap">
            
           <div class="card" style="width: 18rem;">
           <h2>{{$room->name}} id : {{$room->id}}</h2>
              <div class="card-body">
              <h4>Numero posti letto {{$room->beds}}</h4>
                <h5 class="card-title">Prenotato Da:{{$room->user->name}}</h5>
                <p class="card-text">Piano della stanza {{$room->floor}}</p>
              
                <a href="{{route("rooms.index")}}" class="btn btn-primary">home</a>
              </div>
            </div>
      
   </div>
@endsection