<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arrival;


class ArrivalController extends Controller
{
    
    public function arrival(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $arrival = arrival::where('name','LIKE','%'.$search.'%')->get();
        } 
        else{
        $arrival= arrival::all();

        }

        $data= compact('arrival','search');
        return view('admin.arrival')->with($data);
    }


    public function new()
    {
        return view('admin.new');
    }

    public function arrivalstore(Request $request)
    {
        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $arrival = new arrival;
        $arrival->name=$request->name;
        $arrival->price=$request->price;
        $arrival->image=$image=$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images/',$image);

        $arrival->save();
        return redirect()->back()->with('message','Product Added Successfully !');
        
    }
    
    public function show($id)
    {

        
        $arrival = arrival::where('id','=', $id)->first();
        return view('admin.arrival.view',compact('arrival'));
    }

    
    public function edit( $id)
    {
       $arrival = arrival::where('id', '=',$id )->first();
       return view('admin.arrival.edit',compact('arrival'));
        
    }

    
    public function update(Request $request)
    {
        $id=$request->id;
        $name=$request->name;
        $price=$request->price;
        

        $image=$request->file('image')->getClientOriginalName();
        $request->file('image')->store('public/images/');

        
        arrival::where('id','=',$id)->update([
            'name'=>$name,
            'price'=>$price,
            'image'=>$image,  
        ]);
        return redirect()->back()->with('message','Updated Successfully !');
    }

    /**
     * Remove the specified resource f  rom storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arrival= arrival::find($id);
        $arrival->delete();
        return redirect('/arrival');
    }
}
