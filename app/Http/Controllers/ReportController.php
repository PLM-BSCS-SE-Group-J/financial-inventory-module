<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\allreports;
use App\Models\fixed_assets;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Redirect;

class ReportController extends Controller
{
    public function homePage()
    {
    $reports = allreports::all();

    return view('home', ['reports' => $reports]);
    } 

    public function generateReport(Request $request){

        $report = new allreports;
    
        $report->ReportTitle = $request->ReportTitle;
        $report->EmpFirstName = $request->EmpFirstName;
        $report->EmpLastName = $request->EmpLastName;
        $report->dateRequested = $request->dateRequested;
        $report->dateIssued = $request->dateIssued;
        $report->Remarks = $request->Remarks;
        $report->selectedAssets = $request->selectedAssets;
    
        $report->save();
    
        $fixedassets = fixed_assets::all();
        
        return view('genReport', [
            'report' => $report,
            'fixedassets' => $fixedassets
        ]);
    }

    public function viewReports()
    {
        $reports = allreports::all();
        $fixedassets = fixed_assets::all();
        return view('viewReport', compact('reports', 'fixed_assets'));

    }
    
    public function generatePDF($id)
    {
        $report = allreports::findOrFail($id);
        $pdf = PDF::loadView('reports.pdf', compact('report'));

        return $pdf->download('report_' . $report->id . '.pdf');
    }

    public function viewReport(Request $request)
    {
        // Retrieve reports data
        $sortBy = $request->query('sort_by');
        $sortColumn = 'ReportTitle';
    
        if ($sortBy === 'date_requested') {
            $sortColumn = 'dateRequested';
            $sortDirection = 'asc';
        } elseif ($sortBy === 'date_issued') {
            $sortColumn = 'dateIssued';
            $sortDirection = 'asc'; 
        }
    
        $reports = allreports::orderBy($sortColumn)->get();
    
        // Fetching only the AssetDesc column from fixed_assets table
        $fixedassets = fixed_assets::pluck('AssetDesc');
    
        // Pass the reports and fixed assets data to the view
        return view('viewReport', [
            'reports' => $reports,
            'fixedassets' => $fixedassets
        ]);
    }

    public function display(){
        $reports = allreports::all();
        return view('viewReport',compact('reports'));
   }

    public function show($ReportTitle)
    {
    $report = allreports::find($ReportTitle);
    return response()->json($report);
    }

    public function destroy($ReportTitle){
        
        $reports = allreports::find($ReportTitle);
        $reports->delete();
        return redirect()->route('viewReport')->with('success','Deleted Successfully!');
    }
}

