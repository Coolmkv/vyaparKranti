<?php

namespace App\Repositories;

use App\Http\Requests\NewsLetterSubscriptionRequest;
use App\Models\NewsLetter;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Support\Facades\Log;

class NewsLetterRepository{

    use ResponseAPI;

    public function subscribe(NewsLetterSubscriptionRequest $request){
        try{
            NewsLetter::insert(
                [
                    NewsLetter::EMAIL_ID=>$request->input('email'),
                    NewsLetter::SUBSCRIPTION_STATUS=>NewsLetter::SUBSCRIPTION_SUBSCRIBED,
                    NewsLetter::VERIFICATION_STATUS=>NewsLetter::VERIFICATION_NOT_DONE,
                    NewsLetter::STATUS=>1
                ]
            );
            $return = $this->success("Subscribed successfully Thank you!",[]);
        }catch(Exception $exception){
            Log::error("Error in subscribe:".$exception->getTraceAsString());
            $return = $this->error("Something went wrong. ".$exception->getMessage(),200);
        }
        return $return;

    }

}