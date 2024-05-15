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

.format{
  padding-left: 2cm;
  padding-right: 2cm;
}

table {
  width: 100%;
  border-collapse: collapse;
  border: none;
}

td {
  border: none;
  border-bottom: solid windowtext 1.0pt;
  padding: 7.2pt 0cm 7.2pt 0cm;
}

p {
  margin: 0cm;
  line-height: normal;
  font-size: 16px;
}

img {
  width: 96px;
}

strong {
  font-family: "Times New Roman", 'Arial';
  color: black;
}

.logo-container {
  text-align: center;
}

.office-info {
  text-align: center;
  color:#000000;  
  font-family: 'Arial', 'sans-serif';
}

.university{
  font-family: 'Arial', 'sans-serif';
  color:#000000;
  font-weight: bolder;
}


.legal-counsel {
  text-align: center;
  color: #bf7e9e;
  font-family: 'Arial ', 'Times New Roman';
  padding: 7.2pt 0cm;
  vertical-align: top;
}

.certification-header {
  text-align: center;
  font-size: 16px;
  font-family: "Times New Roman", serif;
  font-weight: bold;
  margin-top: 36pt;
  margin-bottom: 36pt;
}

.certification-content {
  text-align: justify;
  text-indent: 36.0pt;
  font-size: 16px;
  font-family: "Times New Roman", serif;
  margin-top: 6pt;
  margin-bottom: 6pt;
}

.signature {
  text-align: right;
  font-size: 16px;
  font-family: "Times New Roman", serif;
  font-weight: bold;
  margin-top: 72pt;
  margin-bottom: 6pt;
  margin-right: 1.5cm;
}

.page-break {
  page-break-before: always;
}

</style>
</head>
<body class="format">

<table>
    <tbody>
        <tr>
            <td class="logo-container">
                <p><img src="storage/assets/pamantasan logo.png" alt="image"></p>
            </td>
            <td class="office-info">
                <p>Republic of the Philippines<br>
                    <span class = 'university'>PAMANTASAN NG LUNGSOD NG MAYNILA</span>
                <br>Intramuros, Manila</p>
            </td>
            <td class="logo-container">
                <p><img src="storage/assets/manila.jpg" alt="manila_logo"></p>
            </td>
        </tr>
        
    </tbody>
</table>

<h1>Report Information</h1>

<h2>Employee Name</h2>
<p>{{ $userInput['EmpFirstName'] }} {{ $userInput['EmpLastName'] }}</p>

<h2>Report Title</h2>
<p>{{ $userInput['ReportTitle'] }}</p>

<h2>Date Requested</h2>
<p>{{ $userInput['dateRequested'] }}</p>

<h2>Date Issued</h2>
<p>{{ $userInput['dateIssued'] }}</p>

<div class="page-break"></div>

<h1>Fixed Assets Table</h1>

  @if(count($fixedassets))
    @foreach($fixedassets as $index => $data)
       @if($index > 0)
          <div class="page-break"></div>
       @endif

       <h2>Asset Code</h2>
       <p>{{$data->AssetCode}}</p>

       <h2>Asset Description</h2>
       <p>{{$data->AssetDesc}}</p>

       <h2>Account Title</h2>
       <p>{{$data->AccountTitle}}</p>

       <h2>Account Classification</h2>
       <p>{{$data->AccountClass}}</p>

       <h2>Use Life</h2>
       <p>{{$data->UseLife}}</p>

       <h2>Date Acquired</h2>
       <p>{{$data->dateAcquired}}</p>

       <h2>Original Cost</h2>
       <p>{{$data->OrigCost}}</p>

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
<p>{{ $userInput['Remarks'] }}</p>

</body>
</html>


