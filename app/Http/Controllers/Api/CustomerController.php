<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterCustomerRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function filter(FilterCustomerRequest $request)
    {
        $query = Customer::with('city.state');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('document')) {
            $query->where('document', $request->document);
        }

        if ($request->filled('birth_date')) {
            $query->whereDate('birth_date', $request->birth_date);
        }

        if ($request->filled('sex')) {
            $query->where('sex', $request->sex);
        }

        if ($request->filled('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        if ($request->filled('state_id')) {
            $query->whereHas('city.state', function ($q) use ($request) {
                $q->where('id', $request->state_id);
            });
        }

        return $query->paginate(5);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Customer::with('city.state')->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->validated());

        return response()->json($customer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return $customer->load('city.state');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        return response()->json($customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json(['message' => 'Cliente excluído com sucesso.'], 204);
    }
}
