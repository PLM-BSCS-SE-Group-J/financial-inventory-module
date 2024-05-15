<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\allreports;
use Barryvdh\DomPDF\Facade\PDF;

class ReportController extends Controller
{
    public function generateReport(Request $request){

        $reports = new allreports;

        $reports->ReportTitle=$request->ReportTitle;
        $reports->EmpFirstName=$request->EmpFirstName;
        $reports->EmpLastName=$request->EmpLastName;
        $reports->dateRequested=$request->dateRequested;
        $reports->dateIssued=$request->dateIssued;
        $reports->Remarks=$request->Remarks;

        $reports->save();
        
        return redirect()->route('genReport')->with('success','Added Successfully!');
    }

    public function viewReports()
    {
        // Retrieve all reports from the database
        $reports = allreports::all();

        // Pass the reports to the view for display
        return view('viewReport', compact('reports'));

    }
    
    public function generatePDF($id)
    {
        $report = allreports::findOrFail($id);
        $pdf = PDF::loadView('reports.pdf', compact('report'));

        return $pdf->download('report_' . $report->id . '.pdf');
    }

    public function viewReport(Request $request)
    {
       // Get the sorting parameter from the request
       $sortBy = $request->query('sort_by');
   
       // Default sorting column
       $sortColumn = 'ReportTitle';
   
       // Check if the sorting parameter is provided and valid
       if ($sortBy === 'date_requested') {
           $sortColumn = 'dateRequested';
           $sortDirection = 'asc';
       } elseif ($sortBy === 'date_issued') {
           $sortColumn = 'dateIssued';
           $sortDirection = 'asc'; 
       }
   
       // Fetch assets from the database and order them by the selected column
       $reports = allreports::orderBy($sortColumn)->get();
   
       // Return the view with the sorted assets
       return view('viewReport', ['reports' => $reports]);
    }

    public function display(){
        $reports = allreports::all();
        return view('viewReport',compact('reports'));
   }

//    public function deleteReports(Request $request) {
//     $reportTitles = $request->input('reportTitles');

//     try {
//         // Assuming ReportTitle is the primary key
//         allreports::table('allreports')->whereIn('ReportTitle', $reportTitles)->delete();
//         return response()->json(['success' => true]);
//     } catch (\Exception $e) {
//         return response()->json(['success' => false, 'message' => $e->getMessage()]);
//     }
//     }

    public function deleteReports($id){
        $reports = allreports::find($id);
        $reports->delete();
        return redirect()->route('viewReport')->with('success','Deleted Successfully!');
    }
}

