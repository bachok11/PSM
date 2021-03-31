<?php

namespace App\Http\Controllers;

use App\MosqueCommittee;
use Illuminate\Http\Request;

class MosqueCommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mosque_committee/list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mosque_committee/add');
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
     * @param  \App\MosqueCommittee  $mosqueCommittee
     * @return \Illuminate\Http\Response
     */
    public function show(MosqueCommittee $mosqueCommittee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MosqueCommittee  $mosqueCommittee
     * @return \Illuminate\Http\Response
     */
    public function edit(MosqueCommittee $mosqueCommittee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MosqueCommittee  $mosqueCommittee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MosqueCommittee $mosqueCommittee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MosqueCommittee  $mosqueCommittee
     * @return \Illuminate\Http\Response
     */
    public function destroy(MosqueCommittee $mosqueCommittee)
    {
        //
    }
}
