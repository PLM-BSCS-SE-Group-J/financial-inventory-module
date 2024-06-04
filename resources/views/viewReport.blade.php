<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Financial Inventory</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./dist/output.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
          cursor: pointer;
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
      .scrollable {
            max-height: 100%; /* Adjust this height as necessary */
            overflow-y: auto;
      }
      .rounded-table {
            border: 2px solid #333;
            border-radius: 15px;
            overflow: hidden;
      }

      .rounded-table th:first-child {
          border-top-left-radius: 15px;
      }

      .rounded-table th:last-child {
          border-top-right-radius: 15px;
      }

      .rounded-table td:first-child {
          border-bottom-left-radius: 15px;
      }

      .rounded-table td:last-child {
          border-bottom-right-radius: 15px;
      }
      
      .image-properties {
          display: flex;
          justify-content: center;
          align-items: center;
          margin-left: 100px;
      }
      .bg-custom {
          background-color: #f1f5f9;
      }
    </style>

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
            <div class="mx-2 w-auto h-fit text-4xl font-semibold">View All Reports</div>
          </div>
        </div>
        <!--Title-->

        <div class="flex h-[85%] mb-4 mr-5">
            <!--Scroll Menu-->
            <div class="flex flex-col h-full w-auto mb-auto ml-4 px-4 py-3 bg-white rounded-2xl shadow-lg">
                <form action="" method="" id="sortForm">
                    <div class="flex ml-2 justify-between items-center border-8 border-white">
                        <div class="flex items-center justify-start">
                          <div>
                            <label for="sort">Sort By: </label>
                          </div>
                          <div class="dropdown dropdown-hover">
                            <div tabindex="0" role="button" class="btn btn-ghost ml-2" id="selectedSort">Report Title</div>
                            <ul tabindex="0" class="dropdown-content z-[1] menu shadow bg-base-100 rounded-box w-52"></ul>
                          </div>
                        </div>
                    </div>
                    <input type="hidden" name="sort_by" id="sortBy" value="">
                </form>
                <div class="overflow-auto border-8 items-center border-white scroll-container" style="max-height: 900px;">
                  <div class="w-full shadow-lg">
                      <table id="myTable" class="table-fixed rounded-table w-auto shadow-lg border-collapse border border-slate-300">
                          <div class="vertical-menu scroll-container rounded-xl">
                              <tbody class="bg-white">
                                  @if($reports->isEmpty())
                                      <tr>
                                          <td class="flex items-center justify-center py-4 image-properties">
                                              <img src="{{ asset('storage/assets/noreports.png') }}" alt="No reports image">
                                          </td>
                                      </tr>
                                  @else
                                    @foreach($reports as $index => $report)
                                      <tr class="h-12 {{ $index % 2 == 0 ? 'bg-custom' : 'bg-white' }} hover:bg-gray-300">
                                          <td class="w-full border text-center border-slate-100" style="text-align: left; padding-left: 20px;">
                                              {{ $report->ReportTitle }}
                                          </td>
                                          <td class="w-36 flex flex-col border rowtext-margin border-slate-100" style="text-align: left; padding-left: 20px; padding-top: 10px; padding-bottom: 10px;">
                                              <a href="{{ url('viewReport/'.$report->ReportTitle) }}" class="text-indigo-800 underline show-details" data-id="{{ $report->ReportTitle }}" data-assets="{{ $report->selectedAssets }}">Show Details</a>
                                              <a href="{{ url('deleteReport/'.$report->ReportTitle) }}" class="text-indigo-800 underline" onclick="confirmation(event)">Delete</a>
                                          </td>
                                          <input type="hidden" name="selectedAssets_{{ $report->id }}" value="{{ $report->selectedAssets }}">
                                      </tr>
                                    @endforeach
                                  @endif
                              </tbody>
                          </div>
                      </table>
                  </div>
              </div>
            </div>
            <!--Scroll Menu-->

            <!--Report Details-->
            <div class="h-full w-full ml-4 rounded-2xl bg-white px-4 py-3 shadow-lg scroll-container scrollable overflow-y-scroll">
              <form action="{{ route('report.generate')}}" method="POST" class="p-2 w-full h-auto">
                @csrf
                <div class="flex flex-col gap-4 mt-2">
                  <div class="flex gap-3 items-center">
                    <div class="flex flex-col w-full">
                        <label for="employee name" class="block text-start mb-2 text-base font-medium text-gray-900 dark:text-white">Employee Name</label>
                        <input type="text" name="EmpFirstName" readonly value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    </div>
                    <div class="last-name flex flex-col w-full mt-8">
                        <input type="text" name="EmpLastName" readonly value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    </div>
                  </div>
                  <div class="flex flex-col">
                      <label for="report title" class="block text-start mb-2 text-base font-medium text-gray-900 dark:text-white">Report Title</label>
                      <input type="text" name="ReportTitle" readonly value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="true">
                  </div>
                  <div class="flex gap-3">
                    <div class="flex flex-col w-full">
                      <label for="date requested" class="block text-start mb-2 text-base font-medium text-gray-900 dark:text-white">Date Requested</label>
                      <input type="date" name="dateRequested" readonly value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    </div>
                    <div class="flex flex-col w-full">
                      <label for="date issued" class="block text-start mb-2 text-base font-medium text-gray-900 dark:text-white">Date Issued</label>
                      <input type="date" name="dateIssued" readonly value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    </div>
                  </div>
                  <div class="flex flex-col w-full">
                      <label for="assets-included" class="block mb-2 text-base text-left font-medium text-gray-900 dark:text-white">Assets Included (Asset Description):</label>
                      <div id="selectedAssetDescriptions">-</div>
                  </div>
                </div>
              </form>
            </div>

            <!--Report Details-->
        </div>
        
      </div>
      <!--Lower-Right Div-->
  
    </div>
    <!--Lower Div-->

  </div>
  <!--Main Div-->

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to display selected asset descriptions
        function displaySelectedAssetDescriptions(event) {
            event.preventDefault(); // Prevent the default action (navigation)
            
            const reportTitle = this.dataset.id;
            const assetDescriptions = JSON.parse(this.dataset.assets);

            // Clear the previous contents
            const selectedAssetDescriptionsDiv = document.getElementById('selectedAssetDescriptions');
            selectedAssetDescriptionsDiv.innerHTML = '';

            // Append the selected asset descriptions
            assetDescriptions.forEach(asset => {
                const div = document.createElement('div');
                div.textContent = asset.d_description; // Display description directly
                selectedAssetDescriptionsDiv.appendChild(div);
            });
        }

        // Add event listeners to "Show Details" links
        const showDetailsLinks = document.querySelectorAll('.show-details');
        showDetailsLinks.forEach(link => {
            link.addEventListener('click', displaySelectedAssetDescriptions);
        });
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.show-details').forEach(function(link) {
        link.addEventListener('click', function(event) {
          event.preventDefault();
          const reportId = this.getAttribute('data-id');
          
          // Fetch the report data via AJAX
          fetch(`/report/${reportId}`)
            .then(response => response.json())
            .then(data => {
              // Update the form fields
              document.querySelector('input[name="EmpFirstName"]').value = data.EmpFirstName;
              document.querySelector('input[name="EmpLastName"]').value = data.EmpLastName;
              document.querySelector('input[name="ReportTitle"]').value = data.ReportTitle;
              document.querySelector('input[name="dateRequested"]').value = data.dateRequested;
              document.querySelector('input[name="dateIssued"]').value = data.dateIssued;
              document.querySelector('input[name="d_item_no"]').value = data.d_item_no;
              document.querySelector('select[name="status"]').value = data.status;
              document.querySelector('input[name="d_description"]').value = data.d_description;
              document.querySelector('select[name="d_category"]').value = data.d_category;
              document.querySelector('select[name="AccountClass"]').value = data.AccountClass;
              document.querySelector('input[name="d_date_of_delivery"]').value = data.d_date_of_delivery;
              document.querySelector('input[name="UseLife"]').value = data.UseLife;
              document.querySelector('input[name="d_unit_cost"]').value = data.d_unit_cost;
              document.querySelector('input[name="NetbookVal"]').value = data.NetbookVal;
              document.querySelector('input[name="AccuDep"]').value = data.AccuDep;
              document.querySelector('input[name="YearlyDep"]').value = data.YearlyDep;
              document.querySelector('input[name="MonthlyDep"]').value = data.MonthlyDep;
              document.querySelector('input[name="dateRetired"]').value = data.dateRetired;
              document.querySelector('input[name="PersonCharge"]').value = data.PersonCharge;
              document.querySelector('textarea[name="Remarks"]').value = data.Remarks;
            });
        });
      });
    });
  </script>

  <!--Sort by-->
    <script>
    // Dropdown toggle
    document.querySelectorAll('.dropdown').forEach(function(dropDownWrapper) {
        const dropDownToggler = dropDownWrapper.querySelector('.btn');
        const dropDownList = dropDownWrapper.querySelector('.dropdown-content');

        dropDownToggler.addEventListener('click', function() {
            dropDownList.classList.toggle('hidden');
        });

        // Hide dropdown when clicking outside
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
          // Prevent the default action of anchor tags
          event.preventDefault();
          // Remove all options from the dropdown
          let dropdownContent = document.querySelector('.dropdown-content');
          dropdownContent.innerHTML = '';
          // Add options back to the dropdown, excluding the selected one
          updateDropdownOptions(sortBy);
          // Submit the form after a slight delay to allow label update
          setTimeout(function() {
              document.getElementById('sortForm').submit();
          }, 100);
      }

      // Function to get label for sort option
      function getSortLabel(sortBy) {
          switch (sortBy) {
              case 'report_title':
                  return 'Report Title';
              case 'date_requested':
                  return 'Date Requested';
              case 'date_issued':
                  return 'Date Issued';
              default:
                  return 'Report Title';
          }
      }

      // Function to retrieve current sort criteria from URL
      function getCurrentSortByFromURL() {
          const urlParams = new URLSearchParams(window.location.search);
          return urlParams.get('sort_by') || 'report_title';
      }

      // Function to update dropdown options based on current sort criteria
      function updateDropdownOptions(currentSortBy) {
          let dropdownContent = document.querySelector('.dropdown-content');
          let options = ['report_title', 'date_requested', 'date_issued'];
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

  <!-- PDF Viewer Script -->
  <script>
    function viewPDF(element) {
      const url = element.getAttribute('data-url');
      const pdfViewer = document.getElementById('pdfViewer');
      pdfViewer.data = url;
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
