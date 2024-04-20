<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Financial Inventory</title>
    <link rel="stylesheet" href="./dist/output.css">
    <style>
      tr:nth-child(even) {
      background-color: #EFF0FF;
      }
      .scroll-container::-webkit-scrollbar {
            width: 8px;
        }
        .scroll-container::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }
        .scroll-container::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 10px;
        }
        .scroll-container::-webkit-scrollbar-thumb:hover {
            background-color: #555; 
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="jumbotron">
        <form action="{{ url('updateAssets/'.$fixedassets->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label>Item Code</label>
                <input type="text" name="AccountNum" value="{{$fixedassets->AccountNum}}" class="form-control"> 
            </div>
            <div class="form-group mb-3">
                <label>Item Name</label>
                <input type="text" name="ItemName" value="{{$fixedassets->ItemName}}" class="form-control"> 
            </div>
            <div class="form-group mb-3">
                <label>Category</label>
                <input type="text" name="AccountName" value="{{$fixedassets->AccountName}}" class="form-control"> 
            </div>
            <div class="form-group mb-3">
                <label>Date Acquired</label>
                <input type="date" name="dateAcquired" value="{{$fixedassets->dateAcquired}}" class="form-control"> 
            </div>
            <div class="form-group mb-3">
                <label>Original Value</label>
                <input type="number" name="OrigVal" value="{{$fixedassets->OrigVal}}" class="form-control"> 
            </div>
            <div class="form-group mb-3">
                <label>Status</label>
                <input type="text" name="Status" value="{{$fixedassets->Status}}" class="form-control"> 
            </div>
            <div class="form-group mb-3">
                <label>Current Value</label>
                <input type="number" name="CurrentVal" value="{{$fixedassets->CurrentVal}}" class="form-control"> 
            </div>
            <div class="form-group mb-3">
                <label>Depreciation Value</label>
                <input type="number" name="DepVal" value="{{$fixedassets->DepVal}}" class="form-control"> 
            </div>

            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Update Assets</button>
            </div>

        </form>
        </div>
    </div>
</body>    