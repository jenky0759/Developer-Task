<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Repositories\Interfaces\ICustomerRepository;

class CustomerController extends Controller
{

    function __construct(private readonly ICustomerRepository $customerRepository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function getList()
    {
        $response = $this->customerRepository->all(['category', 'contacts']);

        return response()->json(CustomerResource::collection($response));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $data = $request->validated();

        $response = $this->customerRepository->create($data);

        return response()->json(new CustomerResource($response));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return response()->json(new CustomerResource($this->customerRepository->getById($id, ['category', 'contacts'])));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id)
    {
        $data = $request->validated();

        $data['id'] = $id;

        $response = $this->customerRepository->update($id, $data);

        return response()->json(new CustomerResource($response));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->customerRepository->delete($id);

        return response()->json($response);
    }
}
