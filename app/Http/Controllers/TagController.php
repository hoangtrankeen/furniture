<?php

namespace App\Http\Controllers;

use App\Model\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('backend/tag/index')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array('name' => 'required|max:100'));
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'New Tag was successfully created!');
        return  redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('manage/tags/edit')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $this->validate($request, array(
            'name'=> 'required|max:100'
        ));

        $tag->name = $request->name;
        $tag->created_by = $user_id;
        $tag->save();

        Session::flash('success', 'Successfully save your new tag!');
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();

        Session::flash('success', 'Tag was deleted successfully');

        return redirect()->route('tag.index');
    }
}
