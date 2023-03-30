<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    //Laravel 6 advance episode 2
    public function index(){

        //$channels=Channel::orderBy('name')->get();

        //return view('channel.index',compact('channels'));
        return view('channel.index');
    }
}
