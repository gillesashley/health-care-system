<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBloodStockDetailsRequest;
use App\Http\Requests\UpdateBloodStockDetailsRequest;
use App\Models\BloodStockDetails;

class BloodStockDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreBloodStockDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBloodStockDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BloodStockDetails  $bloodStockDetails
     * @return \Illuminate\Http\Response
     */
    public function show(BloodStockDetails $bloodStockDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BloodStockDetails  $bloodStockDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodStockDetails $bloodStockDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBloodStockDetailsRequest  $request
     * @param  \App\Models\BloodStockDetails  $bloodStockDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBloodStockDetailsRequest $request, BloodStockDetails $bloodStockDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BloodStockDetails  $bloodStockDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodStockDetails $bloodStockDetails)
    {
        //
    }
}
