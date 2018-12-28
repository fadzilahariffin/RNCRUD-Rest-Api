<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProductController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); 
        $product = Product::all();

        return response()->json(['success' => true, 'data' => $product], $this->successStatus); 
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
        $user = auth('api')->user();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()], 401);
        }

        $product = Product::create([

            'user_id' => Auth::user()->id,
            'title' => request('title'),
            'price' => request('price'),
            'quantity' => request('quantity'),
            'description' => request('description')
        ]);

        $success['status'] = 'Successfull';

        return response()->json(['success' => true, 'data' => $product], $this->successStatus);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
