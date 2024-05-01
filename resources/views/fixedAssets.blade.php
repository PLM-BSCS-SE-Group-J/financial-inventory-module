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
          padding-left: 10px;
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

    <!--Filter Button Modal--> 
    <div id="filter dialog" class="fixed left=0 top=0 bg-black bg-opacity-50 z-10 w-screen h-screen justify-center items-center opacity-0 hidden transition-opacity duration-500">
      <div class="bg-white rounded-3xl shadow-lg shadow-slate-200 pt-6 px-4 w-[45%] h-[60%] flex flex-col overflow-hidden">
        <div class="flex flex-col gap-2 w-full">
          <div class="flex w-full pt-2">
            <div class="flex pb-2">
              <p class="ml-4 text-2xl font-base">Search Filters</p>
            </div>
            <!--Back Button Modal-->
            <button class="ml-auto" onclick="hideFilterDialog()">
              <img class="rounded-s h-8 cursor-pointer" src="storage/assets/Back Button.png" alt="Back">
            </button>
          </div>
          <div class="flex">
            <div class="overflow-auto border-8 items-center border-white scroll-container" style="max-height: 900px;">
              <div class="ml-4 mr-4 mb-4 w-auto flex-col">
                <p class="ml-3 mb-4 text-base font-base">Date Acquired</p>
                <div class="vertical-menu2 scroll-container rounded-xl">
                  <a class="text-sm" href="#">This Week</a>
                  <a class="text-sm" href="#">This Month</a>
                  <a class="text-sm" href="#">This Year</a>
                  <a class="text-sm" href="#">This Decade</a>
                  <a class="text-sm" href="#">Show All</a>
                </div>
              </div>
            </div>
            <div class="overflow-auto border-8 items-center border-white scroll-container" style="max-height: 900px;">
              <div class="ml-4 mr-4 mb-4 w-auto flex-col">
                <p class="ml-3 mb-4 text-base font-base">Status</p>
                <div class="vertical-menu2 scroll-container rounded-xl">
                  <a class="text-sm" href="#">Active</a>
                  <a class="text-sm" href="#">Inactive</a>
                  <a class="text-sm" href="#">Show All</a>
                </div>
              </div>
            </div>
            <div class="overflow-auto border-8 items-center border-white scroll-container" style="max-height: 900px;">
              <div class="ml-4 mr-4 mb-4 w-auto flex-col">
                <p class="ml-3 mb-4 text-base font-base">Category</p>
                <div class="vertical-menu scroll-container rounded-xl">
                  <a class="text-sm" href="#">School Buildings</a>
                  <a class="text-sm" href="#">Other Structures</a>
                  <a class="text-sm" href="#">Office Equipment</a>
                  <a class="text-sm" href="#">Information and Communication Technology</a>
                  <a class="text-sm" href="#">Disaster Response and Rescue Equipment</a>
                  <a class="text-sm" href="#">Military, Police and Security Equipment</a>
                  <a class="text-sm" href="#">Medical Equipment</a>
                  <a class="text-sm" href="#">Sports Equipment</a>
                  <a class="text-sm" href="#">Technical and Scientific Equipment</a>
                  <a class="text-sm" href="#">Other Machinery and Equipment</a>
                  <a class="text-sm" href="#">Motor Vehicles</a>
                  <a class="text-sm" href="#">Furniture and Fixtures </a>
                  <a class="text-sm" href="#">Books</a>
                  <a class="text-sm" href="#">Show All</a>
                </div>
              </div>
            </div>
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
          <div class="item mt-1">
            <div class="header font-bold flex items-center cursor-pointer hover:bg-indigo-900">
              <div class="flex items-center py-2 px-9 gap-3">
                <img class="w-12 h-8" src="storage/assets/assets.png">
                <span class="w-full text-xl font-normal leading-7 text-white transition duration-300">Assets</span>
              </div>
              <img class="inactiveIcon w-3 h-2 ml-7" src="storage/assets/dropdown.png">
              <img class="activeIcon w-3 h-2 ml-7" src="storage/assets/flyup.png">
            </div>

            <div class="content font-medium transition-all duration-500 flex flex-col gap-2">
              <a href="fixedAssets" class="w-48 h-fit px-2 rounded-md hover:bg-neutral-100 hover:text-black">Fixed Assets</a>
              <a href="accounts" class="w-48 h-fit px-2 rounded-md hover:bg-neutral-100 hover:text-black">Accounts</a>
            </div>
          </div>
          <!--Reports-->
          <div class="item mt-5">
            <div class="header font-bold flex items-center cursor-pointer hover:bg-indigo-900">
              <div class="flex items-center py-2 px-9 gap-3">
                <img class="w-12 h-8" src="storage/assets/reports.png">
                <span class="w-full text-xl font-normal leading-7 text-white transition duration-300">Reports</span>
              </div>
              <img class="inactiveIcon w-3 h-2 ml-4" src="storage/assets/dropdown.png">
              <img class="activeIcon w-3 h-2 ml-4" src="storage/assets/flyup.png">
            </div>

            <div class="content font-medium transition-all duration-500 flex flex-col gap-2">
              <a href="genReport" class="w-48 h-fit px-2 rounded-md hover:bg-neutral-100 hover:text-black">Generate Reports</a>
              <a href="viewReport" class="w-48 h-fit px-2 rounded-md hover:bg-neutral-100 hover:text-black">View All Reports</a>
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
        <div class="flex h-[85%] mb-auto mx-4 px-4 py-3 bg-white rounded-2xl shadow-lg">
          <div class="overflow-auto border-8 border-white scroll-container">
            <table class="table-fixed ml-4 mr-4 mb-4 mt-4 w-auto shadow-lg border-collapse border border-slate-300">
              <div class="flex items-center mr-4">
                <div class="relative flex items-center w-full space-x-4 ml-4 mt-4">
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
                  <!--Yearly/Monthly Button Trigger-->
                  <label class="flex cursor-pointer gap-2">
                    <span class="label-text text-base">Yearly</span> 
                    <input type="checkbox" value="synthwave" class="toggle theme-controller bg-indigo-800" onchange="toggleDepreciation()"/>
                    <span class="label-text text-base">Monthly</span> 
                  </label>
                  <!--Search Button Trigger-->
                  <form action ="{{url('search')}}" method="GET">
                  <div class="relative flex items-center space-x-4 ml-auto">
                    <input type="search" name="search" class="block w-72 h-10 rounded-lg border-0 pl-11 pr-4 bg-zinc-100 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search Asset">
                    <img class="absolute top-1/2 transform -translate-y-1/2 w-5 h-5" src="storage/assets/search.png" alt="Search Icon">
                  </div>
                  </form>
                  <!--Filter Button Trigger-->
                  <button onclick="showFilterDialog()">
                    <img class="h-5" src="storage/assets/filter.png" alt="Filter Button">
                  </button>
                </div>
              </div>
              <thead class="bg-slate-100 sticky top-0">
                <tr class="h-10">
                  <th class="w-40 border border-slate-100">Asset Code</th>
                  <th class="w-80 border rowtext-margin text-left border-slate-100">Asset Description</th>
                  <th class="w-64 border rowtext-margin text-left border-slate-100">Account Title</th>
                  <th class="w-20 border rowtext-margin text-left border-slate-100">Status</th>
                  <th class="w-36 border rowtext-margin text-left border-slate-100">Date Acquired</th>
                  <th class="w-44 border rowtext-margin text-left border-slate-100">Original Cost</th>
                  <th class="w-44 border rowtext-margin text-left border-slate-100">Netbook Value</th>
                  <th class="w-44 border rowtext-margin text-left border-slate-100">Accumulated Depreciation</th>
                  <th class="w-40 border rowtext-margin text-left border-slate-100 depreciation-header">Yearly Depreciation</th>
                  <th class="w-40 border rowtext-margin text-left border-slate-100 depreciation-header">Monthly Depreciation</th>
                  <th class="w-20 border rowtext-margin text-left border-slate-100">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white">
              @foreach($fixedassets as $data)
                <tr class="h-8 hover:bg-gray-300">
                  <td class="border text-center border-slate-100">{{$data->AssetCode}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->AssetDesc}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->AccountTitle}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->status}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->dateAcquired}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->OrigCost}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->NetbookVal}}</td>
                  <td class="border rowtext-margin border-slate-100 depreciation-cell">{{$data->AccuDep}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->YearlyDep}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->MonthlyDep}}</td>
                  <td class="flex flex-col rowtext-margin">
                    <a href="{{ url('editAssets/'.$data->id) }}" class="text-indigo-800 underline">View</a>
                    <form method="POST" action="{{ route('assets.destroy', $data->id)}}">            
                        @csrf
                        @method('delete')
                        <button class="text-indigo-800 underline">Delete</button>
                    </form> 
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

  <!--Side Menu Accordion-->
  <script>
    let items = document.querySelectorAll('#accordion .item .header');

    items.forEach((item)=>{
        item.addEventListener('click',(e)=>{
        let currentItem = e.currentTarget.closest('.item');

        //Activate the accordion
        e.currentTarget.closest('.item').classList.toggle('active');

        if (!isActive) {
            currentItem.classList.add('active');
        }
        });
    });
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