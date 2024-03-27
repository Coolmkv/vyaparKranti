<?php

namespace App\Http\Controllers;

use App\Models\ContactUsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ContactUsController extends Controller
{
    public function manageContactUs(){
        return view("Dashboard.Pages.manageContactUs");
    }

    public function ContactUsData(){
        

        $query = ContactUsModel::select(
            ContactUsModel::NAME,
            ContactUsModel::EMAIL_ID,
            ContactUsModel::CONTACT_NUMBER,
            ContactUsModel::MESSAGE,
            ContactUsModel::IP,
            ContactUsModel::ID,
            DB::raw("date_format(".ContactUsModel::CREATED_AT.", '%M %d %Y %r') as created_at_date")
        );
        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }
}
