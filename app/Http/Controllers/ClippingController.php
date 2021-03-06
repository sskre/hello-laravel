<?php

namespace App\Http\Controllers;

use App\Clipping;
use App\Tag;
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
        return view('clipping.list', ['clippings' => Clipping::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clipping.create', ['tags' => Tag::pluck('name', 'id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClipping  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClipping $request)
    {
        $clipping = Clipping::create($request->attrs());
        $clipping->tags()->attach($request->input('tags'));

        if (! isset($clipping->id))
        {
            return redirect('clipping')->with(
                'notification',
                [
                    'level' => 'error',
                    'message' => __('message.create_failed'),
                ]
            );
        }

        return redirect('clipping')->with(
            'notification',
            [
                'level' => 'info',
                'message' => __('message.create_succeeded'),
            ]
        );
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
        return view(
            'clipping.edit',
            [
                'clipping' => $clipping,
                'tags'     => Tag::pluck('name', 'id'),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreClipping  $request
     * @param  \App\Clipping  $clipping
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClipping $request, Clipping $clipping)
    {
        if (! $clipping->fill($request->attrs())->save())
        {
            return redirect('clipping')->with(
                'notification',
                [
                    'level' => 'error',
                    'message' => __('message.update_failed'),
                ]
            );
        }

        $clipping->tags()->sync($request->input('tags'));

        return redirect('clipping')->with(
            'notification',
            [
                'level' => 'info',
                'message' => __('message.update_succeeded'),
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clipping  $clipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clipping $clipping)
    {
        if (Clipping::destroy($clipping->id) !== 1)
        {
            return redirect('clipping')->with(
                'notification',
                [
                    'level' => 'error',
                    'message' => __('message.delete_failed'),
                ]
            );
        }

        return redirect('clipping')->with(
            'notification',
            [
                'level' => 'info',
                'message' => __('message.delete_succeeded'),
            ]
        );
    }
}
