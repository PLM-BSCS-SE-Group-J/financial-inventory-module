<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Financial Inventory</title>
    <link rel="stylesheet" href="./dist/output.css">
</head>

<style>
  .rowtext-margin {
    padding-left: 10px;
}
</style>

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
            <div class="mx-2 w-auto h-fit text-4xl font-semibold">Accounts</div>
          </div>
        </div>
        <!--Title-->
        <!--Fixed Assets Table-->
        <div class="flex flex-col h-full mb-4 mx-4 px-4 py-3 bg-white rounded-2xl shadow-lg">
          <div class="overflow-auto h-full border-8 border-white scroll-container">
            <table class="table-fixed ml-4 mr-4  mb-4 mt-4 w-[98%] shadow-lg border-collapse border border-slate-300">
              <div class="flex items-center justify-between mr-4">
                <div class="relative flex text-center space-x-4 ml-4 mt-4">
                  <div class="mx-2 h-fit text-2xl text-center font-semibold">Account Classifications</div>
                </div>
                <a href="addAccounts">
                  <img class="h-10 mt-4" src="storage/assets/Add Classification.png" alt="Add Classification">
                </a>
              </div>
              <!--Search Bar-->
              <div class="flex justify-between mx-4 mt-4">
                <label class="input input-bordered w-full flex items-center gap-2">
                  <input type="text" class="grow" placeholder="Search" />
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg>
                </label>
                <button class="btn ml-4">Reset</button>
              </div>
              <!--Search Bar--> 
              <thead class="bg-slate-100 sticky top-0">
                <tr class="h-10">
                  <th class="border rowtext-margin text-left border-slate-100">Account Title</th>
                  <th class="border rowtext-margin text-left border-slate-100">Account Classification</th>
                  <th class="border rowtext-margin text-left border-slate-100">Useful Life</th>
                  <th class="border rowtext-margin text-left border-slate-100">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                <tr class="h-8 hover:bg-gray-300">
                  <td class="border rowtext-margin border-slate-100">text</td>
                  <td class="border rowtext-margin border-slate-100">text</td>
                  <td class="border rowtext-margin border-slate-100">text</td>
                  <td class="border rowtext-margin border-slate-100 flex flex-col rowtext-margin">
                    <a href="editAccounts" class="text-indigo-800 underline">View</a>
                    <form method="POST" action="">            
                        @csrf
                        @method('delete')
                        <button class="text-indigo-800 underline">Delete</button>
                    </form> 
                  </td> 
                </tr>
                <tr class="h-8 hover:bg-gray-300">
                  <td class="border rowtext-margin border-slate-100">text</td>
                  <td class="border rowtext-margin border-slate-100">text</td>
                  <td class="border rowtext-margin border-slate-100">text</td>
                  <td class="flex flex-col rowtext-margin">
                    <a href="editAccounts" class="text-indigo-800 underline">View</a>
                    <form method="POST" action="">            
                        @csrf
                        @method('delete')
                        <button class="text-indigo-800 underline">Delete</button>
                    </form> 
                  </td> 
                </tr>
              </tbody>
            </table>
            <!--Page Button-->
            <div class="flex justify-end mr-4">
              <div class="join items-end">
                <button class="join-item btn btn-active btn-sm">1</button>
                <button class="join-item btn btn-sm">2</button>
                <button class="join-item btn btn-sm">3</button>
                <button class="join-item btn btn-sm">4</button>
              </div>
            </div>
            <!--Page Button-->
          </div>
          
        </div>
        <!--Fixed Assets Table-->
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

</body>

</html>