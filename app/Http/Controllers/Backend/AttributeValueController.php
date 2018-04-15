<?php

namespace App\Http\Controllers\Backend;

use App\Model\Attribute;
use App\Model\AttributeValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['attr_values'] = AttributeValue::all();
        return view('backend/attribute_value/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['attributes'] = Attribute::all();
        return view('backend/attribute_value/create', $data);
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
            'attribute_id'   => 'required|integer',
            'name'           => 'required|max:190',
        ));

        $attr_value = new AttributeValue();
        $attr_value->attribute_id = $request->attribute_id;
        $attr_value->name = $request->name;
        $attr_value->save();

        Session::flash('success', 'The attribute value was successfully save!');
        return redirect()->route('attribute-value.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['attr_value'] = AttributeValue::findOrFail($id);
        $data['attributes'] = Attribute::all();
        return view('backend/attribute_value/edit', $data);
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
            'attribute_id'   => 'required|integer',
            'name'           => 'required|max:190',
        ));

        $attr_value = AttributeValue::findOrFail($id);
        $attr_value->attribute_id = $request->attribute_id;
        $attr_value->name = $request->name;
        $attr_value->save();

        Session::flash('success', 'The attribute value was successfully save!');
        return redirect()->route('attribute-value.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AttributeValue::findOrFail($id)->delete();

        return redirect()->route('attribute-value.index');
    }
}
