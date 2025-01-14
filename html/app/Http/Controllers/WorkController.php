<?php

namespace App\Http\Controllers;

use App\Http\Resources\Work as Resource;
use App\Models\Work;
use Illuminate\Http\{Request, Response};
use DB;

class WorkController extends Controller
{
    /**
     * Middleware のテスト用アクション
     *
     * @param  int  $id
     * @return int
     */
    public function test(int $id)
    {
        return $id;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        // DB::enableQueryLog();
        // $result = Resource::collection(Work::with(['owner'])->get());
        // $json = $result->toJson();
        // dd(DB::getQueryLog());
        // return $json;

        return Resource::collection(Work::All());
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
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resouce.
     *
     * @param  int  $id
     * @return Resource
     */
    public function show($id)
    {
        return new Resource((new Work())->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
