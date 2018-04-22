<?php

namespace App\Http\Controllers\Backend;

use App\Model\Attribute;
use App\Model\AttributeValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AttributeController extends Controller
{
    protected $type;

    public function __construct()
    {
        $this->type = Attribute::availableAttributeType();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['attributes'] = Attribute::all();
        return view('backend/attribute/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['attr_types'] = Attribute::availableAttributeType();
        return view('backend/attribute/create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $types = implode(",", $this->type);

        $this->validate($request, array(
            'name'           => 'required|max:190',
            'type'           => 'required|max:190|in:'.$types,
            'inform_name'    => 'required|max:190',
        ));


        $attribute = new Attribute();
        $attribute->name = $request->name;
        $attribute->type = $request->type;
        $attribute->inform_name = $request->inform_name;
        $attribute->save();

        // Get Attribute value in form
        if($request->type == 'select'){
            $i = 0;
            while ($request->has('attr_value_'.($i+1)) && $request->input('attr_value_'.($i+1)) !== null && is_integer((int)$request->input('attr_value_'.($i+1)))) {
                $attr_val = new AttributeValue;

                $attr_val->attribute_id = $attribute->id;
                $attr_val->name = $request->input('attr_value_'.($i+1)) ;

                $attr_val->save();

                $i++;
            }

        }

        Session::flash('success', 'The attribute was successfully save!');
        return redirect()->route('attribute.index');
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
        $data['attribute'] = Attribute::findOrFail($id);
        $data['attr_types'] = Attribute::availableAttributeType();
        return view('backend/attribute/edit', $data);
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
        //$types = implode(",", $this->type);
        $this->validate($request, array(
            'name'   => 'required|max:190',
        ));

        $attribute = Attribute::findOrFail($id);

        $attribute->name = $request->name;

        $attribute->save();

        // Get Attribute value in form
        if($request->type == 'select'){
            $i = 0;
            while ($request->has('attr_value_'.($i+1)) && $request->input('attr_value_'.($i+1)) !== null && is_integer((int)$request->input('attr_value_'.($i+1)))) {

                if(!empty($attribute->attributeValue)){

                   AttributeValue::where('id', $i+1)
                       ->where( 'attribute_id', $attribute->id)
                       ->update([
                        'name' => $request->input('attr_value_'.($i+1))
                        ]);
                }

                $i++;
            }

            $i = 0;
            while ($request->has('new_attr_value_'.($i+1)) && $request->input('new_attr_value_'.($i+1)) !== null && is_integer((int)$request->input('new_attr_value_'.($i+1)))) {

                $attr_val = new AttributeValue;
                $attr_val->attribute_id = $attribute->id;
                $attr_val->name = $request->input('new_attr_value_'.($i+1)) ;
                $attr_val->save();

                $i++;
            }
        }


        Session::flash('success', 'The attribute was successfully save!');
        return redirect()->route('attribute.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $attribute = Attribute::findOrFail($id);
//        $attribute->attributeValue()->update([
//            'attribute_id' => null
//        ]);
//        $attribute->delete();

        Session::flash('success', 'Not Allow to delete. It may cause problem!');
        return redirect()->route('attribute.index');
    }
}
