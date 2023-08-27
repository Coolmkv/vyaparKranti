<?php

namespace App\Repositories;

use App\Http\Requests\ContactUsFormRequest;
use App\Models\ContactUsModel;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Support\Facades\Log;

class ContactUsRepository{

    use ResponseAPI;

    public function submitContactUs(ContactUsFormRequest $request){
        try{

            $check = ContactUsModel::where([
                [ContactUsModel::EMAIL_ID,$request->input("emailId")],
                [ContactUsModel::CONTACT_NUMBER,$request->input("contact_number")],
                [ContactUsModel::NAME,$request->input("name")],
                [ContactUsModel::MESSAGE,$request->input("message")]
            ])->first();
            if(empty($check)){
                ContactUsModel::insert([
                    ContactUsModel::EMAIL_ID=>$request->input("emailId"),
                    ContactUsModel::CONTACT_NUMBER=>$request->input("contact_number"),
                    ContactUsModel::NAME=>$request->input("name"),
                    ContactUsModel::MESSAGE=>$request->input("message"),
                    ContactUsModel::IP=>$request->ip()
                ]);

            }
            return $this->success("Your message saved successfully. Thankyou !",[]);
        }catch(Exception $exception){
            Log::error($exception->getMessage(),$this->getExceptionData($exception));
            return $this->error("Something went wrong.",200);
        }
    }
}