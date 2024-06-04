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
      .vertical-menu {
          width: 700px;
          height: auto;
          overflow-y: auto;
      }
      .vertical-menu .asset-item {
          display: flex;
          align-items: center;
          background-color: #f1f5f9;
          color: black;
          display: block;
          padding: 12px;
          text-decoration: none;
      }
      .vertical-menu .asset-item.odd:hover {
          background-color: #d1d5db; 
          color: black;
          display: block;
          padding: 12px;
          text-decoration: none
      }
      .vertical-menu .asset-item.even:hover {
          background-color: #d1d5db; 
          color: black;
          display: block;
          padding: 12px;
          text-decoration: none
      }
      .vertical-menu .asset-item .checkbox-container {
          margin-right: 10px;
      }
      .vertical-menu .asset-item.odd {
          background-color: #f1f5f9;
      }
      .vertical-menu .asset-item.even {
          background-color: #FFFFFF;
      }
      .last-name {
          margin-top: 32px;
      }
      .remarks {
          margin-top: -10px;
          margin-bottom: 32px;
      }
      .generate {
          margin-left: 20px;
      }
      .print {
          margin-left: 32px;
      }
      .save {
          margin-left: 12px;
      }
      .sort-by {
          margin-left: 220px;
      }
      .sort-by-text {
          margin-left: -20px;
          margin-right: -4px;
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
      .image-properties {
          margin-left: 90px;
      }
    </style>
  @livewireStyles
</head>

<body class="bg-neutral-100">
  <div class="h-screen">
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
      </nav>
    <!--Header-->

    <!--Lower Div-->
    <div class="flex w-auto h-screen">
      <!--Side Nav Bar-->
      <div id="accordion" class="bg-indigo-800 text-white h-screen w-80 overflow-hidden flex flex-col">
        <nav class="flex flex-col h-full w-full">
          <!--Financial Inventory Title-->
          <div class="flex items-center justify-center py-6 pl-4 pr-6">
            <a href="/">
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
            <div class="mx-4 w-fit h-fit text-4xl font-regular">Reports</div>
            <img class="my-4 w-8 h-6" src="storage/assets/arrowright.png">
            <div class="mx-2 w-auto h-fit text-4xl font-semibold">Generate Reports</div>
          </div>
        </div>
        <!--Title-->

        <div class="flex h-[85%] mb-4 mr-5">
            <!--Generate Report Format-->
            <div class="tab flex flex-col h-full w-full mb-auto ml-4 px-4 py-3 bg-white rounded-2xl shadow-lg">
            <form action="{{ route('report.generate')}}" method="POST" class="p-2 w-full h-auto">
              @csrf
                <div class="flex flex-col gap-4 mt-2">
                  <div class="flex gap-3 mb-5 ">
                    <div class="flex flex-col w-full">
                        <label for="employee name" class="block text-start mb-2 text-base font-medium text-gray-900 dark:text-white">Employee Name</label>
                        <input type="text" name="EmpFirstName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="First Name" required="">
                    </div>
                    <div class="last-name flex flex-col w-full">
                        <input type="text" name="EmpLastName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Last Name" required="">
                    </div>
                  </div>
                  <div class="flex flex-col mb-5">
                      <label for="report title" class="block text-start mb-2 text-base font-medium text-gray-900 dark:text-white">Report Title</label>
                      <input type="text" name="ReportTitle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Report Title" required="true">
                  </div>
                  <div class="flex gap-3 mb-7">
                    <div class="flex flex-col w-full">
                      <label for="date requested" class="block text-start mb-2 text-base font-medium text-gray-900 dark:text-white">Date Requested</label>
                      <input type="date" name="dateRequested" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="dd/mm/yyyy" required="">
                    </div>
                    <div class="flex flex-col w-full">
                      <label for="date issued" class="block text-start mb-2 text-base font-medium text-gray-900 dark:text-white">Date Issued</label>
                      <input type="date" name="dateIssued" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="dd/mm/yyyy" required="">
                    </div>
                  </div>
                  <div>
                    <div class="remarks flex flex-col mb-3">
                      <label for="remarks" class="block text-base text-start font-medium text-gray-900 dark:text-white">Remarks</label>
                      <textarea id="remarks" rows="10" name="Remarks" class="bg-gray-50 border scroll-container border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-auto p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Remarks" required=""></textarea>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="selectedAssets" id="selectedAssets">
                <div class="flex flex-col flex-1 justify-center items-center gap-3">
                  <button type="submit" class="w-48 h-12 px-4 py-2 bg-indigo-800 hover:bg-indigo-900 rounded-md shadow items-center gap-2 flex">
                    <img src="storage/assets/Generate.png" alt="Print Button" class="generate h-6">
                    <div class="text-white text-base font-medium leading-normal">GENERATE</div>
                  </button>
                  <button type="button" onclick="saveAsPDF()" class="w-48 h-12 px-4 py-2 bg-indigo-800 hover:bg-indigo-900 rounded-md shadow items-center gap-2 flex">
                      <img src="storage/assets/Save Icon.png" alt="Print Button" class="save h-6">
                      <span class="text-white text-base font-medium leading-normal">SAVE as PDF</span>
                  </button>
                </div>
              </form>
            </div>
            <!--Generate Report Format-->
            <!--Scroll Menu-->
            <div class="flex flex-col h-full w-auto mb-auto ml-4 px-4 py-3 bg-white rounded-2xl shadow-lg">
                <form action="" method="" id="sortForm">
                    <div class="flex ml-2 justify-between items-center border-8 border-white">
                        <div class="flex items-center justify-start">
                            <div>
                                <label for="sort">Sort By: </label>
                            </div>
                            <div class="dropdown dropdown-hover">
                                <div tabindex="0" role="button" class="btn btn-ghost ml-2" id="selectedSort">Asset Code</div>
                                <ul tabindex="0" class="dropdown-content z-[1] menu shadow bg-base-100 rounded-box w-52"></ul>
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text mr-2">Select All</span>
                                <input type="checkbox" id="select-all-checkbox" class="checkbox checkbox-sm" />
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="sort_by" id="sortBy" value="">
                </form>
                <div class="overflow-auto border-8 items-center border-white scroll-container" style="max-height: 900px;">
                    <div class="ml-4 mr-4 mb-4 w-auto shadow-lg">
                        <div class="vertical-menu scroll-container rounded-xl">
                          @foreach($fixedassets as $index => $data)
                              <div class="asset-item {{$index % 2 == 0 ? 'even' : 'odd'}}">
                                  <label class="checkbox-container">
                                      <input type="checkbox" class="asset-checkbox" name="selectedAssets[]" value="{{$data->id}}">
                                      <span class="checkmark"></span>
                                      {{$data->d_description}}
                                  </label>
                              </div>
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--Scroll Menu-->
        </div>
        
      </div>
      <!--Lower-Right Div-->
  
    </div>
    <!--Lower Div-->

  </div>
  <!--Main Div-->

  <script>
    // Function to update the hidden input field with selected asset IDs and descriptions
    function updateSelectedAssets() {
        // Get all checked checkboxes
        const checkedCheckboxes = document.querySelectorAll('.asset-checkbox:checked');

        // Map the checked checkboxes to their corresponding asset IDs and descriptions
        const selectedAssets = Array.from(checkedCheckboxes).map(checkbox => {
            return {
                id: checkbox.value,
                description: checkbox.parentElement.textContent.trim() // Trim any extra white spaces
            };
        });

        // Update the value of the hidden input field with JSON stringified data
        document.getElementById('selectedAssets').value = JSON.stringify(selectedAssets);
    }

    // Add event listeners to checkboxes to update selected assets when they are checked or unchecked
    const checkboxes = document.querySelectorAll('.asset-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedAssets);
    });
 </script>

  <script>
    function generateReport() {
        const checkboxes = document.querySelectorAll('.asset-checkbox');
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                const assetId = checkbox.value;
                const assetData = getAssetDataById(assetId);

                appendHiddenInput('assetIds[]', assetId);
                appendHiddenInput('assetDescs[]', assetData.d_description);
            }
        });

        document.getElementById('generateForm').submit();
    }

    function getAssetDataById(assetId) {
    }

    function appendHiddenInput(name, value) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        document.getElementById('generateForm').appendChild(input);
    }
  </script>

  <!--Save as PDF-->
  <script>
    function saveAsPDF() {
        let EmpFirstName = document.querySelector('input[name="EmpFirstName"]').value;
        let EmpLastName = document.querySelector('input[name="EmpLastName"]').value;
        let ReportTitle = document.querySelector('input[name="ReportTitle"]').value;
        let dateRequested = document.querySelector('input[name="dateRequested"]').value;
        let dateIssued = document.querySelector('input[name="dateIssued"]').value;
        let Remarks = document.querySelector('textarea[name="Remarks"]').value;

        let userInput = {
            EmpFirstName: EmpFirstName,
            EmpLastName: EmpLastName,
            ReportTitle: ReportTitle,
            dateRequested: dateRequested,
            dateIssued: dateIssued,
            Remarks: Remarks
        };

        let userInputString = encodeURIComponent(JSON.stringify(userInput));

        let selectedAssets = [];
        document.querySelectorAll('.asset-checkbox').forEach(function(checkbox) {
            if (checkbox.checked) {
                selectedAssets.push(checkbox.value);
            }
        });

        let selectedAssetsString = encodeURIComponent(JSON.stringify(selectedAssets));

        window.location.href = "{{ route('exportPDF') }}?userInput=" + userInputString + "&assetIds=" + selectedAssetsString;
    }

        document.getElementById('select-all-checkbox').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('.asset-checkbox');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = document.getElementById('select-all-checkbox').checked;
            });
    });
  </script>

  <!--Sort by-->
  <script>
    document.querySelectorAll('.dropdown').forEach(function(dropDownWrapper) {
        const dropDownToggler = dropDownWrapper.querySelector('.btn');
        const dropDownList = dropDownWrapper.querySelector('.dropdown-content');

        dropDownToggler.addEventListener('click', function() {
            dropDownList.classList.toggle('hidden');
        });

        document.addEventListener('click', function(event) {
            const isClickedInside = dropDownWrapper.contains(event.target);
            if (!isClickedInside) {
                dropDownList.classList.add('hidden');
            }
        });
    });
  </script>

  <!-- Sort by label -->
  <script>
      window.onload = function() {
          let currentSortBy = getCurrentSortByFromURL();
          let selectedSortLabel = document.getElementById('selectedSort');
          selectedSortLabel.textContent = getSortLabel(currentSortBy);
          updateDropdownOptions(currentSortBy);
      };

      function updateSort(sortBy) {
          document.getElementById('sortBy').value = sortBy;
          let selectedSortLabel = document.getElementById('selectedSort');
          selectedSortLabel.textContent = getSortLabel(sortBy);
          event.preventDefault();
          let dropdownContent = document.querySelector('.dropdown-content');
          dropdownContent.innerHTML = '';
          updateDropdownOptions(sortBy);
          setTimeout(function() {
              document.getElementById('sortForm').submit();
          }, 100);
      }

      function getSortLabel(sortBy) {
          switch (sortBy) {
              case 'asset_code':
                  return 'Asset Code';
              case 'asset_desc':
                  return 'Asset Description';
              case 'date_acquired':
                  return 'Date Acquired';
              default:
                  return 'Asset Code';
          }
      }

      function getCurrentSortByFromURL() {
          const urlParams = new URLSearchParams(window.location.search);
          return urlParams.get('sort_by') || 'asset_code';
      }

      // Function to update dropdown options based on current sort criteria
      function updateDropdownOptions(currentSortBy) {
          let dropdownContent = document.querySelector('.dropdown-content');
          let options = ['asset_code', 'asset_desc', 'date_acquired'];
          options.forEach(option => {
              if (option !== currentSortBy) {
                  let li = document.createElement('li');
                  let a = document.createElement('a');
                  a.href = "#";
                  a.textContent = getSortLabel(option);
                  a.onclick = function() { updateSort(option); };
                  li.appendChild(a);
                  dropdownContent.appendChild(li);
              }
          });
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
  @livewireScripts
</body>

</html>