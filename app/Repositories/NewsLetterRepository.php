<?php

namespace App\Repositories;

use App\Http\Requests\NewsLetterSubscriptionRequest;
use App\Models\NewsLetter;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class NewsLetterRepository
{

    use ResponseAPI;

    public function subscribe(NewsLetterSubscriptionRequest $request)
    {
        try {
            NewsLetter::insert(
                [
                    NewsLetter::EMAIL_ID => $request->input('email'),
                    NewsLetter::SUBSCRIPTION_STATUS => NewsLetter::SUBSCRIPTION_SUBSCRIBED,
                    NewsLetter::VERIFICATION_STATUS => NewsLetter::VERIFICATION_NOT_DONE,
                    NewsLetter::STATUS => 1
                ]
            );
            $return = $this->success("Subscribed successfully Thank you!", []);
        } catch (Exception $exception) {
            Log::error("Error in subscribe:" . $exception->getTraceAsString());
            $return = $this->error("Something went wrong. " . $exception->getMessage(), 200);
        }
        return $return;
    }

    public function viewNewsLetterSubscribers()
    {
        return view("Dashboard.Pages.newsLetterSubscribers");
    }
    public function viewNewsLetterItemsDataTable()
    {

        return DataTables::of(NewsLetter::select(
            NewsLetter::STATUS,
            NewsLetter::ID,
            NewsLetter::EMAIL_ID,
            NewsLetter::SUBSCRIPTION_STATUS,
            NewsLetter::VERIFICATION_STATUS
        ))
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '';
                if ($row->{NewsLetter::STATUS} == 1) {
                    //$btn .= '<a href="javascript:void(0)" onclick="deleteItem(\'' . $row->{NewsLetter::ID} . '\')" class="edit btn btn-danger btn-sm">Disable</a>';
                } else {
                    //$btn .= '<a href="javascript:void(0)" onclick="enableItem(\'' . $row->{NewsLetter::ID} . '\')" class="edit btn btn-info btn-sm">Enable</a>';
                }
                return $btn;
            })->rawColumns(['action'])
            ->make(true);
    }
}
