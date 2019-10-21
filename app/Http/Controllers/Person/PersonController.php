<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\DeletePersonRequest;
use App\Http\Requests\Person\ShowPersonRequest;
use App\Http\Requests\Person\StorePersonRequest;
use App\Http\Requests\Person\UpdatePersonRequest;
use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    private $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List All Persons with Pagination
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return successResponseWithData($this->repository->listAll());
    }

    /**
     * Create A new Person Node.
     *
     * @param StorePersonRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePersonRequest $request)
    {
        //
        $requestData = $request->all();
        return successResponseWithData($this->repository->create($requestData));
    }

    /**
     * Show Person
     *
     * @param ShowPersonRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowPersonRequest $request,$id)
    {
       return successResponseWithData($this->repository->find($id));
    }

    /**
     * Update Person Request
     *
     * @param UpdatePersonRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdatePersonRequest $request, $id)
    {
        //
        $requestData = $request->all();
        $requestData['id'] = $id;
        return successResponseWithData($this->repository->update($requestData));
    }

    /**
     * Delete Person Node
     *
     * @param DeletePersonRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeletePersonRequest $request,$id)
    {
        //
        $this->repository->delete($id);
        return successResponse("Deleted");
    }

    /**
     * Follow From Person Node to another
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function follow(Request $request)
    {
        $requestData = $request->all();
        $this->repository->follow($requestData);
        return successResponse("User Followed");
    }

    /**
     * UnFollow One Node To Another
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function unfollow(Request $request)
    {
        $requestData = $request->all();
        $this->repository->unfollow($requestData);
        return successResponse();
    }

    /**
     * Find The Shortest Path Algorithm
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function shortest_path(Request $request)
    {
        // TODO Shortpath Algorithm
    }
}
