<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\mainHome;
use App\Models\StyleCard;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::where('user_id', Auth::user()->id)->get();
        $selectTags =  Tag::all();
        foreach ($selectTags as $selectTag) {
            $cardcontainers[] = $cards->where('tag_id', $selectTag->id);
        }

        return view('mainHome.mainHome', ['allstyles' => StyleCard::all(), 'selectTags' => $selectTags, 'cardscontainers' => $cardcontainers]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mainHome  $mainHome
     * @return \Illuminate\Http\Response
     */
    public function show(mainHome $mainHome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mainHome  $mainHome
     * @return \Illuminate\Http\Response
     */
    public function edit(mainHome $mainHome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mainHome  $mainHome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mainHome $mainHome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mainHome  $mainHome
     * @return \Illuminate\Http\Response
     */
    public function destroy(mainHome $mainHome)
    {
        //
    }
}
