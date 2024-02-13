<?php

namespace App\Repositories;

use App\Http\Requests\BuildProjectFeedbacksRequest;
use App\Models\BuildProjectFeedbacks;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Support\Facades\Log;

class BuildProjectFeedbackRepository{

    use CommonFunctions;
    use ResponseAPI;
    public function submitFeedBackRequest(BuildProjectFeedbacksRequest $request){        
        try{

            $check = BuildProjectFeedbacks::where([
                [BuildProjectFeedbacks::EMAIL,$request->input("email")],
                [BuildProjectFeedbacks::COMPANY,$request->input("company")],
                [BuildProjectFeedbacks::PHONE_NUMBER,$request->input("phone_number")],
                [BuildProjectFeedbacks::NAME,$request->input("name")],
                [BuildProjectFeedbacks::DESCRIPTION,$request->input("description")]
            ])->first();
            if(empty($check)){
                BuildProjectFeedbacks::insert([
                    BuildProjectFeedbacks::EMAIL=>$request->input("email"),
                    BuildProjectFeedbacks::COMPANY=>$request->input("company"),
                    BuildProjectFeedbacks::PHONE_NUMBER=>$request->input("phone_number"),
                    BuildProjectFeedbacks::NAME=>$request->input("name"),
                    BuildProjectFeedbacks::DESCRIPTION=>$request->input("description"),
                    BuildProjectFeedbacks::IP=>$this->getIp(),
                    BuildProjectFeedbacks::USER_AGENT=>$request->userAgent(),
                    BuildProjectFeedbacks::SELECTED_OPTIONS=>json_encode($request->input("selected_options"))
                ]);

            }
            return $this->success("Your feedbacked saved. We will contact you shortly. Thankyou !",[]);
        }catch(Exception $exception){
            Log::error($exception->getMessage(),$this->getExceptionData($exception));
            return $this->error("Something went wrong.".$exception->getMessage(),200);
        }

    }

}

?>