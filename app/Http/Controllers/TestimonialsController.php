<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialStatusRequest;
use App\Models\TestimonialsModel;
use App\Traits\CommonFunctions;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class TestimonialsController extends Controller
{
    use CommonFunctions;
    use ResponseAPI;
    public function testimonials()
    {
        return view("Dashboard.Pages.testimonials");
    }

    public function testimonialsData()
    {
        $data = TestimonialsModel::select(
            TestimonialsModel::ID,
            TestimonialsModel::CLIENT_NAME,
            TestimonialsModel::CLIENT_IMAGE,
            TestimonialsModel::CLIENT_EMAIL,
            TestimonialsModel::CLIENT_PROFESSION,
            TestimonialsModel::APPROVAL_STATUS,
            TestimonialsModel::ITEM_PRIORITY,
            TestimonialsModel::STATUS,
            TestimonialsModel::REVIEW_TEXT,
            TestimonialsModel::VISIT_DATE
        );

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $options = ["under_review", "approved", "discarded"];
                $setOptions = "";
                foreach ($options as $item) {
                    if ($item == $row->{TestimonialsModel::APPROVAL_STATUS}) {
                        $setOptions .= '<option val="' . $item . '" selected>' . $item . '</option>';
                    } else {
                        $setOptions .= '<option val="' . $item . '" >' . $item . '</option>';
                    }
                }
                return '<select name="changeApprovalStatus" id="approval' . $row->{TestimonialsModel::ID} . '" onchange="approvalStatusChange(' . $row->{TestimonialsModel::ID} . ')">' . $setOptions . '</select>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    /**
     * changeApproval
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function changeApproval(TestimonialStatusRequest $request): JsonResponse
    {
        $check = TestimonialsModel::where([
            [TestimonialsModel::ID, $request->input(TestimonialsModel::ID)],
            [TestimonialsModel::STATUS, 1]
        ])->first();
        if ($check) {
            $check->{TestimonialsModel::APPROVAL_STATUS} = $request->input("option");
            $check->{TestimonialsModel::UPDATED_BY} = Auth::id();
            $check->save();
            $this->forgetTestimonials();
            $return = $this->success("Status updated.", []);
        } else {
            $return = $this->error("Details not found", 200);
        }
        return $return;
    }
}

