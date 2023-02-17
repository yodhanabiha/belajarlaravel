<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdulevelController extends Controller
{
    public function data()
    {
        $edulevels = DB::table('edulevels')->get();

        //return $edulevels; 
        //return view('edulevel.data', ['edulevels' => $edulevels]);
        //return view('edulevel.data', compact('edulevels'));  //pakai compact harus sama nama tabel dan variabel
        return view('edulevel.data')->with('edulevels',$edulevels);
    }

    public function add()
    {
        return view('edulevel.add');
    }
    public function addProcess(Request $request)
    {
        DB::table('edulevels')->insert([
            'name' => $request->name,
            'desc' => $request->desc
        ]);

        return redirect('edulevels')->with('status', 'jenjang berhasil ditambah!');
    }
}

