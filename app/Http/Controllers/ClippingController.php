<?php

namespace App\Http\Controllers;

use App\Clipping;
use App\Http\Requests\StoreClipping;
use Illuminate\Http\Request;

class ClippingController extends Controller
{
    /**
     * constractor
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'clipping.list',
            [
                'clippings' => Clipping::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clipping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClipping  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClipping $request)
    {
        $result = Clipping::create($request->except('_token'));

        if (isset($result->id))
        {
            $request->session()->flash(
                'notification',
                [
                    'level' => 'info',
                    'message' => 'Saved successfully.',
                ]
            );
        }
        else
        {
            $request->session()->flash(
                'notification',
                [
                    'level' => 'error',
                    'message' => 'Failed to save data.',
                ]
            );
        }

        return redirect('clipping');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clipping  $clipping
     * @return \Illuminate\Http\Response
     */
    public function show(Clipping $clipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clipping  $clipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Clipping $clipping)
    {
        //
        return view('clipping.edit', ['clipping' => $clipping]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clipping  $clipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clipping $clipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clipping  $clipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clipping $clipping)
    {
        //
    }
}
