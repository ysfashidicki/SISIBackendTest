<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\distributor_products;
use Validator;
use App\Http\Resources\distributor_productsResource;
   
class distributor_productsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributor_products = distributor_products::all();
    
        return $this->sendResponse(distributor_productsResource::collection($distributor_products), 'Distributor Products retrieved successfully.');
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
   
        $validator = Validator::make($input, [
            'price' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $distributor_products = distributor_products::create($input);
   
        return $this->sendResponse(new distributor_productsResource($distributor_products), 'Distributor Products created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $distributor_products = distributor_products::find($id);
  
        if (is_null($distributor_products)) {
            return $this->sendError('Distributor Products not found.');
        }
   
        return $this->sendResponse(new distributor_productsResource($distributor_products), 'Distributor Products retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, distributor_products $distributor_products)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'price' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $distributor_products->price = $input['price'];
        $product->save();
   
        return $this->sendResponse(new distributor_productsResource($distributor_products), 'Distributor Products updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(distributor_products $distributor_products)
    {
        $distributor_products->delete();
   
        return $this->sendResponse([], 'Distributor Products deleted successfully.');
    }
}