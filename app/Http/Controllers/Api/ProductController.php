<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
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
        return ProductResource::collection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
       
        $data=[];
        if($request->hasfile('images'))
        {

           foreach($request->file('images') as $image)
           {
               $name=$image->getClientOriginalName();
               $image->move(public_path().'/images/', $name);  
               $data[] = $name;  
           }
        }

        $product = Product::create([
            'title'=>$request->title,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'description'=>$request->description,
            'images'=>json_encode($data)
        ]);

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $images = json_decode($product->images);
        foreach ($images as $image) {
            $this->deleteFileFromServer($image);
        }

        $product->update($request->validated());

        return new ProductResource($product);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $images = json_decode($product->images);
        foreach ($images as $image) {
            $this->deleteFileFromServer($image);
        }
        $product->delete();

        return response()->noContent();
    }

    public function deleteFileFromServer($fileName)
    {
        unlink($fileName);
    }
}
