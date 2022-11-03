<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Rajurayhan\Bndatetime\BnDateTimeConverter;
use Rakibhstu\Banglanumber\NumberToBangla;
use Yajra\DataTables\DataTables;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ApplicationForm(){
        $superadmin=User::whereIn('role',[1,2])->get();
        return view('application.form',compact('superadmin'));
    }

    public function WeekDayCount(Request $r){

//        return Carbon::parse($r->endDt)->endOfDay();
        $numto = new NumberToBangla();
        $dateConverter  =  new  BnDateTimeConverter();
        Carbon::setWeekendDays([
            Carbon::FRIDAY,
            Carbon::SATURDAY,
        ]);


        try{
            $Sdate = Carbon::parse($r->startDt)->startOfDay();
            $edate = Carbon::parse($r->endDt)->endOfDay();
            $days = $Sdate->diffInWeekdays($edate);
            $bnStartDt=$dateConverter->getConvertedDateTime($Sdate,  'BnEn', 'l jS F Y');
            $bnEndDt=$dateConverter->getConvertedDateTime($r->endDt,  'BnEn', 'l jS F Y');
        }
        catch (\Exception $e){
            $bnStartDt=$dateConverter->getConvertedDateTime($Sdate,  'BnEn', 'l jS F Y');
            $bnEndDt='';
            $days=1;
        }

        $data=['days' => $numto->bnNum($days),
            'startDt'=>$bnStartDt,
            'endDt'=>$bnEndDt
        ];

        return $data;

    }

    public function ApplicationStore(Request $request)
    {
        $emp=Employee::where('user_id',auth()->user()->id)->first();
//        return $emp;
        Carbon::setWeekendDays([
            Carbon::FRIDAY,
            Carbon::SATURDAY,
        ]);

        $Sdate = Carbon::parse($request->start)->startOfDay();
        $edate = Carbon::parse($request->end)->endOfDay();
        $days = $Sdate->diffInWeekdays($edate);
        $total_days = $days + 1;
//        $total_days = $days;

        $leave = Application::where('employee_id', $emp->employee_id)
            ->where('start_date', $request->start)
            ->where('end_date', $request->end)->first();

        if ($total_days > 10) {
            $request->session()->flash('application', 'সর্বোচ্চ ১০ দিন ছুটি নিতে পারবেন ');
            return back();
        }
        if ($leave != null) {
            $request->session()->flash('application', 'উক্ত তারিখে ছুটির আবেদন পূর্বে গৃহীত করা রয়েছে! ');
            return back();
        } else {
            $application = new Application;

//            $application->name = $request->name;
//            $application->department = $request->department;
            $application->approval_id = $request->admin_id;
            $application->employee_id = $emp->id;
            $application->reason = $request->reason;
            $application->stay_location = $request->stay;
            $application->start_date = $request->start;
            $application->end_date = $request->end;
            $application->applied_total_days = $total_days;
            $application->approved_total_days = 0;
            $application->status = 1;
            $application->save();

//            $applications = Application::all();
//            $email = User::where('id', $request->admin_id)->get()->first();
//            // dd($email);
//            $email = $email->email;
//            $details = [
//                'title' => 'নৈমিত্তিক ছুটি ব্যবস্থাপনা',
//                'body' => $request->name . 'ছুটির  জন্য আবেদন করেছে'
//            ];
//            Mail::to($email)->send(new \App\Mail\MyTestMail($details));
//            return redirect('/oparetor');

            $request->session()->flash('application', 'ছুটির আবেদন করা রয়েছে! ');
            return back();
        }

    }

    public function applicationModifyApprove($id){
        $emp=Employee::select('id','first_name')->where('user_id',auth()->user()->id)->first();
        $applications=Application::select("applications.*","employees.first_name","designations.designation_name")
            ->where('approval_id',$emp->id)
            ->leftJoin('employees','employees.id','applications.employee_id')
            ->leftJoin('designations','employees.designation','designations.designation_id')
            ->find($id);

        return view('application.applicationModifyApprove',compact('applications'));
    }


    public function applicationModifyApproveStore($id,Request $r){
        $emp=Employee::select('id','first_name')->where('user_id',auth()->user()->id)->first();
        $application=Application::where('approval_id',$emp->id)->find($id);

        $Sdate = Carbon::parse($r->approved_start_date)->startOfDay();
        $edate = Carbon::parse($r->approved_end_date)->endOfDay();
        $days = $Sdate->diffInWeekdays($edate);
        $application->approved_total_days= $days+1;
        $application->approved_start_date= $r->approved_start_date;
        $application->approved_end_date= $r->approved_end_date;
        $application->comment= $r->comment;
        $application->status= 2;
        $application->save();

        $empuser = User::where('id', $application->employee_id)->get()->first();

        $email = $empuser->email;
//        $phone = User::where('id', $applications)->get()->first();
        $phone = $empuser->phone_number;

//        $this->sendsms($phone);
//        $details = [
//            'title' => 'নৈমিত্তিক ছুটি ব্যবস্থাপনা',
//            'body' => 'আপনার ছুটির আবেদন অনুমোদিত হয়েছে'
//        ];
//        Mail::to($email)->send(new \App\Mail\MyTestMail($details));

        // $number=01712345678;
        // $message='this is a demo Example form Laravel bulksmsBD Package.';
        // BulkSMSBD::send($number,$message);

        return redirect()->route('pending.application');
//        return back();


//        return $r;
    }

    public function PendingApplication()
    {
        $emp=Employee::select('id','first_name')->where('user_id',auth()->user()->id)->first();

        $applications =Application::select("applications.*","employees.first_name","designations.designation_name")
            ->leftJoin('application_status','application_status.id','applications.status')
            ->leftJoin('employees','employees.id','applications.employee_id')
            ->leftJoin('designations','employees.designation','designations.designation_id')
            ->where('applications.approval_id',$emp->id)
            ->where('applications.status',1)
            ->get();


        $year=\Carbon\Carbon::now();
        $now=$year->year;


        $totalApprovedLeave=Application::select('employee_id','approved_total_days')
//            ->where('approval_id',$emp->id)
            ->where('status',2)
            ->whereYear('end_date',$now)->get();
//        return  $totalApprovedLeave;



        return view('application.applicationPending', compact('applications','totalApprovedLeave'));
    }

    public function applicationApprove($id){
        $emp=Employee::select('id','first_name')->where('user_id',auth()->user()->id)->first();
        $application=Application::where('approval_id',$emp->id)->find($id);

        $application->approved_total_days= $application->applied_total_days;
        $application->approved_start_date= $application->start_date;
        $application->approved_end_date= $application->end_date;
        $application->status= 2;
        $application->save();






        $empuser = User::where('id', $application->employee_id)->get()->first();

        $email = $empuser->email;
//        $phone = User::where('id', $applications)->get()->first();
        $phone = $empuser->phone_number;

//        $this->sendsms($phone);
//        $details = [
//            'title' => 'নৈমিত্তিক ছুটি ব্যবস্থাপনা',
//            'body' => 'আপনার ছুটির আবেদন অনুমোদিত হয়েছে'
//        ];
//        Mail::to($email)->send(new \App\Mail\MyTestMail($details));

        // $number=01712345678;
        // $message='this is a demo Example form Laravel bulksmsBD Package.';
        // BulkSMSBD::send($number,$message);

//        return redirect()->route('pending.application');
        return back();

    }

    public function rejectApplication($id){
        $emp=Employee::select('id','first_name')->where('user_id',auth()->user()->id)->first();
        $applications=Application::select("applications.*","employees.first_name","designations.designation_name")
            ->where('approval_id',$emp->id)
            ->leftJoin('employees','employees.id','applications.employee_id')
            ->leftJoin('designations','employees.designation','designations.designation_id')
            ->find($id);


        return view('application.rejectApplication')->with('applications', $applications);

    }

    public function rejectApplicationStore($id,Request $r){
        $emp=Employee::select('id','first_name')->where('user_id',auth()->user()->id)->first();
        $application=Application::where('approval_id',$emp->id)->find($id);
        $application->approved_total_days= 0;
        $application->status= 3;
        $application->comment= $r->comment;
        $application->save();

        $empuser = User::where('id', $application->employee_id)->get()->first();

        $email = $empuser->email;
//        $phone = User::where('id', $applications)->get()->first();
        $phone = $empuser->phone_number;

//        $this->sendsms($phone);
//        $details = [
//            'title' => 'নৈমিত্তিক ছুটি ব্যবস্থাপনা',
//            'body' => 'আপনার ছুটির আবেদন প্রত্যাখ্যান করা হয়েছে'
//        ];
//        Mail::to($email)->send(new \App\Mail\MyTestMail($details));

        // $number=01712345678;
        // $message='this is a demo Example form Laravel bulksmsBD Package.';
        // BulkSMSBD::send($number,$message);

        return redirect()->route('pending.application');
        return $r;
    }

    public function sendsms($phone)
    {

        $queries = ['To' => "88$phone", 'Message' => "আপনার ছুটির আবেদন অনুমোদিত হয়েছে", "From" => "ICTDivision", "Password" => "Ictd#2015", 'Username' => 'ictdivision'];
        //    ['To'=>$this->contactsString,'Message'=>$this->message,'Username'=>$this->username,'Password'=>$this->password,'From'=>$this->sender];
        //    $client = new Client();
        //    $response = $client->request('GET',$this->fullApiUrl,['query'=>$queries]);
        $response = Http::withHeaders(
            [
                'CONTENT-TYPE' => "application/x-www-form-urlencoded"
            ])
            ->get($this->fullApiUrl, $queries);
        // dd($response);
        $this->apiResponse = ['statusCode' => $response->getStatusCode(), 'reasonPhrase' => $response->getReasonPhrase(), 'serverResponse' => $response->getBody()->getContents()];


    }
    public function WaitingApplicationList(){
        $status=ApplicationStatus::get();
        $emp=Employee::select('id','first_name')->get();


        return view('application.waiting',compact('emp','status'));
    }

    public function waitingData(Request $r){
        $emp=Employee::select('id','first_name')->where('user_id',auth()->user()->id)->first();
        $numto = new NumberToBangla();
        $dateConverter  =  new  BnDateTimeConverter();
        $applications =Application::select("*")
            ->leftJoin('application_status','application_status.id','applications.status')
            ->leftJoin('employees','employees.id','applications.employee_id')
            ->leftJoin('designations','employees.designation','designations.designation_id')
            ->where('applications.approval_id',$emp->id);
        if($r->empName){
            $applications=$applications->where('employee_id',$r->empName);
        }

        if($r->start_dt){ $applications=$applications->where('start','>=',$r->start_dt);}
        if($r->end_dt){ $applications=$applications->where('end','<=',$r->end_dt);}
        if($r->status){ $applications=$applications->where('status',$r->status);}

        $applications=$applications->get();
        $datatables = Datatables::of($applications)
            ->addColumn('total_days_bangla',function ($data) use ($numto){
                return $numto->bnNum($data->applied_total_days);
            })
            ->addColumn('start',function ($data) use ($dateConverter){
                return  $dateConverter->getConvertedDateTime($data->start_date,  'BnEn', 'l jS F Y');
            })->addColumn('end',function ($data) use ($dateConverter){
                return  $dateConverter->getConvertedDateTime($data->end_date,  'BnEn', 'l jS F Y');
            });
        return $datatables->make(true);

    }
    public function OwnApplicationList()
    {
        $status=ApplicationStatus::get();
        $emp=Employee::select('id','first_name')->where('user_id',auth()->user()->id)->get();


        return view('application.applicationlist',compact('emp','status'));
    }

    public function data(Request $r){
        $numto = new NumberToBangla();
        $dateConverter  =  new  BnDateTimeConverter();
        $applications =Application::select("*")
            ->leftJoin('application_status','application_status.id','applications.status')
            ->leftJoin('employees','employees.id','applications.employee_id')
            ->leftJoin('designations','employees.designation','designations.designation_id');
        if($r->empName){
            $applications=$applications->where('employee_id',$r->empName);
        }

        if($r->start_dt){ $applications=$applications->where('start','>=',$r->start_dt);}
        if($r->end_dt){ $applications=$applications->where('end','<=',$r->end_dt);}
        if($r->status){ $applications=$applications->where('status',$r->status);}

        $applications=$applications->get();
        $datatables = Datatables::of($applications)
            ->addColumn('total_days_bangla',function ($data) use ($numto){
                return $numto->bnNum($data->applied_total_days);
            })
            ->addColumn('start',function ($data) use ($dateConverter){
                return  $dateConverter->getConvertedDateTime($data->start_date,  'BnEn', 'l jS F Y');
            })->addColumn('end',function ($data) use ($dateConverter){
                return  $dateConverter->getConvertedDateTime($data->end_date,  'BnEn', 'l jS F Y');
            });
        return $datatables->make(true);

    }

    public function applicationPrint(){
//        $application=Application::where('id',277)->first();
        $application =Application::select("applications.*","employees.first_name","designations.designation_name")
            ->leftJoin('application_status','application_status.id','applications.status')
            ->leftJoin('employees','employees.id','applications.employee_id')
            ->leftJoin('designations','employees.designation','designations.designation_id')
//            ->leftJoin('designations','employees.designation','designations.designation_id')
//            ->where('applications.approval_id',$emp->id)
            ->where('applications.id',277)
            ->first();

        $totalApprovedLeave=Application::select('employee_id','approved_total_days')
            ->where('status',2)
            ->where('employee_id',$application->employee_id)
            ->whereYear('end_date',Carbon::now())
            ->sum('approved_total_days');

//        return $totalApprovedLeave;
        return view('application.print',compact('application','totalApprovedLeave'));
    }

}
