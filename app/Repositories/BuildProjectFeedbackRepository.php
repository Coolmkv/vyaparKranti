<?php

namespace App\Repositories;

use App\Http\Requests\BuildProjectFeedbacksRequest;
use App\Models\BuildProjectFeedbacks;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class BuildProjectFeedbackRepository
{

    use CommonFunctions;
    use ResponseAPI;
    public function submitFeedBackRequest(BuildProjectFeedbacksRequest $request)
    {
        try {            
            $new = new BuildProjectFeedbacks();
            $new->{BuildProjectFeedbacks::EMAIL} = $request->input("email");
            $new->{BuildProjectFeedbacks::COMPANY} = $request->input("company");
            $new->{BuildProjectFeedbacks::PHONE_NUMBER} = $request->input("phone_number");
            $new->{BuildProjectFeedbacks::NAME} = $request->input("name");
            $new->{BuildProjectFeedbacks::DESCRIPTION} = $request->input("description");
            $new->{BuildProjectFeedbacks::IP} = $this->getIp();
            $new->{BuildProjectFeedbacks::USER_AGENT} = $request->userAgent();
            $new->{BuildProjectFeedbacks::SELECTED_OPTIONS} = json_encode($request->input("selected_options"));
            
            $new->save();
            return $this->success("Your feedbacked saved. We will contact you shortly. Thankyou !", []);
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), $this->getExceptionData($exception));
            return $this->error("Something went wrong." . $exception->getMessage(), 200);
        }
    }

    public function getAQuoteAllData()
    {
        return DataTables::of(
            BuildProjectFeedbacks::where(BuildProjectFeedbacks::STATUS, 1)
            ->select(BuildProjectFeedbacks::ID,
            BuildProjectFeedbacks::NAME,
            BuildProjectFeedbacks::EMAIL,
            BuildProjectFeedbacks::COMPANY,
            BuildProjectFeedbacks::PHONE_NUMBER,
            BuildProjectFeedbacks::DESCRIPTION,
            BuildProjectFeedbacks::SELECTED_OPTIONS,
            BuildProjectFeedbacks::IP,
            BuildProjectFeedbacks::USER_AGENT,
            DB::raw('DATE_FORMAT('.BuildProjectFeedbacks::CREATED_AT.', "%W %M %e %Y") as created_at_format'))
        )->addIndexColumn()
        ->addColumn('options',function($row){
            $options = "";
            if($row->{BuildProjectFeedbacks::SELECTED_OPTIONS}){
                $row = json_decode($row->{BuildProjectFeedbacks::SELECTED_OPTIONS},true);
                foreach($row as $category=>$items){
                    $options .= '<div class="border p3 row col-12 w-px-250">';
                    $category = ucwords(str_replace("_"," ",trim($category,"'")));
                    $options .= "<h5><strong>$category</strong></h5><br>";
                    if(is_array($items)){
                        $options .= "<span>".implode(",<br> ",$items)."</span>";
                    }else{
                        $options .= "<span>".$items."</span>";
                    }
                    $options .= '</div>';
                }
            }
            return $options;
        })
        ->rawColumns(['options']) ->make(true);
    }
}
