<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\distributors;
use Validator;
use App\Http\Resources\distributorsResource;

class DistributorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $distributors = distributors::all();
    
        return $this->sendResponse(distributorsResource::collection($distributors), 'Distributors retrieved successfully.');
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
            'code' => 'required',
            'name' => 'required',
            'address' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $distributors = distributors::create($input);
   
        return $this->sendResponse(new distributorsResource($distributors), 'Distributor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\distributors  $distributors
     * @return \Illuminate\Http\Response
     */
    public function show(distributors $id)
    {
        $distributors = distributors::find($id);
  
        if (is_null($distributors)) {
            return $this->sendError('Distributor not found.');
        }
   
        return $this->sendResponse(new distributorsResource($distributors), 'Distributor retrieved successfully.');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, distributors $distributors)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'code' => 'required',
            'name' => 'required',
            'address' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $distributors->code = $input['code'];
        $distributors->name = $input['name'];
        $distributors->address = $input['address'];
        $distributors->save();
   
        return $this->sendResponse(new distributorsResource($distributors), 'Distributor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(distributors $distributors)
    {
        $distributors->delete();
   
        return $this->sendResponse([], 'Distributor deleted successfully.');
    }
}
