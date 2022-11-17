<?php

namespace App\Http\Controllers\Api;

use App\Crm\Customer\Requests\CustomerRequest;
use App\Crm\Customer\Services\CustomerExportService;
use App\Crm\Customer\Services\CustomerService;
use App\Crm\Customer\Services\Export\ExportFactory;
use App\Crm\Customer\Services\Export\ExportInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    private CustomerService $customerService;
    private CustomerExportService $customerExportService;

    public function __construct( CustomerService $customerService, CustomerExportService $customerExportService)
    {
        $this->customerService = $customerService ;
        $this->customerExportService= $customerExportService;
    }


    public function index()
    {
        return $this->customerService-> index();
    }


    public function store(CustomerRequest $request)
    {
        return $this->customerService-> store($request);
    }


    public function show($id)
    {
        return $this->customerService-> show((int) $id);
    }



    public function update(CustomerRequest $request, $id)
    {
        return $this->customerService-> update($request,(int)$id);

    }


    public function destroy($id)
    {
        return $this->customerService-> destroy((int)$id);
    }


     public function export(Request $request){
         $format = $request->get('format','json');
        $exporter =ExportFactory::instance($format);
        return $this->customerExportService->export($exporter);
     }
}
