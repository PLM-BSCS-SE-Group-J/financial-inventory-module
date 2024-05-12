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
          width: 500px;
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
      .vertical-menu a:nth-child(even){
          background-color: #FFFFFF;
      }
      .vertical-menu a:hover{
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
              </div>
              <div class="overflow-auto border-8 items-center border-white scroll-container" style="max-height: 900px;">
                <div class="ml-4 mr-4 mb-4 w-auto shadow-lg">
                  <div class="vertical-menu scroll-container rounded-xl">
                    @foreach($fixedassets as $data)
                      <a href="#">{{$data->AssetCode}}</a>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <!--Scroll Menu-->

            <!--PDF Viewer-->
            <div class="h-full w-full ml-4 rounded-2xl shadow-lg scroll-container">
                <object data="Inventory Module (Financial System) Documentation.pdf" type="application/pdf" class="flex justify-center items-center h-full w-full">
                    <p class="py-2 px-4 bg-gold rounded-md">Unable to display PDF file. <a href=""><strong><u>Download</u></strong></a> instead.</p>
                </object>
            </div>
            <!--PDF Viewer-->
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
