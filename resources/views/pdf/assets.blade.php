<!DOCTYPE html>
<html>
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

<h1>Fixed Assets Table</h1>

<table id="customers">
  <tr>
    <th>Item Code</th>
    <th>Item Name</th>
    <th>Category</th>
    <th>Status</th>
    <th>Date Acquired</th>
    <th>Original Value</th>
    <th>Current Value</th>
    <th>Depreciation Value</th>
  </tr>
  @if(count($fixedassets))
    @foreach($fixedassets as $data)
        <tr>
            <td>{{$data->AccountNum}}</td>
            <td>{{$data->AccountName}}</td>
            <td>{{$data->ItemName}}</td>
            <td>{{$data->Status}}</td>
            <td>{{$data->dateAcquired}}</td>
            <td>{{$data->OrigVal}}</td>
            <td>{{$data->CurrentVal}}</td>   
            <td>{{$data->DepVal}}</td> 
        </tr>
    @endforeach
  @else
    <td colspan="3">No Assets Found</td>
  @endif
</table>

</body>
</html>


