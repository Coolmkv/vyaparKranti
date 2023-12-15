<?php 

namespace App\Repositories;

use App\Http\Requests\TestimonialRequest;
use App\Models\TestimonialsModel;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Support\Carbon;

class SaveTestimonials{

    use ResponseAPI;
    use CommonFunctions;

    public function saveTestimonial(TestimonialRequest $request){
        try{
            $maxId = TestimonialsModel::max(TestimonialsModel::ID);
            $testimonial = new TestimonialsModel();
            $testimonial->{TestimonialsModel::CLIENT_NAME} = $request->input("name");
            $testimonial->{TestimonialsModel::CLIENT_EMAIL} = $request->input("email");
            $testimonial->{TestimonialsModel::CLIENT_PROFESSION} = $request->input("profession");
            if($request->input("visit_date")){
                $testimonial->{TestimonialsModel::VISIT_DATE} = $request->date("visit_date");
            }
            
            $testimonial->{TestimonialsModel::REVIEW_TEXT} = $request->input("details");
            $testimonial->{TestimonialsModel::STATUS} = 1;
            $testimonial->{TestimonialsModel::APPROVAL_STATUS} = TestimonialsModel::UNDER_REVIEW;
            $testimonial->{TestimonialsModel::ITEM_PRIORITY} = $maxId+1;
            if(!empty($request->file('image'))){
                $image = $this->uploadLocalFile($request,"image","/website/uploads/Testimonials/");
                if($image["status"]){
                    $testimonial->{TestimonialsModel::CLIENT_IMAGE} = $image["data"];
                }else{
                    return $this->error($image["message"],200);
                }
            }

            $testimonial->save();
            $return = ["status"=>true,"message"=>"Saved and under review.","data"=>null];

        }catch(Exception $exception){
            $return = ["status" => false, "message" => "Exception occurred  : " . $exception->getMessage(), "data" => null];
        }
        return response()->json($return);
    }
}