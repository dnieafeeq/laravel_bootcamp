<?php

namespace App\Http\Controllers;

use App\Models\Permainan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\PermainanBaru;

class PermainanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $response = Http::get('https://swapi.dev/api/starships/?page=1');
        $response_json = $response->json();
        // die($response);


        Storage::disk('local')->put('example.txt', 'Contents');

        $permainans = Permainan::all();
        return view('permainans.index', [
            'permainans' => $permainans,
            'dataAPI' => $response_json['results']
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

        # TO DO
        # send email
        $recipient=["mhdnkaze@gmail.com"];
        Mail::to($recipient)->send(new PermainanBaru);

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
        return view('permainans.show', [
            'permainan' => $permainan
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
