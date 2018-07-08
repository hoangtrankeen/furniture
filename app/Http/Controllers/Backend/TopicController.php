<?php

namespace App\Http\Controllers\Backend;

use App\Model\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['topics'] = Topic::all();
        return view('backend/topic/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Topic::where('parent_id', 0)->get();
        return view('backend/topic/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            // rules, criteria
            'name'           => 'required|max:190',
            'slug'           => 'required|alpha_dash|unique:topics',
            'parent_id'      => 'required|max:255',
        ));

        $topic = new Topic();
        $topic->name = $request->name;
        $topic->slug = $request->slug;
        $topic->parent_id = $request->parent_id;
        $topic->save();

        Session::flash('success', 'The topic was successfully save!');
        return redirect()->route('topic.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['thiscat'] = Topic::findOrFail($id);

        $data['categories'] = Topic::where('parent_id', 0)->where('id','!=', $id)->get();
        return view('backend/topic/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            // rules, criteria
            'name'           => 'required|max:190',
            'slug'           => 'required|alpha_dash|unique:topics,slug,'.$id,
            'parent_id'      => 'required|max:255',
        ));

        $topic = Topic::find($id);
        $topic->name = $request->name;
        $topic->slug = $request->slug;
        $topic->parent_id = $request->parent_id;
        $topic->save();

        Session::flash('success', 'The topic was successfully updated!');
        return redirect()->route('topic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Topic $topic
     * @return void
     */
    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->children()->delete();
        $topic->posts()->detach();
        $topic->delete();

        return redirect()->route('topic.index');
    }
}
