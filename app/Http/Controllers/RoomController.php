<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\User;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $rooms = Room::all();
      
        return view("rooms.index",compact("rooms"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $users = User::all();
        return view("rooms.create",compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $request->validate([
            "name"=> "required|string|max:20",
            "beds"=> "required|numeric|max:5",
            "floor" => "required|numeric|max:5",
            "user_id"=> "required|numeric|exists:App\User,id"
        ]);
        $data = $request->all();
        
        $room = new Room;
        $room->fill($data);
        $room->save();
        
        if($room->save()){
            return view(" rooms.show",compact("room"));
        } else {
            abort("404 il database e in manutenzione");
        }
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
       return view("rooms.show",compact("room"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {



        $id = $room->id;
        $deleted = $room->delete();
        $data = [
            
            'rooms' => Room::all()
        ];
        return redirect()->route('rooms.index')->with('delete', $room);
    }
}
