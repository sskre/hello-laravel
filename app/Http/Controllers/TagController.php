<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Requests\StoreTag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tag.list', ['tags' => Tag::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTag  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTag $request)
    {
        $result = Tag::create($request->except('_token'));

        if (! isset($result->id))
        {
            return redirect('tag')->with(
                'notification',
                [
                    'level' => 'error',
                    'message' => __('message.create_failed'),
                ]
            );
        }

        return redirect('tag')->with(
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
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tag.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreTag  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTag $request, Tag $tag)
    {
        if (! $tag->fill($request->except(['_token', '_method']))->save())
        {
            return redirect('tag')->with(
                'notification',
                [
                    'level' => 'error',
                    'message' => __('message.update_failed'),
                ]
            );
        }

        return redirect('tag')->with(
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
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if (Tag::destroy($tag->id) !== 1)
        {
            return redirect('tag')->with(
                'notification',
                [
                    'level' => 'error',
                    'message' => __('message.delete_failed'),
                ]
            );
        }

        return redirect('tag')->with(
            'notification',
            [
                'level' => 'info',
                'message' => __('message.delete_succeeded'),
            ]
        );
    }
}
