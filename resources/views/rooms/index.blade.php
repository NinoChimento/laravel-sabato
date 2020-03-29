@extends('layouts.layout')
@section('main')

   @if (session("delete"))
        <div class="alert alert-danger">
            Hai cancellato la stanza:{{session("delete")->name}}
        </div>
   @endif 
<a href="{{route("rooms.create")}}">Crea Stanza</a>
   <div class="wrap-rooms d-flex flex-wrap">
       @foreach ($rooms as $room)
            {{-- @dd($room); --}}
           <div class="card" style="width: 18rem;">
           <h2>{{$room->name}} id : {{$room->id}}</h2>
              <div class="card-body">
              <h4>Numero posti letto {{$room->beds}}</h4>
                <h5 class="card-title">Prenotato Da:{{$room->user->name}}</h5>
                <p class="card-text">Piano della stanza {{$room->floor}}</p>
                <a class="btn btn-success" href="{{route("rooms.show",$room)}}">Dettagli</a>
                <a href="#" class="btn btn-primary">Modifica</a>
              <form action="{{route("rooms.destroy",$room->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger" type="submit">Cancella</button>
              </form>
              </div>
            </div>
       @endforeach
   </div>
@endsection