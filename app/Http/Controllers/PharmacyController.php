<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PharmacyService;
use App\Http\Requests\PharmacyRequest;

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
        return view('pharmacies.index', [
            'pharmacies' => $this->pharmacyService->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pharmacies.create', [
            'products' => $this->pharmacyService->getProducts(),
        ]);
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
        return redirect()->route('pharmacies.index')->with('success', 'Pharmacy created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pharmacy = $this->pharmacyService->getById($id);
        return view('pharmacies.show', [
            'pharmacy' => $pharmacy,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pharmacy = $this->pharmacyService->getById($id);
        return view('pharmacies.edit', [
            'pharmacy' => $pharmacy,
            'products' => $this->pharmacyService->getProducts(),
        ]);
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
        $this->pharmacyService->update($id, $request);
        return redirect()->route('pharmacies.index')->with('success', 'Pharmacy updated successfully');
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
        return redirect()->route('pharmacies.index')->with('success', 'Pharmacy deleted successfully');
    }

    public function search(Request $request)
    {
        $products = $this->pharmacyService->search($request);
        return response()->json(['data' => $products]);
    }
}
