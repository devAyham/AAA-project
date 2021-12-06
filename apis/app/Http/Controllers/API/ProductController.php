<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Product as ProductResource;
use App\Http\Controllers\API\BaseController  as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator ;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return $this->sendResponse( ProductResource::collection($products) , 'all products sent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
            'name' => 'required',
            'img' => 'required',
            'expiration_date' => 'required',
            'price'  => 'required',
            'quantity'  => 'required',
            'category'  => 'required',
            // 'new_price',
            // 'contact_informations' ,
            // 'views',
        ]);
        if ($validator->fails()){
            return $this->sendError('please validate error ' , $validator->errors());
    }
    $product = Product::create($input);
    return $this->sendResponse(new ProductResource($product) , 'product created successfully');

    }

    public function show($id)
    {
        $product = Product::find($id);
        if ( is_null($product)){
            return $this->sendError('product not found ');}

        return $this->sendResponse(new ProductResource($product) , 'product found successfully');
    }

    public function update(Request $request, Product $product)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
            'name' => 'required',
            'img' => 'required',
            'price'  => 'required',
            'quantity'  => 'required',
            'category'  => 'required',
            'contact_informations'  => 'required',
            // 'expiration_date' => 'required',
            // 'new_price',
            // 'views',4
        ]);
        if ($validator->fails()){
            return $this->sendError('please validate error ' , $validator->errors());
    }
    $product->name = $input['name'];
    $product->img = $input['img'];
    $product->price = $input['price'];
    $product->quantity = $input['quantity'];
    $product->category = $input['category'];
    return $this->sendResponse(new ProductResource($product) , 'product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return $this->sendResponse(new ProductResource($product) , 'product deleted successfully');

    }
}
