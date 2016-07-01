<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Session;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tag::paginate(15);

        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $statuses = ['1' => 'Active', '0' => 'Inactive'];
        return view('tags.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\AddTagsRequest $request)
    {

        $tag = new Tag();
        $tag->name = $request->input('name');
        $tag->status = $request->input('status');

        if($tag->save()){
            Session::flash('success_msg', 'Tag Create Successful');
        }else{
            Session::flash('error_msg', 'Tag Create Failed. Please Try Again Later');
        }

        return redirect('tags');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        try{
            $tag = Tag::findOrFail($id);
        }catch (ModelNotFoundException $e){
            Session::flash('error_msg', 'Tag Not Found');
            return redirect('tags');
        }

        $statuses = ['1' => 'Active', '0' => 'Inactive'];
        return view('tags.edit', compact('tag', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Requests\TagUPdateRequest $request)
    {
        try{
            $tag = Tag::findOrFail($id);
        }catch (ModelNotFoundException $e){
            Session::flash('error_msg', 'Tag Not Found');
            return redirect('tags');
        }
        $tag->name = $request->input('name');
        $tag->status = $request->input('status');

        if($tag->save()){
            Session::flash('success_msg', 'Tag Update Successful');
        }else{
            Session::flash('error_msg', 'Tag Update Failed. Please Try Again Later');
        }

        return redirect('tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $tag = Tag::findOrFail($id);
        }catch(ModelNotFoundException $e){
            Session::flash('error_msg', 'Tag Not Found');
            return redirect('tags');
        }

        $res = $tag->delete();
        if($res){
            Session::flash('success_msg', 'Tag delte successful');
        }else{
            Session::flash('error_msg', 'Tag could not delete, please try again later');
        }
        return redirect('tags');
    }
}
