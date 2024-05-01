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
          margin-left: 34px;
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
              <a href="supplies" class="w-48 h-fit px-2 rounded-md hover:bg-neutral-100 hover:text-black">Supplies</a>
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
            <div class="mx-4 w-fit h-fit text-4xl font-regular">Reports</div>
            <img class="my-4 w-8 h-6" src="storage/assets/arrowright.png">
            <div class="mx-2 w-auto h-fit text-4xl font-semibold">Generate Reports</div>
          </div>
        </div>
        <!--Title-->

        <div class="flex h-[85%] mb-4 mr-5">
            <!--Generate Report Format-->
            <div class="tab flex flex-col h-full w-full mb-auto ml-4 px-4 py-3 bg-white rounded-2xl shadow-lg">
              <form action="" method="" class="p-2 w-full h-auto">
                <div class="flex flex-col gap-4 mt-2">
                  <div class="flex gap-3 mb-3">
                    <div class="flex flex-col w-full">
                        <label for="employee name" class="block text-start mb-2 text-base font-medium text-gray-900 dark:text-white">Employee Name</label>
                        <input type="text" name="employee name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="First Name" required="">
                    </div>
                    <div class="last-name flex flex-col w-full">
                        <input type="text" name="employee name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Last Name" required="">
                    </div>
                  </div>
                  <div class="flex flex-col mb-3">
                      <label for="report title" class="block text-start mb-2 text-base font-medium text-gray-900 dark:text-white">Report Title</label>
                      <input type="text" name="report title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Report Title" required="">
                  </div>
                  <div class="flex gap-3 mb-3">
                    <div class="flex flex-col w-full">
                      <label for="date requested" class="block text-start mb-2 text-base font-medium text-gray-900 dark:text-white">Date Requested</label>
                      <input type="date" name="date requested" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="dd/mm/yyyy" required="">
                    </div>
                    <div class="flex flex-col w-full">
                      <label for="date issued" class="block text-start mb-2 text-base font-medium text-gray-900 dark:text-white">Date Issued</label>
                      <input type="date" name="date issued" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="dd/mm/yyyy" required="">
                    </div>
                  </div>
                  <div class="flex items-center justify-center gap-10">
                    <label for="status" class="block text-base font-medium text-gray-900 dark:text-white">Graphical Presentation:</label>
                    <div class="flex justify-end">
                        <div class="flex font-medium text-sm">
                        <input type="radio" name="radio-1" class="radio radio-sm" checked />
                        <label for="active" class="cursor-pointer">-Tabular Data</label>
                        </div>
                        <div class="flex font-medium text-sm ml-11">
                        <input type="radio" name="radio-1" class="radio radio-sm" />
                        <label for="inactive" class="cursor-pointer">-Line Graph</label>
                        </div>
                    </div>
                  </div>
                  <div class="flex justify-center gap-10 pb-2">
                    <label for="status" class="block text-base font-medium text-gray-900 dark:text-white">Time Division:</label>
                    <div class="flex justify-end gap-10">
                        <div class="flex font-medium text-sm mt-1">
                        <input type="radio" name="radio-2" class="radio radio-sm" checked />
                        <label for="manual input" class="cursor-pointer">-In Months</label>
                        </div>
                        <div class="flex font-medium text-sm mt-1">
                        <input type="radio" name="radio-2" class="radio radio-sm" />
                        <label for="automatic input" class="cursor-pointer">-In Years</label>
                        </div>
                    </div>
                  </div>
                  <div>
                    <div class="remarks flex flex-col mb-3">
                      <label for="remarks" class="block text-base font-medium text-gray-900 dark:text-white">Remarks</label>
                      <textarea id="remarks" rows="5" name="remarks" class="bg-gray-50 border scroll-container border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-auto p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Remarks" required=""></textarea>
                    </div>
                  </div>
                </div>


                <div class="flex flex-col flex-1 justify-center items-center gap-3">
                  <button type="button" onclick="" class="w-48 h-12 px-4 py-2 bg-indigo-800 hover:bg-indigo-900 rounded-md shadow items-center gap-2 flex">
                    <img src="storage/assets/Generate.png" alt="Print Button" class="generate h-6">
                    <div class="text-white text-base font-medium leading-normal">GENERATE</div>
                  </button>
                  <button type="button" onclick="" class="w-48 h-12 px-4 py-2 bg-indigo-800 hover:bg-indigo-900 rounded-md shadow items-center gap-2 flex">
                    <img src="storage/assets/Print Icon.png" alt="Print Button" class="print h-6">
                    <div class="text-white text-base font-medium leading-normal">PRINT</div>
                  </button>
                  <button type="button" onclick="" class="w-48 h-12 px-4 py-2 bg-indigo-800 hover:bg-indigo-900 rounded-md shadow items-center gap-2 flex">
                    <img src="storage/assets/Save Icon.png" alt="Save Button" class="save h-6">
                    <div class="text-white text-base font-medium leading-normal">SAVE</div>
                  </button>
                </div>
              </form>
            </div>
            <!--Generate Report Format-->
            <!--Scroll Menu-->
            <div class="flex flex-col h-full w-auto mb-auto ml-4 px-4 py-3 bg-white rounded-2xl shadow-lg">
              <div class="flex ml-2 justify-between items-center border-8 border-white">
                <div class="flex items-center justify-start">
                  <div>
                    <label for="sort">Sort By: </label>
                  </div>
                  <div class="dropdown dropdown-hover">
                    <div tabindex="0" role="button" class="btn ml-2">Asset Code</div>
                    <ul tabindex="0" class="dropdown-content z-[1] menu shadow bg-base-100 rounded-box w-52">
                      <li><a>Asset Description</a></li>
                      <li><a>Date Acquired</a></li>
                    </ul>
                  </div>
                </div>
                <div class="form-control">
                  <label class="label cursor-pointer">
                    <span class="label-text mr-2">Select All</span> 
                    <input type="checkbox" checked="checked" class="checkbox checkbox-sm" />
                  </label>
                </div>
              </div>
              <div class="overflow-auto border-8 items-center border-white scroll-container" style="max-height: 900px;">
                <div class="ml-4 mr-4 mb-4 w-auto shadow-lg">
                  <div class="vertical-menu scroll-container rounded-xl">
                    <a href="#">Recently Viewed 1</a>
                    <a href="#">Recently Viewed 2</a>
                    <a href="#">Recently Viewed 3</a>
                    <a href="#">Recently Viewed 4</a>
                    <a href="#">Recently Viewed 5</a>
                    <a href="#">Recently Viewed 6</a>
                    <a href="#">Recently Viewed 7</a>
                    <a href="#">Recently Viewed 8</a>
                    <a href="#">Recently Viewed 9</a>
                    <a href="#">Recently Viewed 10</a>
                    <a href="#">Recently Viewed 11</a>
                    <a href="#">Recently Viewed 12</a>
                    <a href="#">Recently Viewed 13</a>
                    <a href="#">Recently Viewed 14</a>
                    <a href="#">Recently Viewed 15</a>
                    <a href="#">Recently Viewed 16</a>
                    <a href="#">Recently Viewed 17</a>
                    <a href="#">Recently Viewed 18</a>
                    <a href="#">Recently Viewed 19</a>
                    <a href="#">Recently Viewed 20</a>
                    <a href="#">Recently Viewed 21</a>
                    <a href="#">Recently Viewed 22</a>
                    <a href="#">Recently Viewed 23</a>
                    <a href="#">Recently Viewed 24</a>
                    <a href="#">Recently Viewed 25</a>
                    <a href="#">Recently Viewed 26</a>
                    <a href="#">Recently Viewed 27</a>
                    <a href="#">Recently Viewed 28</a>
                    <a href="#">Recently Viewed 29</a>
                    <a href="#">Recently Viewed 30</a>
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