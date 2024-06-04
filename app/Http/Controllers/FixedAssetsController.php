<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\acc_class;
use App\Models\account;
use App\Models\delivered_asset;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

use function Laravel\Prompts\confirm;

class FixedAssetsController extends Controller
{
    public function show(Request $request): Response
    {

        $query = delivered_asset::query();
        $date = $request->date_filter;
        $status = $request->status_filter;
        $title = $request->title_filter;

        switch($date){
            case 'this_week':
                $query->whereBetween('d_date_of_delivery',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'this_month':
                $query->whereMonth('d_date_of_delivery',Carbon::now()->month);
                break;
            case 'this_year':
                $query->whereYear('d_date_of_delivery',Carbon::now()->year);
                break;
            case 'this_decade':
                $query->whereBetween('d_date_of_delivery',[Carbon::now()->startOfDecade(), Carbon::now()]);
                break;
            case 'all_dates':
                $query->whereBetween('d_date_of_delivery',[Carbon::now()->startOfCentury(), Carbon::now()]);
                break;
        }
        
        switch($status){
            case 'expired':
                $query->where('status','Like','%'.$status.'%');
                break;
            case 'active':
                $query->where('status','Like','%'.$status.'%');
                break;
            case 'show_all':
                $query->where('status','Like','%active%')->orWhere('status','Like','%expired%');
                break;
        }

        switch($title){
            case 'school_build':
                $query->where('d_category','Like','%School Buildings%');
                break;
            case 'other_struc':
                $query->where('d_category','Like','%Other Structures%');
                break;
            case 'office_equip':
                $query->where('d_category','Like','%Office Equipment%');
                break;
            case 'ict':
                $query->where('d_category','Like','%Information and Communication Technology%');
                break;
            case 'drre':
                $query->where('d_category','Like','%Disaster Response and Rescue Equipment%');
                break;
            case 'mpse':
                $query->where('d_category','Like','%Military, Police and Security Equipment%');
                break;
            case 'medical_equip':
                $query->where('d_category','Like','%Medical Equipment%');
                break;
            case 'sports_equip':
                $query->where('d_category','Like','%Sports Equipment%');
                break;
            case 'tech_equip':
                $query->where('d_category','Like','%Technical and Scientific Equipment%');
                break;
            case 'other_mac':
                $query->where('d_category','Like','%Other Machinery and Equipment%');
                break;
            case 'motor_vehicles':
                $query->where('d_category','Like','%Motor Vehicles%');
                break;
            case 'furni_fix':
                $query->where('d_category','Like','%Furniture and Fixtures%');
                break;
            case 'books':
                $query->where('d_category','Like','%Books%');
                break;
            case 'display_all':
                $query->where('d_category','Like','%i%')->orWhere('d_category','Like','%o%');
                break;
        }

        $fixedassets = $query->get();

        return response()->view('fixedAssets',compact('fixedassets'));
    }
    public function DataInsert(Request $request){

        $fixedassets = new delivered_asset;

        $today = Carbon::today()->format('Y-m-d');
        $current = Carbon::parse($today);
        $fixedassets->d_item_no=$request->d_item_no;
        $fixedassets->d_description=$request->d_description;
        $fixedassets->d_category=$request->d_category;
        $fixedassets->AccountClass=$request->AccountClass;
        $fixedassets->UseLife=$request->UseLife;
        $fixedassets->d_date_of_delivery=$request->d_date_of_delivery;
        $fixedassets->d_unit_cost=$request->d_unit_cost;
        
        $salvageVal = $fixedassets->d_unit_cost * 0.05;
        $fixedassets->YearlyDep= ($fixedassets->d_unit_cost - $salvageVal) / $fixedassets->UseLife;
        $fixedassets->MonthlyDep=$fixedassets->YearlyDep/12;
        $fixedassets->timestamps=false;
        $date = Carbon::createFromFormat('Y-m-d', $fixedassets->d_date_of_delivery);
        $acquired = Carbon::parse($fixedassets->d_date_of_delivery);
        if($date->addYears($fixedassets->UseLife)<$today){
            $fixedassets->status="Expired";
        }
        else{
            $fixedassets->status="Active";
        }

        if ($acquired->equalTo($current)) {
            $fixedassets->NetbookVal = $fixedassets->d_unit_cost;
        } else {
            $diffMonths = $acquired->diffInMonths($current);
            $fixedassets->AccuDep = $fixedassets->MonthlyDep * $diffMonths;
            $fixedassets->NetbookVal = $fixedassets->d_unit_cost - $fixedassets->AccuDep;
        }
        
        $fixedassets->save();
        
        return redirect()->route('fixedAssets')->with('success','Added Successfully!');
    }

    public function destroy($id){
        
        $fixedassets = delivered_asset::find($id);
        $fixedassets->delete();
        return redirect()->route('fixedAssets')->with('success','Deleted Successfully!');
    }

    public function edit($id)
    {
        $fixedassets = delivered_asset::find($id);
        $categoryData=account::all();
        $classData=acc_class::all();
        return view('editAssets', compact(['fixedassets','categoryData','classData']));
    }

    public function editAssets(Request $request, $id)
    {
        // Find the existing fixed asset record
        $fixedassets = delivered_asset::find($id);
    
        // Update the fixed asset fields from the request
        $fixedassets->d_item_no = $request->input('d_item_no');
        $fixedassets->d_description = $request->input('d_description');
        $fixedassets->d_category = $request->input('d_category');
        $fixedassets->AccountClass = $request->input('AccountClass');
        $fixedassets->UseLife = $request->input('UseLife');
        $fixedassets->d_date_of_delivery = $request->input('d_date_of_delivery');
        $fixedassets->d_unit_cost = $request->input('d_unit_cost');
        $fixedassets->PersonCharge = $request->input('PersonCharge');
        $fixedassets->dateRetired = $request->input('dateRetired');
        $fixedassets->d_supplier = $request->input('d_supplier');
        $fixedassets->d_pr_no = $request->input('d_pr_no');
        $fixedassets->d_po_no = $request->input('d_po_no');
        $fixedassets->d_invoice_no = $request->input('d_invoice_no');
        $fixedassets->d_date_invoice = $request->input('d_date_invoice');
        $fixedassets->d_place_of_delivery = $request->input('d_place_of_delivery');
        $fixedassets->timestamps = false;
    
        // Get today's date
        $today = Carbon::today()->format('Y-m-d');
        $current = Carbon::parse($today);
    
        // Recalculate depreciation values
        $salvageVal = $fixedassets->d_unit_cost * 0.05;
        $fixedassets->YearlyDep = ($fixedassets->d_unit_cost - $salvageVal) / $fixedassets->UseLife;
        $fixedassets->MonthlyDep = $fixedassets->YearlyDep / 12;
    
        // Parse the date acquired and determine status based on useful life
        $date = Carbon::createFromFormat('Y-m-d', $fixedassets->d_date_of_delivery);
        $acquired = Carbon::parse($fixedassets->d_date_of_delivery);
    
        // Check if the asset's useful life has expired
        if ($date->addYears($fixedassets->UseLife) < $today) {
            $fixedassets->status = "Expired";
        } else {
            $fixedassets->status = "Active";
        }
    
        // Calculate net book value and accumulated depreciation
        if ($acquired == $current) {
            $fixedassets->NetbookVal = $fixedassets->d_unit_cost;
            $fixedassets->AccuDep = 0;
        } else {
            $diffmonth = $acquired->diffInMonths($current);
            $fixedassets->AccuDep = $fixedassets->MonthlyDep * $diffmonth;
            $fixedassets->NetbookVal = $fixedassets->d_unit_cost - $fixedassets->AccuDep;
        }
    
        // Save the updated record
        $fixedassets->update();
    
        // Redirect with success message
        return redirect()->route('fixedAssets')->with('status', 'Updated Successfully!');
    }

    public function search(Request $request){
        $search = $request->search;

        $fixedassets = delivered_asset::where('d_item_no','Like','%'.$search.'%')->orWhere('d_category','Like','%'.$search.'%')->get();
        return view('fixedAssets',compact('fixedassets'));
    }
    
    public function exportPDF(Request $request){
        // Fetch the selected asset IDs from the request
        $selectedAssetIds = json_decode($request->assetIds, true);
    
        // Fetch the fixed assets based on the selected IDs
        if (is_array($selectedAssetIds)) {
            $fixedassets = delivered_asset::whereIn('id', $selectedAssetIds)->get();
        } else {
            $fixedassets = delivered_asset::where('id', $selectedAssetIds)->get();
        }
    
        // Extract user input from the request and decode it
        $userInput = json_decode($request->userInput, true);
    
        // Pass both fixed assets and user input to the view
        $pdf = PDF::loadView('pdf.assets', [
            'fixedassets' => $fixedassets,
            'userInput' => $userInput,
        ]);
    
        // Set the paper size to letter and orientation to landscape
        $pdf->setPaper('letter', 'landscape');
    
        // Set the filename dynamically based on the ReportTitle input
        $filename = isset($userInput['ReportTitle']) ? $userInput['ReportTitle'] . '.pdf' : 'assets.pdf';
    
        // Download the PDF with the dynamically set filename
        return $pdf->download($filename);
    }
    

    public function import(Request $request){
        $request->validate(['asset'=> ['required']]);
        Excel::import(new UsersImport, $request->file('asset'));

        return redirect('/fixedAssets')->with('success', 'Uploaded Successfully!');
    }

    public function export(){
        return Excel::download(new UsersExport, 'fixedAssets.xlsx');
    }

    public function catfunct(){
        $categoryData=account::all();
        $classData=acc_class::all();
        
        return view('addAssets', compact(['categoryData','classData']));
    }

    public function index(){
        $fixedassets = delivered_asset::all();
        return view('genReport',compact('fixedassets'));
   }

   public function genReport(Request $request)
   {
       // Get the sorting parameter from the request
       $sortBy = $request->query('sort_by');
   
       // Default sorting column
       $sortColumn = 'd_item_no';
   
       // Check if the sorting parameter is provided and valid
       if ($sortBy === 'asset_desc') {
           $sortColumn = 'd_description';
       } elseif ($sortBy === 'd_date_of_delivery') {
        $sortColumn = 'd_date_of_delivery';
        $sortDirection = 'asc'; // Sort in ascending order for date acquired
       }
   
       // Fetch assets from the database and order them by the selected column
       $fixedAssets = delivered_asset::orderBy($sortColumn)->get();
   
       // Return the view with the sorted assets
       return view('genReport', ['fixedassets' => $fixedAssets]);
   }
}
