<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Feature;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function feature(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $feature = feature::where('name','LIKE','%'.$search.'%')->get();
        } 
        else{
        $feature= feature::all();

        }

        $data= compact('feature','search');
        return view('admin.feature')->with($data);
    }
    
    public function create()
    {
       return view('admin.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $feature = new feature;
        $feature->name=$request->name;
        $feature->price=$request->price;
        $feature->image=$image=$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images/',$image);

        $feature->save();
        return redirect()->back()->with('message','Product Added Successfully !');

    }

    
    public function show($id)
    {

        
        $feature = feature::where('id','=', $id)->first();
        return view('admin.feature.view',compact('feature'));
    }

    
    public function edit( $id)
    {
       $feature = feature::where('id', '=',$id )->first();
       return view('admin.feature.edit',compact('feature'));
        
    }

    
    public function update(Request $request)
    {
        $id=$request->id;
        $name=$request->name;
        $price=$request->price;
        

        $image=$request->file('image')->getClientOriginalName();
        $request->file('image')->store('public/images/');

        
        feature::where('id','=',$id)->update([
            'name'=>$name,
            'price'=>$price,
            
            'image'=>$image,
            
        ]);

        return redirect()->back()->with('message','User Updated Successfully !');
    }

    /**
     * Remove the specified resource f  rom storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature= feature::find($id);
        $feature->delete();
        return redirect('/feature');
    }
}
