<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Repositories\Interfaces\IContactRepository;

class ContactController extends Controller
{
    function __construct(private readonly IContactRepository $contactRepository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function getList()
    {
        $response = $this->contactRepository->all();

        return response()->json(ContactResource::collection($response));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $data = $request->validated();

        $response = $this->contactRepository->create($data);

        return response()->json(new ContactResource($response));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(new ContactResource($this->contactRepository->getById($id, ['contacts'])));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, string $id)
    {
        $data = $request->validated();

        $data['id'] = $id;

        $response = $this->contactRepository->update($id, $data);

        return response()->json(new ContactResource($response));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->contactRepository->delete($id);

        return response()->json($response);
    }
}
