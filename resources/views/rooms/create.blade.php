@extends("layouts.layout")
@section('main')
@if ($errors->any())
      <div class="alert alert-danger">
          <ul>
             @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
          </ul>
       </div>
    @endif
<form action="{{route("rooms.store")}}" method="POST">
       @csrf
       @method("POST")
       <input  class="form-control"  placeholder="name" type="text" name="name" value="">
        <input  class="form-control"  placeholder="posti letto" type="number" name="beds" value="">
        <input  class="form-control"  placeholder="piano della stanza" type="number" name="floor" value="">
       <select name="user_id" id="">
        @foreach ($users as $user)
       <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
       </select>
       <button type="submit">Salva</button>
   </form>
@endsection