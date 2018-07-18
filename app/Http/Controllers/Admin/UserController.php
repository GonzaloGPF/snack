<?php

namespace App\Http\Controllers\Admin;

use App\Filters\UsersFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UsersFilter $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(UsersFilter $filters)
    {
        $users = User::latest()
            ->filter($filters)
            ->order($filters)
            ->getOrPaginate();

        return $this->indexResponse(UserResource::collection($users));
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        $this->loadRelations(request(), $user);

        return $this->showResponse(new UserResource($user));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserCreateRequest $request)
    {
        $user = User::make($request->all());

        $user->password = config('custom.default_user_pass');
        $user->save();

        return $this->storeResponse(new UserResource($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @internal param int $id
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->all());

        return $this->updateResponse(new UserResource($user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $e) {
            return $this->dataResponse(Response::HTTP_UNPROCESSABLE_ENTITY, trans('verbs.delete_error'));
        }

        return $this->destroyResponse();
    }
}
