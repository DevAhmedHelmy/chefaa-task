<?php

namespace App\Http\Controllers\Api;


use App\Services\PharmacyService;
use App\Http\Controllers\Controller;
use App\Http\Requests\PharmacyRequest;
use App\Http\Resources\PharmacyResource;

class PharmacyController extends Controller
{
    protected $pharmacyService;

    public function __construct(PharmacyService $pharmacyService)
    {
        $this->pharmacyService = $pharmacyService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PharmacyResource::collection($this->pharmacyService->getAll());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PharmacyRequest $request)
    {
        $this->pharmacyService->create($request);
        return response()->json(['success' => 'Pharmacy created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PharmacyResource($this->pharmacyService->getById($id));

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(PharmacyRequest $request, $id)
    {
        $this->pharmacyService->update($id,$request);
        return response()->json(['success' => 'Pharmacy updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->pharmacyService->delete($id);
        return response()->json(['success' => 'Pharmacy deleted successfully']);
    }
}
