<?php

namespace App\Http\Controllers\Api;

use App\Crm\Customer\Models\Customer;
use App\Crm\Customer\Models\Note;
use App\Crm\Customer\Requests\NotesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotesController extends Controller
{

    public function index($customer_id)
    {
        $customer = Customer::find($customer_id);
        if (!$customer){
            return response()->json(['status'=>'not found',\Illuminate\Http\Response::HTTP_NOT_FOUND]);
        }else {
            $notes = Note::where('customer_id', $customer_id)->get();
            return response()->json([ $notes,'status'=>'success',\Illuminate\Http\Response::HTTP_ACCEPTED]);

        }
    }




    public function store(NotesRequest $request )
    {
        $data = $request->validated();
        Note::create($data);
        return response()->json([$data, 'status'=>'success',\Illuminate\Http\Response::HTTP_ACCEPTED]);
    }

    public function show($customer_id,$id)
    {
        $note = Note::find($id);
        if (! $note){
            return response()->json(['status'=>'not found',\Illuminate\Http\Response::HTTP_NOT_FOUND]);
        }
        if ($note->customer_id != $customer_id){
            return response()->json(['status'=>'not found customer',\Illuminate\Http\Response::HTTP_BAD_REQUEST]);
        }
        return response()->json([ $note,'status'=>'success',\Illuminate\Http\Response::HTTP_ACCEPTED]);

    }

    public function update(Request $request, $customer_id, $id)
    {
        $note = Note::find($id);
//        dd($customer_id,$id);
        if (!$note){
            return response()->json(['status'=>'not found',\Illuminate\Http\Response::HTTP_NOT_FOUND]);
        }
        if ($note->customer_id != $customer_id){
            return response()->json(['status'=>'not found customer',\Illuminate\Http\Response::HTTP_BAD_REQUEST]);
        }
//        $data = $request->validated();
        $note->notes = $request->notes;
        $note->update();
        return response()->json([ $note,'status'=>'success'],\Illuminate\Http\Response::HTTP_ACCEPTED);



    }


    public function destroy( $customer_id ,$id )
    {
        $note = Note::find($id);
        if (!$note){
            return response()->json(['status'=>'not found',\Illuminate\Http\Response::HTTP_NOT_FOUND]);
        }
        if ($note->customer_id != $customer_id){
            return response()->json(['status'=>'not found customer',\Illuminate\Http\Response::HTTP_BAD_REQUEST]);
        }
        $note->destroy($id);
        return response()->json(['status'=>'success',\Illuminate\Http\Response::HTTP_ACCEPTED]);

    }
}
