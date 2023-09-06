<?php

namespace App\Repositories\Interfaces;

interface ApplicationRepositoryInterface
{
    public function getAllApplication();
    public function showCreateApplicationPage();
    public function getApplicationById($applicationId);
    public function createApplication($request);
    public function createContact($request);
    public function createNewApplication($request);
    // public function updateTask($taskId, $newDetails);
    public function deleteApplication($applicationId);
   
}