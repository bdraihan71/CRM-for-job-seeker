<?php

namespace App\Repositories\Interfaces;

interface CommunicationRepositoryInterface
{
    public function getAllCommunicationHistories();
    public function showCreateCommunicationHistoryPage();
    public function getApplicationById($applicationId);
    public function createApplication($request);
    public function generateSalary($salaryMin, $salaryMax);
    public function createContact($request);
    public function createNewApplication($request);
    public function updateOldApplication($request, $id);
    public function updateApplication($request, $id);
    public function updateContact($request, $id);
    // public function updateTask($taskId, $newDetails);
    public function deleteApplication($applicationId);
   
}