<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bot;
use App\Models\BotUser;
use Illuminate\Http\Request;

class UserBotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {                
        return view('user.mybots')->with('notify',session('notify'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        try {
            $bot = Bot::findOrFail($id);
        } catch (\Throwable $th) {
           return redirect()->back();
        }
        return view('user.purchase_bot')->with('bot',$bot);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
