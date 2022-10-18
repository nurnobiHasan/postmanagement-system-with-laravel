<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data["allproducts"]=Product::all();
        return view("product.viewproduct",$this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["allcagetory"]=Category::all();
        $this->data["singleproduct"]=New Product();
        return view("product.addproduct",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $storeproductdata=New Product();
        $storeproductdata->category_id=$request->category;
        $storeproductdata->title=$request->name;
        $storeproductdata->description=$request->description;
        $storeproductdata->cost_prize=$request->costprize;
        $storeproductdata->prize=$request->saleprize;
        $storeproductdata->save();
        return redirect()->to("product")->with("createproduct","product create successfully.");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data["singleproduct"]=Product::findOrFail($id);
        return view("product.singleproduct",$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data["allcagetory"]=Category::all();
        $this->data["singleproduct"]=Product::findOrFail($id);
        return view("product.addproduct",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $requestdata=$request->all();
        $modeldata=Product::findOrFail($id);
        $modeldata->category_id=$requestdata["category"];
        $modeldata->title=$requestdata["name"];
        $modeldata->description=$requestdata["description"];
        $modeldata->cost_prize=$requestdata["costprize"];
        $modeldata->prize=$requestdata["saleprize"];
        $modeldata->save();
        return redirect()->to("product")->with("updateproduct","product updated successfully.");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->to("product")->with("deleteproduct","product deleted successfully");
    }
}
