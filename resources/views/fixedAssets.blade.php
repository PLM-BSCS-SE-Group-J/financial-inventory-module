<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.6/css/dataTables.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/css/app.css')
    <title>Financial Inventory</title>
    <link rel="stylesheet" href="./dist/output.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

    <style>
      tr:nth-child(even) {
      background-color: #EFF0FF;
      }
      .vertical-menu {
          width: 320px;
          height: 400px;
          overflow-y: auto;
      }
      .vertical-menu a {
          background-color: #f1f5f9;
          color: black;
          display: block;
          padding: 12px;
          text-decoration: none;
      }
      .vertical-menu a:nth-child(even) {
          background-color: #FFFFFF;
      }
      .vertical-menu a:hover {
          background-color: #d1d5db; 
          color: black;
          display: block;
          padding: 12px;
          text-decoration: none
      }
      .vertical-menu2 {
          width: 200px;
          height: 400px;
          overflow-y: auto;
      }
      .vertical-menu2 a {
          background-color: #f1f5f9;
          color: black;
          display: block;
          padding: 12px;
          text-decoration: none;
      }
      .vertical-menu2 a:nth-child(even) {
          background-color: #FFFFFF;
      }
      .vertical-menu2 a:hover {
          background-color: #d1d5db; 
          color: black;
          display: block;
          padding: 12px;
          text-decoration: none
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
      .rowtext-margin {
          padding-left: 0px;
      }
      .table-container {
          width: 1600px;
      }
      .table-dimensions {
          width: 500px;
      }
      .dropdown-border {
        border: solid;
        border-radius: 10px;
        border-width: 1px;
        padding-left: 6px;
        padding-top: 10px;
        padding-bottom: 10px;
        width: 500px;
      }
    </style>
    
</head>

<body class="bg-neutral-100">
  <div class="h-screen">
  <!--Modals-->
    <!--Unsuccessful Modal (Nakadepende sayo Via kelan mo to gagamitin wala pa tong nakalink na button, pang error prompt to eh)-->
    <div id="fail dialog" class="fixed left=0 top=0 bg-black bg-opacity-50 z-10 w-screen h-screen justify-center items-center opacity-0 hidden transition-opacity duration-500">
      <div class="bg-white rounded-xl shadow-lg shadow-slate-200 p-8 w-[30%] h-[20%] flex flex-col overflow-hidden">
        <div class="flex flex-col gap-4 w-full">
          <span class="text-2xl font-semibold text-black">Uh Oh! Something went wrong...</span>
          <span class="text-xl text-gray-500">There was a problem with you request.</span>
          <div class="flex justify-end py-1">
            <button onclick="hideFailDialog()">
              <img class="rounded-s h-10 cursor-pointer" src="storage/assets/TryAgain.png" alt="Try Again">
            </button>
          </div>
        </div>
      </div>
    </div>

    <!--Logout Button Modal--> 
    <div id="logout dialog" class="fixed left=0 top=0 bg-black bg-opacity-50 z-20 w-screen h-screen justify-center items-center opacity-0 hidden transition-opacity duration-500">
      <div class="bg-white rounded-xl shadow-lg shadow-slate-200 px-8 pt-10 pb-8 w-[30%] h-[25%] flex flex-col overflow-hidden">
        <div class="flex flex-col gap-6 w-full">
          <span class="text-2xl font-semibold text-black">Are you absolutely sure?</span>
          <span class="text-lg text-gray-500">Clicking Yes will log you out of the session.</span>
          <div class="flex justify-end pt-2 gap-4">
            <button onclick="hideLogoutDialog()">
              <img class="rounded-s h-10 cursor-pointer" src="storage/assets/Cancel.png" alt="Cancel">
            </button>
            <button onclick="document.location='Login Page.html'">
              <img class="rounded-s h-10 cursor-pointer" src="storage/assets/Log Out.png" alt="Yes">
            </button>
          </div>
        </div>
      </div>
    </div>

    <!--Main Div-->

    <!--Header-->
    <nav class="flex items-center justify-between bg-white py-1 px-4">
    <div class="flex items-center space-x-4">
      <img class="w-116 h-20 rounded-xl" style="margin:10px" src="storage/assets/PLM LOGO.png" alt="Logo">
    </div>
    <div class="relative flex items-center space-x-4 ml-auto">
      <input type="text" class="block w-full h-10 rounded-lg border-0 py-1.5 pl-11 pr-24 bg-zinc-100 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search Here">
      <img class="absolute top-1/2 transform -translate-y-1/2 w-5 h-5" src="storage/assets/search.png" alt="Search Icon">
    </div>
    <div class="flex items-center space-x-4 ml-8 pr-8">
      <img class="w-10 h-10" src="storage/assets/usericon.png" alt="Profile Picture">
      <span class="text-lg text-gray-500">Mara Calinao</span>
      <img class="w-3 h-2" src="storage/assets/dropdowndark.png" alt="arrow down">
    </div>
    </nav>
    <!--Header-->

    <!--Lower Div-->
    <div class="flex w-auto h-screen">
      <!--Side Nav Bar-->
      <div id="accordion" class="bg-indigo-800 text-white h-screen w-80 overflow-hidden flex flex-col">
        <nav class="flex flex-col h-full w-full">
          <!--Financial Inventory Title-->
          <div class="flex items-center justify-center py-6 pl-4 pr-6">
            <a href="homePage">
              <span class="text-2xl font-semibold leading-10">Financial Inventory</span>
            </a>
          </div>
          <!--Assets-->
          <div class="collapse collapse-arrow hover:bg-indigo-900">
            <input type="checkbox"/> 
            <div class="collapse-title flex items-center py-2 px-7 gap-3">
              <img class="w-12 h-8" src="storage/assets/assets.png">
              <span class="w-full text-xl font-normal leading-7 text-white transition duration-300">Assets</span>
            </div>
            <div class="collapse-content font-medium flex flex-col gap-2"> 
              <a href="fixedAssets" class="w-48 h-fit ml-8 pl-4 pr-8 rounded-md hover:bg-neutral-100 hover:text-black">Fixed Assets</a>
              <a href="accounts" class="w-48 h-fit ml-8 pl-4 pr-8 rounded-md hover:bg-neutral-100 hover:text-black">Accounts</a>
            </div>
          </div>
          <!--Reports-->
          <div class="collapse collapse-arrow hover:bg-indigo-900">
            <input type="checkbox"/> 
            <div class="collapse-title flex items-center py-2 px-7 gap-3">
              <img class="w-12 h-8" src="storage/assets/reports.png">
              <span class="w-full text-xl font-normal leading-7 text-white transition duration-300">Reports</span>
            </div>
            <div class="collapse-content font-medium flex flex-col gap-2"> 
              <a href="genReport" class="w-48 h-fit ml-8 pl-4 pr-8 rounded-md hover:bg-neutral-100 hover:text-black">Generate Report</a>
              <a href="viewReport" class="w-48 h-fit ml-8 pl-4 pr-8 rounded-md hover:bg-neutral-100 hover:text-black">View All Reports</a>
            </div>
          </div>
          <!--Settings-->
          <a href="" class="flex items-center mt-auto mb-2 hover:bg-indigo-900 py-1 pl-8 gap-5">
            <img class="w-6 h-6" src="storage/assets/settings.png">
            <span class="w-full text-xl font-normal leading-7 text-white transition duration-300">Settings</span>
          </a>
          <!--Logout-->
          <div class="relative flex items-center mb-8 hover:bg-indigo-900 py-1 pl-8 gap-5">
            <button onclick="showLogoutDialog()" class="flex items-center gap-5">
              <img class="w-6 h-6" src="storage/assets/logout.png" alt="Logout Icon">
              <span class="text-xl font-normal leading-7 text-white transition duration-300">Logout</span>
            </button>
          </div>
        </nav>
      </div>
      <!--Side Nav Bar-->

      <!--Lower-Right Div-->
      <div class="flex flex-col w-screen bg-neutral-200">
        <!--Title-->
        <div class="flex h-24 w-auto my-4 mx-4 bg-white rounded-2xl shadow">
          <div class="flex h-24 w-5/6 px-5 items-center">
            <div class="mx-4 w-fit h-fit text-4xl font-regular">Assets</div>
            <img class="my-4 w-8 h-6" src="storage/assets/arrowright.png">
            <div class="mx-2 w-auto h-fit text-4xl font-semibold">Fixed Assets</div>
          </div>
        </div>
        <!--Title-->
        <!--Fixed Assets Table-->
        <div class="flex h-[85%] mb-auto table-container mx-4 px-4 py-3 bg-white rounded-2xl shadow-lg">
          <div class="overflow-auto border-8 border-white scroll-container">
            <table id="myTable" class="table-fixed ml-4 mr-4 mb-4 mt-4 w-auto shadow-lg border-collapse border border-slate-300">
              <div class="flex items-center">
                <div class="relative flex items-center w-full space-x-4 mt-4">
                  <!--Add Button Trigger-->
                  <a href="addAssets">
                    <img class="w-50 h-10" src="storage/assets/Add Button.png" alt="Add Button">
                  </a>
                  <!--Export Button Trigger-->
                  <a href="{{ route('export') }}">
                    <img class="w-50 h-10" src="storage/assets/Export Button.png" alt="Export to Excel">
                  </a>
                  <!--Import Button Trigger-->
                  <div class="flex flex-1 items-center">
                    <form action="{{route('import')}}" method="POST" enctype="multipart/form-data" class="absolute">
                      @csrf
                      <button>
                        <img class="w-50 h-10"src="storage/assets/Import Button.png" alt="Import Excel">
                      </button>
                      <input type="file" name="fixed_assets" class="ml-2" required>
                    </form>
                  </div>
                  <button class="btn btn-ghost" onclick="my_modal_1.showModal()">
                      <img src="storage/assets/filter.png" class="h-5" alt="Open Modal">
                  </button>
                  <dialog id="my_modal_1" class="modal">
                    <div class="modal-box">
                    <!--Filter-->
                    <div class="col-md-6">
                      <div class="form-group mb-5">
                        <label for="date_filter" class="font-bold">Filter by Date:</label>
                        <form method="get" action="fixedAssets">
                          <div class="flex input-group w-full justify-between">
                            <select class="form-select dropdown-border" name="date_filter">
                              <option value="">Select Date</option>
                              <option value="this_week">This Week</option>
                              <option value="this_month">This Month</option>
                              <option value="this_year">This Year</option>
                              <option value="this_decade">This Decade</option>
                              <option value="all_dates">All Dates</option>
                            </select>
                            <button type="submit" class="ml-1 btn btn-ghost">Filter</button>
                          </div>
                        </form>
                      </div>

                      <div class="form-group mb-5">
                        <label for="status_filter" class="font-bold">Filter by Status:</label>
                        <form method="get" action="fixedAssets">
                          <div class="flex input-group w-full justify-between">
                            <select class="form-select dropdown-border" name="status_filter">
                              <option value="">Select Status</option>
                              <option value="expired">Expired</option>
                              <option value="active">Active</option>
                              <option value="show_all">Show All</option>
                            </select>
                            <button type="submit" class="m1-1 btn btn-ghost">Filter</button>
                          </div>
                        </form>
                      </div>

                      <div class="form-group mb-2">
                        <label for="title_filter" class="font-bold">Filter by Account Titles:</label>
                        <form method="get" action="fixedAssets">
                          <div class="flex input-group w-full justify-between">
                            <select class="form-select dropdown-border" name="title_filter">
                              <option value="">Select Account Title</option>
                              <option value="school_build">School Buildings</option>
                              <option value="other_struc">Other Structures</option>
                              <option value="office_equip">Office Equipment</option>
                              <option value="ict">Information and Communication Technology</option>
                              <option value="drre">Disaster Response and Rescue Equipment</option>
                              <option value="mpse">Military, Police and Security Equipment</option>
                              <option value="medical_equip">Medical Equipment</option>
                              <option value="sports_equip">Sports Equipment</option>
                              <option value="tech_equip">Technical and Scientific Equipment</option>
                              <option value="other_mac">Other Machinery and Equipment</option>
                              <option value="motor_vehicles">Motor Vehicles</option>
                              <option value="furni_fix">Furniture and Fixtures</option>
                              <option value="books">Books</option>
                              <option value="display_all">Show All</option>
                            </select>
                            <button type="submit" class="ml-1 btn btn-ghost">Filter</button>
                          </div>
                        </form>
                      </div>         
                    </div>
                    <!--Filter-->
                      <div class="modal-action">
                        <form method="dialog">
                          <button class="btn">Close</button>
                        </form>
                      </div>
                    </div>
                  </dialog>
                </div>
              </div>
              <thead class="bg-slate-100 sticky top-0">
                <tr class="h-10">
                  <th class="border border-slate-100" style="text-align: left;">Asset Code</th>
                  <th class="border rowtext-margin text-left border-slate-100">Asset Description</th>
                  <th class="border rowtext-margin text-left border-slate-100">Account Title</th>
                  <th class="w-24 border rowtext-margin text-left border-slate-100">Status</th>
                  <th class="w-32 border rowtext-margin text-left border-slate-100" style="text-align: left;">Date Acquired</th>
                  <th class="border rowtext-margin text-left border-slate-100" style="text-align: left;">Original Cost</th>
                  <th class="border rowtext-margin text-left border-slate-100" style="text-align: left;">Netbook Value</th>
                  <th class="border rowtext-margin text-left border-slate-100" style="text-align: left;">Accumulated Depreciation</th>
                  <th class="border rowtext-margin text-left border-slate-100 depreciation-header" style="text-align: left;">Yearly Depreciation</th>
                  <th class="border rowtext-margin text-left border-slate-100 depreciation-header" style="text-align: left;">Monthly Depreciation</th>
                  <th class="w-20 border rowtext-margin text-left border-slate-100">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white">
              @foreach($fixedassets as $data)
                <tr class="h-8 hover:bg-gray-300">
                  <td class="border text-center border-slate-100" style="text-align: left;">{{$data->AssetCode}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->AssetDesc}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->AccountTitle}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->status}}</td>
                  <td class="border rowtext-margin border-slate-100" style="text-align: left;">{{$data->dateAcquired}}</td>
                  <td class="border rowtext-margin border-slate-100" style="text-align: left;">₱{{$data->OrigCost}}</td>
                  <td class="border rowtext-margin border-slate-100" style="text-align: left;">₱{{$data->NetbookVal}}</td>
                  <td class="border rowtext-margin border-slate-100 depreciation-cell" style="text-align: left;">₱{{$data->AccuDep}}</td>
                  <td class="border rowtext-margin border-slate-100" style="text-align: left;">₱{{$data->YearlyDep}}</td>
                  <td class="border rowtext-margin border-slate-100" style="text-align: left;">₱{{$data->MonthlyDep}}</td>
                  <td class="flex flex-col border rowtext-margin border-slate-100">
                    <a href="{{ url('editAssets/'.$data->id) }}" class="text-indigo-800 underline">View</a>
                    <a href="{{ url('delete/'.$data->id) }}" class="text-indigo-800 underline" onclick="confirmation(event)">Delete</a>
                  </td> 
                </tr>
            @endforeach
              </tbody>
            </table>
          </div>
          
        </div>
        <!--Case Matrix Table-->
        
      </div>
      <!--Lower-Right Div-->
  
    </div>
    <!--Lower Div-->

  </div>
  <!--Main Div-->

  <!--For Table-->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/2.0.6/js/dataTables.min.js"></script>
  <script>
    $(document).ready( function (){
      $('#myTable').DataTable();
    });
  </script>
  
  <script>
        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = "{{ session('success') }}";
            var errorMessage = "{{ session('error') }}";

            if (errorMessage) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMessage
                });
            }

            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: successMessage
                });
            }
        });
    </script>

  <!--Confirm Delete-->
  <script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to you want to delete this asset?",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {
                window.location.href = urlToRedirect;
            }  
        });
    }
  </script>

  <!--Yearly/Monthly Script-->
  <script>
    function toggleDepreciation() {
      var slider = document.querySelector('.toggle');
      var columnHeader = document.querySelector('.depreciation-header');
      var depreciationCells = document.querySelectorAll('.depreciation-cell');

      if (slider.checked) {
        columnHeader.textContent = 'Monthly Depreciation';
        // Update backend computation for monthly depreciation
        depreciationCells.forEach(cell => {
          // Update each cell's computation logic
          // For example:
          // cell.textContent = calculateMonthlyDepreciation(...);
        });
      } else {
        columnHeader.textContent = 'Yearly Depreciation';
        // Update backend computation for yearly depreciation
        depreciationCells.forEach(cell => {
          // Update each cell's computation logic
          // For example:
          // cell.textContent = calculateYearlyDepreciation(...);
        });
      }
    }
  </script>

  <!--Unsuccessful Prompt Modal Script-->
  <script>
    function showFailDialog(){
      let dialog = document.getElementById('fail dialog');
      dialog.classList.remove('hidden');
      dialog.classList.add('flex');
      setTimeout(() => {
      dialog.classList.add('opacity-100');
      }, 20);
    }

    function hideFailDialog(){
      let dialog = document.getElementById('fail dialog');
      dialog.classList.add('opacity-0');
      dialog.classList.remove('opacity-100');
      setTimeout(() => {
      dialog.classList.add('hidden');
      dialog.classList.remove('flex');
      }, 500);
    }
  </script>

  <!--Filter Modal Script-->
  <script>
    function showFilterDialog(){
      let dialog = document.getElementById('filter dialog');
      dialog.classList.remove('hidden');
      dialog.classList.add('flex');
      setTimeout(() => {
      dialog.classList.add('opacity-100');
      }, 20);
    }

    function hideFilterDialog(){
      let dialog = document.getElementById('filter dialog');
      dialog.classList.add('opacity-0');
      dialog.classList.remove('opacity-100');
      setTimeout(() => {
      dialog.classList.add('hidden');
      dialog.classList.remove('flex');
      }, 500);
    }
  </script>


  <!--Log Out Modal Script-->
  <script>
    function showLogoutDialog(){
      let dialog = document.getElementById('logout dialog');
      dialog.classList.remove('hidden');
      dialog.classList.add('flex');
      setTimeout(() => {
      dialog.classList.add('opacity-100');
      }, 20);
    }

    function hideLogoutDialog(){
      let dialog = document.getElementById('logout dialog');
      dialog.classList.add('opacity-0');
      dialog.classList.remove('opacity-100');
      setTimeout(() => {
      dialog.classList.add('hidden');
      dialog.classList.remove('flex');
      }, 500);
    }
  </script>

  <!--Time Selection Accordion-->
  <script>
    let items2 = document.querySelectorAll('#accordion .item2 .header');

    items2.forEach((item)=>{
        item.addEventListener('click',(e)=>{
        let currentItem = e.currentTarget.closest('.item2');

        //Activate the accordion
        e.currentTarget.closest('.item2').classList.toggle('active');

        if (!isActive) {
            currentItem.classList.add('active');
        }
        });
    });
  </script>
</body>

</html>