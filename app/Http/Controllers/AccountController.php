<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\acc_class;
use App\Models\account;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
   function index(){
        $data = acc_class::all();
        return view('accounts',compact('data'));
   }

   public function InsertAccounts(Request $request){

        $acc_class = new acc_class;

        $acc_class->AccountClass = $request->AccountClass;
        $acc_class->UseLife = $request->UseLife;
        $acc_class->timestamps=false;
        $acc_class->save();

        Alert::success('Success', 'Asset Added Successfully!');
        
        return redirect('accounts')->with('success','Added Successfully!');

   }

   public function destroy($id){

        $acc_class = acc_class::find($id);
        $acc_class->delete();
        return redirect('accounts')->with('success','Deleted Successfully!');
    }

    public function viewedit($id)
    {
       $acc_class = acc_class::find($id);
       return view('editAccounts', compact('acc_class'));
    }

    public function update(Request $request, $id){
        $acc_class = acc_class::find($id);
        $acc_class->AccountClass = $request->input('AccountClass');
        $acc_class->UseLife = $request->input('UseLife');
        $acc_class->timestamps=false;
        $acc_class->update();
        return redirect('accounts')->with('status',"Data Updated Successfully!");
    }
}
