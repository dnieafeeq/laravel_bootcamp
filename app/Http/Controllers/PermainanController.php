<?php

namespace App\Http\Controllers;

use App\Models\Permainan;
use Illuminate\Http\Request;

class PermainanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permainans = Permainan::all();
        return view('permainans.index',[
            'permainans'=>$permainans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permainan = new Permainan;

        $permainan->nama = $request->nama;
        $permainan->harga = $request->harga;
        $permainan->syarikat = $request->syarikat;
        $permainan->jenis = $request->jenis;
        $permainan->pub_date = $request->pub_date;

        $permainan->kedai_id = $request->kedai_id;

        $permainan->save();

        return redirect('/permainans/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permainan  $permainan
     * @return \Illuminate\Http\Response
     */
    public function show(Permainan $permainan)
    {
        return view('permainans.show',[
            'permainan'=>$permainan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permainan  $permainan
     * @return \Illuminate\Http\Response
     */
    public function edit(Permainan $permainan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permainan  $permainan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permainan $permainan)
    {
        $permainan->nama = $request->nama;
        $permainan->harga = $request->harga;
        $permainan->syarikat = $request->syarikat;
        $permainan->jenis = $request->jenis;
        $permainan->pub_date = $request->pub_date;

        $permainan->kedai_id = $request->kedai_id;

        $permainan->save();

        return redirect('/permainans/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permainan  $permainan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permainan $permainan)
    {
        //
    }
}
