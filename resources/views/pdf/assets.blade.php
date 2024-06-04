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

.logo-container1 {
  text-align: center;
}

.logo-container2 {
  text-align: center;
}

.office-info {
  text-align: center;
  margin-left: -250px;
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

#fixed-assets {
  border-collapse: collapse;
  width: 100%;
}

#fixed-assets th {
  border-bottom: 1px solid #ddd;
  padding: 8px;
  color: #000;
}

#fixed-assets td {
  border: none; 
  padding: 8px;
}

#fixed-assets tbody tr:last-child td {
  border-bottom: 1px solid #000; 
}

.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  text-align: center;
  padding: 10px 0;
}

</style>
</head>
<body>

<table>
    <tbody>
        <tr>
            <td class="logo-container">
                <p><img src="storage/assets/pamantasan logo.png" alt="image" style="margin-left: 140px;"></p>
            </td>
            <td class="office-info">
                <div style="margin-left: -50px;">
                    <p>Republic of the Philippines<br>
                        <span class = 'university'>PAMANTASAN NG LUNGSOD NG MAYNILA</span>
                    <br>Intramuros, Manila
                    <br>Accounting Office</p>
                </div>
            </td>
            <td class="logo-container">
                <p><img src="storage/assets/manila.jpg" alt="manila_logo" style="margin-right: 100px;"></p>
            </td>
        </tr>
        
    </tbody>
</table>
<br>
<!-- <br>
<br>
<br>
<br>
<br>
<br>
<p style="font-family: 'Times New Roman';  text-align: center; font-size: 40px; font-weight: bold;">{{ $userInput['ReportTitle'] }}</p>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<p style="font-family: 'Times New Roman';  text-align: center; font-size: 16px;">Prepared by:</p>
<p style="font-family: 'Times New Roman';  text-align: center; font-size: 16px;">{{ $userInput['EmpFirstName'] }} {{ $userInput['EmpLastName'] }}</p>
<br>
<br>
<br>
<br>
<br>
<p style="font-family: 'Times New Roman';  text-align: center; font-size: 16px;">Requested On:</p>
<p style="font-family: 'Times New Roman';  text-align: center; font-size: 16px;">{{ $userInput['dateRequested'] }}</p>
<br>
<p style="font-family: 'Times New Roman';  text-align: center; font-size: 16px;">Issued On:</p>
<p style="font-family: 'Times New Roman';  text-align: center; font-size: 16px;">{{ $userInput['dateIssued'] }}</p> -->

<div class="footer">
  <p style="font-family: 'Times New Roman';  text-align: right; font-size: 16px;">Prepared by: {{ $userInput['EmpFirstName'] }} {{ $userInput['EmpLastName'] }} | Requested On: {{ $userInput['dateRequested'] }} | Issued On: {{ $userInput['dateIssued'] }}</p>
</div>
<!-- <p style="font-family: 'Times New Roman';  text-align: center; font-size: 16px;">{{ $userInput['EmpFirstName'] }} {{ $userInput['EmpLastName'] }}</p>
<p style="font-family: 'Times New Roman';  text-align: center; font-size: 16px;">Requested On:</p>
<p style="font-family: 'Times New Roman';  text-align: center; font-size: 16px;">{{ $userInput['dateRequested'] }}</p>
<p style="font-family: 'Times New Roman';  text-align: center; font-size: 16px;">Issued On:</p>
<p style="font-family: 'Times New Roman';  text-align: center; font-size: 16px;">{{ $userInput['dateIssued'] }}</p> -->
<p style="font-family: 'Times New Roman';  text-align: center; font-size: 16px; font-weight: bold;">Financial Inventory</p>
<p style="font-family: 'Times New Roman';  text-align: center; font-size: 16px;">Asset Ledger for {{ $userInput['ReportTitle'] }}</p>
<br>
<table id="fixed-assets">
  <thead>
    <tr>
      <th style="text-align: left; width: 120px">Asset Code</th>
      <th style="text-align: left; width: 140px">Asset Description</th>
      <th style="text-align: left;">Account Title</th>
      <th style="text-align: left;">Account Classification</th>
      <th style="text-align: left; width: 140px">Netbook Value</th>
      <th style="text-align: left;">Accumulated Depreciation</th>
    </tr>
  </thead>
  <tbody>
    @if(count($fixedassets))
      @foreach($fixedassets as $index => $data)
        <tr>
          <td>{{$data->d_item_no}}</td>
          <td>{{$data->d_description}}</td>
          <td>{{ucwords(strtolower($data->d_category))}}</td> 
          @if($data->AccountClass == null)
          <td>-----</td>
          @else
          <td>{{$data->AccountClass}}</td>
          @endif
          <td>P{{ number_format(floatval($data->NetbookVal), 2) }}</td>
          <td>P{{ number_format(floatval($data->AccuDep), 2) }}</td>
        </tr>
      @endforeach
    @else
      <tr>
        <td colspan="14">No Assets Found</td>
      </tr>
    @endif
  </tbody>
</table>

<br>
<p>{{ $userInput['Remarks'] }}</p>

</body>
</html>


