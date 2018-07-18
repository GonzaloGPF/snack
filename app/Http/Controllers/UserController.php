<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;

class UserController extends Controller
{
    protected $modelName = 'user';

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user()
    {
        return $this->showResponse(new UserResource(auth()->user()));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->indexResponse(UserResource::collection(User::all()));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::find($id);
        return $this->showResponse(new UserResource($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update($id)
    {
        $user = User::find($id);

        $this->authorize('update', $user);

        $user->update(request()->all());

        return $this->updateResponse(new UserResource($user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $this->authorize('delete', $user);

        try {
            $user->delete();
        } catch (\Exception $e) {
            return $this->sendData(Response::HTTP_UNPROCESSABLE_ENTITY, trans('session.delete_error'));
        }

        return $this->destroyResponse(new UserResource($user));
    }
}
