<!DOCTYPE html>
<html lang="en">
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Report Information</h1>

<h2>Employee Name</h2>
<p>{{ $report->EmpFirstName }}</p>
<p>{{ $report->EmpLastName }}</p>

<h2>Report Title</h2>
<p>{{ $report->ReportTitle] }}</p>

<h2>Date Requested</h2>
<p>{{ $report->dateRequested }}</p>

<h2>Date Issued</h2>
<p>{{ $$report->dateIssued }}</p>

<h1>Fixed Assets Table</h1>

  @if(count($fixedassets))
    @foreach($fixedassets as $data)
       <h2>Asset Code</h2>
       <p>{{$data->d_item_no}}</p>

       <h2>Asset Description</h2>
       <p>{{$data->d_description}}</p>

       <h2>Account Title</h2>
       <p>{{$data->d_category}}</p>

       <h2>Account Classification</h2>
       <p>{{$data->AccountClass}}</p>

       <h2>Use Life</h2>
       <p>{{$data->UseLife}}</p>

       <h2>Date Acquired</h2>
       <p>{{$data->d_date_of_delivery}}</p>

       <h2>Original Cost</h2>
       <p>{{$data->d_unit_cost}}</p>

       <h2>Netbook Value</h2>
       <p>{{$data->NetbookVal}}</p>

       <h2>Status</h2>
       <p>{{$data->status}}</p>

       <h2>Accumulated Depreciation</h2>
       <p>{{$data->AccuDep}}</p>

       <h2>Monthly Depreciation</h2>
       <p>{{$data->MonthlyDep}}</p>

       <h2>Yearly Depreciation</h2>
       <p>{{$data->YearlyDep}}</p>

       <h2>Date Retired</h2>
       <p>{{$data->dateRetired}}</p>

       <h2>Person In Charge</h2>
       <p>{{$data->PersonCharge}}</p>

    @endforeach
  @else
    <h2>No Assets Found</h2>
  @endif

<h2>Remarks</h2>
<p>{{ $report->Remarks }}</p>

</body>

