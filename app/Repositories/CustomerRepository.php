<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Interfaces\ICustomerRepository;

class CustomerRepository extends BaseRepository implements ICustomerRepository
{
    function __construct(Customer $customer)
    {
        parent::__construct($customer);
    }
}
