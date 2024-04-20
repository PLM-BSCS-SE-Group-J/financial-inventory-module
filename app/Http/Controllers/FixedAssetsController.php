<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\fixed_assets;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FixedAssetsController extends Controller
{
    public function show()
    {
        $fixedassets = fixed_assets::all();

        return view('fixedAssets',compact('fixedassets'));
    }
    public function DataInsert(Request $request){

        $fixedassets = new fixed_assets;

        $fixedassets->AccountNum=$request->AccountNum;
        $fixedassets->AccountName=$request->AccountName;
        $fixedassets->ItemName=$request->ItemName;
        $fixedassets->Status=$request->Status;
        $fixedassets->dateAcquired=$request->dateAcquired;
        $fixedassets->OrigVal=$request->OrigVal;
        $fixedassets->CurrentVal=$request->CurrentVal;
        $fixedassets->DepVal=$request->DepVal;
        $fixedassets->timestamps=false;

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
       $fixedassets->AccountNum = $request->input('AccountNum');
       $fixedassets->ItemName = $request->input('ItemName');
       $fixedassets->AccountName = $request->input('AccountName');
       $fixedassets->Status = $request->input('Status');
       $fixedassets->dateAcquired = $request->input('dateAcquired');
       $fixedassets->OrigVal = $request->input('OrigVal');
       $fixedassets->CurrentVal = $request->input('CurrentVal');
       $fixedassets->DepVal = $request->input('DepVal');
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

        $fixedassets = fixed_assets::where('ItemName','Like','%'.$search.'%')->orWhere('AccountNum','Like','%'.$search.'%')->get();
        return view('fixedAssets',compact('fixedassets'));
    }
}
