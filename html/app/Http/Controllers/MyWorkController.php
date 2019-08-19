<?php

namespace App\Http\Controllers;

use App\Http\Resources\Work as Resource;
use App\Models\Work;
use Illuminate\Http\{Request, Response};

use App\Http\Requests\MyWork\{
    Store as StoreRequest,
    Update as UpdateRequest
};

class MyWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return Resource::collection(Work::where('owner_id', auth()->user()->id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Resource
     */
    public function store(StoreRequest $request)
    {
        $id = auth()->user()->id;
        $work = new Work();
        $work->fill($request->all());
        $work->owner_id = $id;
        $work->save();

        return new Resource($work);
    }

    /**
     * Display the specified resource.
     *
     * @param  Work work
     * @return Resource
     */
    public function show(Work $work)
    {
        return new Resource($work);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  Work  $work
     * @return Resource
     */
    public function update(UpdateRequest $request, Work $work)
    {
        $work->fill($request->all());
        $work->save();

        return new Resource($work);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
