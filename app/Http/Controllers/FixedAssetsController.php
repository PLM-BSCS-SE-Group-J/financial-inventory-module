<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\acc_class;
use App\Models\account;
use App\Models\fixed_assets;
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

        $query = fixed_assets::query();
        $date = $request->date_filter;
        $status = $request->status_filter;
        $title = $request->title_filter;

        switch($date){
            case 'this_week':
                $query->whereBetween('dateAcquired',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'this_month':
                $query->whereMonth('dateAcquired',Carbon::now()->month);
                break;
            case 'this_year':
                $query->whereYear('dateAcquired',Carbon::now()->year);
                break;
            case 'this_decade':
                $query->whereBetween('dateAcquired',[Carbon::now()->startOfDecade(), Carbon::now()]);
                break;
            case 'all_dates':
                $query->whereBetween('dateAcquired',[Carbon::now()->startOfCentury(), Carbon::now()]);
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
                $query->where('AccountTitle','Like','%School Buildings%');
                break;
            case 'other_struc':
                $query->where('AccountTitle','Like','%Other Structures%');
                break;
            case 'office_equip':
                $query->where('AccountTitle','Like','%Office Equipment%');
                break;
            case 'ict':
                $query->where('AccountTitle','Like','%Information and Communication Technology%');
                break;
            case 'drre':
                $query->where('AccountTitle','Like','%Disaster Response and Rescue Equipment%');
                break;
            case 'mpse':
                $query->where('AccountTitle','Like','%Military, Police and Security Equipment%');
                break;
            case 'medical_equip':
                $query->where('AccountTitle','Like','%Medical Equipment%');
                break;
            case 'sports_equip':
                $query->where('AccountTitle','Like','%Sports Equipment%');
                break;
            case 'tech_equip':
                $query->where('AccountTitle','Like','%Technical and Scientific Equipment%');
                break;
            case 'other_mac':
                $query->where('AccountTitle','Like','%Other Machinery and Equipment%');
                break;
            case 'motor_vehicles':
                $query->where('AccountTitle','Like','%Motor Vehicles%');
                break;
            case 'furni_fix':
                $query->where('AccountTitle','Like','%Furniture and Fixtures%');
                break;
            case 'books':
                $query->where('AccountTitle','Like','%Books%');
                break;
            case 'display_all':
                $query->where('AccountTitle','Like','%i%')->orWhere('AccountTitle','Like','%o%');
                break;
        }

        $fixedassets = $query->get();

        return response()->view('fixedAssets',compact('fixedassets'));
    }
    public function DataInsert(Request $request){

        $fixedassets = new fixed_assets;

        $today = Carbon::today()->format('Y-m-d');
        $current = Carbon::parse($today);
        $fixedassets->AssetCode=$request->AssetCode;
        $fixedassets->AssetDesc=$request->AssetDesc;
        $fixedassets->AccountTitle=$request->AccountTitle;
        $fixedassets->AccountClass=$request->AccountClass;
        $fixedassets->UseLife=$request->UseLife;
        $fixedassets->dateAcquired=$request->dateAcquired;
        $fixedassets->OrigCost=$request->OrigCost;
        
        $salvageVal = $fixedassets->OrigCost * 0.05;
        $fixedassets->YearlyDep= ($fixedassets->OrigCost - $salvageVal) / $fixedassets->UseLife;
        $fixedassets->MonthlyDep=$fixedassets->YearlyDep/12;
        $fixedassets->timestamps=false;
        $date = Carbon::createFromFormat('Y-m-d', $fixedassets->dateAcquired);
        $acquired = Carbon::parse($fixedassets->dateAcquired);
        if($date->addYears($fixedassets->UseLife)<$today){
            $fixedassets->status="Expired";
        }
        else{
            $fixedassets->status="Active";
        }

        if($acquired == $current){
            $fixedassets->NetbookVal=$fixedassets->OrigCost;
        }
        else{
            $diffmonth = $acquired->diffInMonths($current);
            $fixedassets->AccuDep=$fixedassets->MonthlyDep * $diffmonth;
            $fixedassets->NetbookVal=$fixedassets->OrigCost - $fixedassets->AccuDep;
        }
        
        $fixedassets->save();
        
        return redirect()->route('fixedAssets')->with('success','Added Successfully!');
    }

    public function destroy($id){
        
        $fixedassets = fixed_assets::find($id);
        $fixedassets->delete();
        return redirect()->route('fixedAssets')->with('success','Deleted Successfully!');
    }

    public function edit($id)
    {
        $fixedassets = fixed_assets::find($id);
        $categoryData=account::all();
        $classData=acc_class::all();
        return view('editAssets', compact(['fixedassets','categoryData','classData']));
    }

    public function editAssets(Request $request, $id){
        $fixedassets = fixed_assets::find($id);
        $fixedassets->AssetCode=$request->input('AssetCode');
        $fixedassets->AssetDesc=$request->input('AssetDesc');
        $fixedassets->AccountTitle=$request->input('AccountTitle');
        $fixedassets->AccountClass=$request->input('AccountClass');
        $fixedassets->UseLife=$request->input('UseLife');
        $fixedassets->dateAcquired=$request->input('dateAcquired');
        $fixedassets->OrigCost=$request->input('OrigCost');
        $fixedassets->NetbookVal=$request->input('NetbookVal');
        $fixedassets->status=$request->input('status');
        $fixedassets->AccuDep=$request->input('AccuDep');
        $fixedassets->MonthlyDep=$request->input('MonthlyDep');
        $fixedassets->YearlyDep=$request->input('YearlyDep');
        $fixedassets->dateRetired=$request->input('dateRetired');
        $fixedassets->PersonCharge=$request->input('PersonCharge');
        $fixedassets->timestamps=false;

        $fixedassets->update();       

        return redirect()->route('fixedAssets')->with('status', 'Updated Successfully!');
    }

    public function search(Request $request){
        $search = $request->search;

        $fixedassets = fixed_assets::where('AssetCode','Like','%'.$search.'%')->orWhere('AccountTitle','Like','%'.$search.'%')->get();
        return view('fixedAssets',compact('fixedassets'));
    }
    
    public function exportPDF(Request $request){
        // Fetch the selected asset IDs from the request
        $selectedAssetIds = json_decode($request->assetIds, true);
    
        // Fetch the fixed assets based on the selected IDs
        if (is_array($selectedAssetIds)) {
            $fixedassets = fixed_assets::whereIn('id', $selectedAssetIds)->get();
        } else {
            $fixedassets = fixed_assets::where('id', $selectedAssetIds)->get();
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
        $request->validate(['fixed_assets'=> ['required']]);
        Excel::import(new UsersImport, $request->file('fixed_assets'));

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
        $fixedassets = fixed_assets::all();
        return view('genReport',compact('fixedassets'));
   }

   public function genReport(Request $request)
   {
       // Get the sorting parameter from the request
       $sortBy = $request->query('sort_by');
   
       // Default sorting column
       $sortColumn = 'AssetCode';
   
       // Check if the sorting parameter is provided and valid
       if ($sortBy === 'asset_desc') {
           $sortColumn = 'AssetDesc';
       } elseif ($sortBy === 'date_acquired') {
        $sortColumn = 'dateAcquired';
        $sortDirection = 'asc'; // Sort in ascending order for date acquired
       }
   
       // Fetch assets from the database and order them by the selected column
       $fixedAssets = fixed_assets::orderBy($sortColumn)->get();
   
       // Return the view with the sorted assets
       return view('genReport', ['fixedassets' => $fixedAssets]);
   }
}
