<?php

namespace Csv\Employee;

use Csv\CsvReader;
use Csv\Factory\EmployeeFactory\EmployeeCreator;
use Csv\Employee\Validation\EmployeeValidator;
use Csv\Factory\ErrorFactory\ErrorCreator;

class EmployeeCsvReader
{
    private CsvReader $csvReader;
    private EmployeeValidator $employeeValidator;
    private EmployeeCreator $employeeCreator;
    private EmployeeHelper $employeeHelper;

    private array $employees;

    public function __construct(string $pathToCsvFile)
    {
        $this->csvReader = new CsvReader($pathToCsvFile);
        $this->employeeValidator = new EmployeeValidator(new ErrorCreator());
        $this->employeeHelper = new EmployeeHelper();
        $this->employeeCreator = new EmployeeCreator($this->employeeValidator, $this->employeeHelper);
        $this->employees = [];
    }

    public function readUniqueEmployees(): array
    {

        foreach ($this->csvReader->readContentRow() as $csvRow) {
            $employee = $this->employeeCreator->getEmployeeFromRow($csvRow);
            $this->employees[] = $employee;
        }

        return $this->employeeHelper->getUniqueEmployees($this->employees);
    }
}
