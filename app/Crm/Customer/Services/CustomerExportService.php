<?php

namespace App\Crm\Customer\Services;

use App\Crm\Customer\Exception\InvalidExportFormat;
use App\Crm\Customer\Repositories\CustomerRepository;
use App\Crm\Customer\Services\Export\ExportInterface;

class CustomerExportService
{

    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository){
        $this->customerRepository =$customerRepository;
    }


    public function export(ExportInterface $exporter){
        $customer = $this->customerRepository->all();
        $exporter->export($customer->toArray());


    }
}
