<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data["allcategory"]=Category::all();
        return view("category.viewcategory",$this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["singlecategory"]=New Category();
        return view("category.addcategory",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|string|max:20",
        ]);
        $storecategory=new Category();
        $storecategory->title=$request->name;
        $storecategory->save();
        return redirect()->to("category")->with("createcategory","category create successfully.");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data["singlecategory"]=Category::findOrFail($id);
        return view("category.singlecategoryview",$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data["singlecategory"]=Category::findOrFail($id);
        return view("category.addcategory",$this->data);
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
        $requestdata=$request->all();
        $modeldata=Category::findOrFail($id);
        $modeldata->title=$request["name"];
        $modeldata->save();
        return redirect()->to("category")->with("editcategory","category edit successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->to("category")->with("deletecategory","category delete successfully");
    }
}
