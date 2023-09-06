<?php

namespace App\Repositories;
use App\Repositories\Interfaces\ApplicationRepositoryInterface;


class ApplicationRepository implements ApplicationRepositoryInterface
{

public function getAllApplication()
    {
    //     try{
    //         $authUserId = auth()->user()->id;

    //         $results = Task::where(function ($query) use ($authUserId) {
    //             $query->where('created_for', $authUserId);
    //         })->orWhere(function ($query) use ($authUserId) {
    //             $query->whereNull('created_for')->where('created_by', $authUserId);   // If created_for is null, then check created_by to matches the auth user id
    //         })->get()
    //         ->map
    //         ->format();

    //         return $results;

    //     }catch(Exception $exception){
    //         Log::error("getAllTask error : " . json_encode($exception->getMessage()) ." User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
    //         throw new Exception($exception->getMessage());
    //     }
    }
    public function createNewApplication($request)
    {

    }
    public function getApplicationById($applicationId)
    {

    }
    public function deleteApplication($applicationId)
    {

    }
}