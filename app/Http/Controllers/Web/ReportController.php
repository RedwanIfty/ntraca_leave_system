<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ApplicationStatus;
use App\Models\Employee;
use Illuminate\Http\Request;

use App\Models\Application;
//use App\Models\Employee;
use App\Models\User;

use Yajra\DataTables\DataTables;
use Rakibhstu\Banglanumber\NumberToBangla;
use Rajurayhan\Bndatetime\BnDateTimeConverter;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
//
//        $applications =Application::select("*")
//            ->leftJoin('employees','employees.id','applications.employee_id')
//            ->leftJoin('designations','employees.designation','designations.designation_id')
////            ->where('applications.id',null)
//            ->get();
//
//        return $applications;

        $status=ApplicationStatus::get();
        $emp=Employee::select('id','first_name')->get();

        return view('report.advanceReport',compact('emp','status'));
    }

    public function data(Request $r){
        $numto = new NumberToBangla();
        $dateConverter  =  new  BnDateTimeConverter();
        $applications =Application::select("applications.*","designations.designation_name","employees.first_name",
            "application_status.status_name","sent_to.first_name as approvePerson")
            ->leftJoin('application_status','application_status.id','applications.status')
            ->leftJoin('employees','employees.id','applications.employee_id')
            ->join('employees as sent_to', 'sent_to.id', '=', 'applications.approval_id')
            ->leftJoin('designations','employees.designation','designations.designation_id')
            ->orderBy("applications.created_at","desc");
        if($r->empName){
            $applications=$applications->where('employee_id',$r->empName);
        }

        if($r->start_dt){ $applications=$applications->where('start','>=',$r->start_dt);}
        if($r->end_dt){ $applications=$applications->where('end','<=',$r->end_dt);}
        if($r->status){ $applications=$applications->where('status',$r->status);}

//        $applications=$applications->get();
        $datatables = Datatables::of($applications)
            ->addColumn('total_days_bangla',function ($data) use ($numto){
                return $numto->bnNum($data->applied_total_days);
            })
            ->addColumn('start',function ($data) use ($dateConverter){
                return  $dateConverter->getConvertedDateTime($data->start_date,  'BnEn', 'l jS F Y');
            })->addColumn('end',function ($data) use ($dateConverter){
                return  $dateConverter->getConvertedDateTime($data->end_date,  'BnEn', 'l jS F Y');
            })->addColumn('created_at',function ($data) use ($dateConverter){
                return  $dateConverter->getConvertedDateTime($data->created_at,  'BnEn', 'l jS F Y');
            });
        return $datatables->make(true);

    }
}
