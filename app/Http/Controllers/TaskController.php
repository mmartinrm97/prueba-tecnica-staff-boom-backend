<?php

namespace App\Http\Controllers;

use App\Http\Resources\BaseResource;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return BaseResource::collection(Task::paginate())
            ->response()
            ->setStatusCode(Response::HTTP_OK);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request): JsonResponse
    {
        $data = $request->validated() + ['user_id' => 1];
        $post = Task::create($data);

        return BaseResource::make($post)
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): JsonResponse
    {
        return BaseResource::make($task)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        return BaseResource::make(tap($task)->update($request->validated()))
            ->response()
            ->setStatusCode(Response::HTTP_OK);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): \Illuminate\Http\Response
    {
        $task->delete();

        return response()->noContent();
    }
}
