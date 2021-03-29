<?php

declare(strict_types=1);

use function PHPUnit\Framework\assertEquals;
use Controller\EmployeeController;
use Model\Employee;
use PHPUnit\Framework\TestCase;
use Repository\EmployeeRepository;

class EmployeeContollerTest extends TestCase
{
    public function testGetAll()
    {
        $stub = $this->createStub(EmployeeRepository::class);
        $stub->method('getAllJsonWithMetaInformation')->willReturn(array(new Employee('1', 'Jonas'), new Employee('2', 'Petras'), ['count'=>'2']));

        // given
        $employeeController = new EmployeeController($stub);
        // when
        $res = $employeeController->getAllJson();
        // then
        assertEquals('[{"id":"1","name":"Jonas"},{"id":"2","name":"Petras"},{"count":"2"}]', $res);
    }
}
