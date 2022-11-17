<?php

namespace App\Crm\Customer\Services;

use App\Crm\Customer\Events\CustomerCreation;
use App\Crm\Customer\Models\Customer;
use App\Crm\Customer\Repositories\CustomerRepository;
use App\Crm\Customer\Requests\CustomerRequest;


class CustomerService
{
    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository){
        $this->customerRepository =$customerRepository;
    }

    public function index()
    {
        return $this->customerRepository->all();

//        $customer = Customer::all();
//        if (! $customer){
//            return response()->json(['status'=>'not found',\Illuminate\Http\Response::HTTP_NOT_FOUND]);
//        }
//        return response()->json([ $customer,'status'=>'success',\Illuminate\Http\Response::HTTP_ACCEPTED]);
    }


    public function store( CustomerRequest $request)
    {
//        return $this->customerRepository->store($request);

        $data = $request->validated();
        $customer = Customer::create($data);

        event(new CustomerCreation($customer));

        return response()->json([ 'status'=>'success',\Illuminate\Http\Response::HTTP_ACCEPTED]);

    }


    public function show(int $id)
    {
        return $this->customerRepository->show($id);

//        $customer = Customer::find($id);
//        if (!$customer){
//            return response()->json(['status'=>'not found',\Illuminate\Http\Response::HTTP_NOT_FOUND]);
//        }
//        return response()->json([ $customer,'status'=>'success',\Illuminate\Http\Response::HTTP_ACCEPTED]);

    }



    public function update(CustomerRequest $request,$id)
    {
//        return $this->customerRepository->update($request);
        $customer = Customer::find($id);
        if (! $customer){
            return response()->json(['status'=>'not found'],\Illuminate\Http\Response::HTTP_NOT_FOUND);
        }
        $data = $request->validated();
        $customer->update($data);
        return response()->json([ $customer,'status'=>'success'],\Illuminate\Http\Response::HTTP_ACCEPTED);


    }


    public function destroy( int $id)
    {
        return $this->customerRepository->delete($id);
//        $customer = Customer::destroy($id);
//        if (! $customer){
//            return response()->json(['status'=>'not found'],\Illuminate\Http\Response::HTTP_NOT_FOUND);
//        }
//        return response()->json([ $customer,'status'=>'success'],\Illuminate\Http\Response::HTTP_ACCEPTED);

    }
}
