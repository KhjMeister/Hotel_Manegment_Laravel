<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;


class RoomController extends Controller
{
    public function index()
    {
        $room_all = Room::orderBy('id','desc')->paginate(6);
        return view('front.room.view', compact('room_all'));
    }

    public function single_room($id)
    {
        $single_room_data = Room::with('rRoomPhoto')->where('id',$id)->first();
        return view('front.room.detail', compact('single_room_data'));
    }
}
