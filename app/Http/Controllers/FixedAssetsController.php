<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\fixed_assets;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;

class FixedAssetsController extends Controller
{
    public function show()
    {
        $fixedassets = fixed_assets::all();

        return view('fixedAssets',compact('fixedassets'));
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
            $fixedassets->status="Inactive";
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

        $fixedassets = fixed_assets::where('id',$id)->firstOrFail()->delete();

        return redirect()->route('fixedAssets')->with('success','Deleted Successfully!');
    }

    public function edit($id)
    {
        $fixedassets = fixed_assets::find($id);
        return view('editAssets', compact('fixedassets'));
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

    public function exportPDF(){
        $fixedassets = fixed_assets::get();
        $pdf = PDF::loadView('pdf.assets',[
            'fixedassets'=>$fixedassets
        ]);
        return $pdf->download('assets.pdf');
    }

    public function import(Request $request){
        $request->validate(['fixed_assets'=> ['required']]);
        Excel::import(new UsersImport, $request->file('fixed_assets'));

        return redirect('/fixedAssets')->with('success', 'Uploaded Successfully!');
    }

    public function export(){
        return Excel::download(new UsersExport, 'fixedAssets.xlsx');
    }
    
    public function search(Request $request){
        $search = $request->search;

        $fixedassets = fixed_assets::where('AssetCode','Like','%'.$search.'%')->orWhere('AssetDesc','Like','%'.$search.'%')->get();
        return view('fixedAssets',compact('fixedassets'));
    }
}
