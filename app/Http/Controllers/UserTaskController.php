<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\BaseResource;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class UserTaskController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user): JsonResponse
    {
        $tasks = QueryBuilder::for(Task::class)
            ->where('user_id', $user->id)
            ->allowedFields(['title', 'description', 'expiration_date', 'is_done', 'created_at', 'updated_at'])
            ->allowedIncludes(['user'])
            ->allowedFilters(['title', 'description', AllowedFilter::exact('is_done')])
            ->allowedSorts(['title', 'description', 'expiration_date', 'is_done', 'created_at', 'updated_at'])
            ->paginate();

        return BaseResource::collection($tasks)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request, User $user): JsonResponse
    {
        $task = $user->tasks()->create($request->validated());

        return BaseResource::make($task)
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user, Task $task)
    {
        return BaseResource::make($task)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, User $user, Task $task): JsonResponse
    {
        return BaseResource::make(tap($task)->update($request->validated()))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Task $task): JsonResponse
    {
        $task->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
