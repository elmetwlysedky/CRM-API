<?php

namespace App\Crm\Customer\Repositories;

use App\Crm\Base\Repositories\AbstractRepository;
use App\Crm\Customer\Models\Customer;

class CustomerRepository extends AbstractRepository
{


    public function __construct(Customer $customer)
    {
        $this->setModel( $customer);
    }



}
