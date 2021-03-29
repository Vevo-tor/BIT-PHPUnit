<?php

namespace Controller;

use Repository\EmployeeRepository;

class EmployeeController
{
    private $employeeRepository;
    public function __construct(EmployeeRepository $er)
    {
        $this->employeeRepository = $er;
    }

    public function getAllById()
    {
    }
    public function getAllJson(): string
    {
        $json = json_encode($this->employeeRepository->getAllJsonWithMetaInformation());
        return $json;
    }
    public function getAll()
    {
    }
}
