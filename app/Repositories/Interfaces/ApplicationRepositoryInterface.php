<?php

namespace App\Repositories\Interfaces;

interface ApplicationRepositoryInterface
{
    public function getAllApplication();
    public function createNewApplication($request);
    public function getApplicationById($applicationId);
    // public function updateTask($taskId, $newDetails);
    public function deleteApplication($applicationId);
   
}