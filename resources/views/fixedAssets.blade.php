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
    <!--Add Button Modal--> 
    <form action="{{ route('assets.add')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div id="add dialog" class="fixed left=0 top=0 bg-black bg-opacity-50 z-10 w-screen h-screen justify-center items-center opacity-0 hidden transition-opacity duration-500">
      <div class="bg-white rounded-3xl shadow-lg shadow-slate-200 pt-6 px-4 w-[60%] h-[80%] flex flex-col overflow-hidden">
        <div class="flex flex-col gap-4 w-full">
          <div class="flex w-full pt-2 pb-2">
            <div class="flex pb-2">
              <!--Add Validation Trigger-->
              <button onclick="showAddValidDialog()">
                <img class="rounded-s h-9 cursor-pointer" src="storage/assets/Add Button.png" alt="Add">
              </button>
            </div>
            <!--Back Button Modal-->
            <button class="ml-auto" onclick="hideAddDialog()">
              <img class="rounded-s h-8 cursor-pointer" src="storage/assets/Back Button.png" alt="Back">
            </button>
          </div>
        </div>
        <div class="bg-slate-200 rounded-xl p-8 w-full h-[89%] flex flex-col overflow-hidden">
            <div class="flex justify-start my-4">
              <span class="text-lg text-black">Provide data to the following fields. Click ADD FIXED ASSETS when you're done.</span>
            </div>
            <div class="flex gap-4 mb-4 mt-5">
                <!--Form Left-->
                <div class="flex flex-col w-full gap-8">
                    <div class="flex flex-col">
                        <label for="AccountNum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Code</label>
                        <input type="text" name="AccountNum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Item Code" required="">
                    </div>
                    <div class="flex flex-col">
                    <label for="ItemName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Name</label>
                    <input type="text" name="ItemName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Item Name" required="">
                    </div>
                    <div class="flex flex-col">
                        <label for="AccountName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <input type="text" name="AccountName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Category" required="">
                    </div>
                    <div class="flex gap-3">
                      <div class="flex flex-col w-full">
                          <label for="dateAcquired" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Acquired</label>
                          <input type="date" name="dateAcquired" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="mm/dd/yyyy" required="">
                      </div>
                      </div>
                      <div class="flex flex-col">
                        <label for="OrigVal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Original Value</label>
                        <input type="number" name="OrigVal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Original Value" required="">
                      </div>
                </div>
                <!--Form Right-->
                <div class="flex flex-col w-full gap-8">
                    <div class="flex items-center gap-7 pb-2.5 pt-10">
                      <label for="Status" class="block text-sm font-medium text-gray-900 dark:text-white">Item Status:</label>
                    <div class="flex justify-end gap-6">
                        <div class="flex font-medium text-sm">
                        <input type="radio" id="Active" name="Status" value="Active" class="cursor-pointer">
                        <label for="Active" class="cursor-pointer">-Active</label>
                        </div>
                        <div class="flex font-medium text-sm ml-11">
                        <input type="radio" id="Inactive" name="Status" value="Inactive" class="cursor-pointer">
                        <label for="Inactive" class="cursor-pointer">-Inactive</label>
                        </div>
                    </div>
                    </div>
                    <div class="flex items-center gap-10 pb-3 pt-9">
                      <label for="status" class="block text-sm font-medium text-gray-900 dark:text-white">Depreciation:</label>
                    <div class="flex justify-end gap-6">
                        <div class="flex font-medium text-sm mt-1">
                        <input type="radio" id="manual input" name="depreciation" value="manual input" class="cursor-pointer">
                        <label for="manual input" class="cursor-pointer">-Manual Input</label>
                        </div>
                        <div class="flex font-medium text-sm mt-1">
                        <input type="radio" id="automatic input" name="depreciation" value="automatic input" class="cursor-pointer">
                        <label for="automatic input" class="cursor-pointer">-Automatic Input</label>
                        </div>
                    </div>
                    </div>
                    <div class="flex flex-col">
                      <label for="DepVal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Depreciation Value</label>
                      <input type="number" name="DepVal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Depreciation Value" required="">
                    </div>
                    <div class="flex flex-col">
                      <label for="CurrentVal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Value</label>
                      <input type="number" name="CurrentVal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Current Value" required="">
                    </div>
                </div>
              </div>
              <div class="flex justify-end mt-auto">
                <button type="reset" class="p-2 mt-2 rounded-md">Clear Fields</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    
    <!--Add Validation Button Modal--> 
    <div id="add validation dialog" class="fixed left=0 top=0 bg-black bg-opacity-50 z-20 w-screen h-screen justify-center items-center opacity-0 hidden transition-opacity duration-500">
      <div class="bg-white rounded-xl shadow-lg shadow-slate-200 px-8 pt-10 pb-8 w-[30%] h-[25%] flex flex-col overflow-hidden">
        <div class="flex flex-col gap-4 w-full">
          <span class="text-2xl font-semibold text-black">Are you absolutely sure?</span>
          <span class="text-lg text-gray-500">Please make sure that all details are correct. If you wish to proceed, click Yes to add an asset.</span>
          <div class="flex justify-end pt-2 gap-4">
            <button onclick="hideAddValidDialog()">
              <img class="rounded-s h-10 cursor-pointer" src="storage/assets/Cancel.png" alt="Cancel">
            </button>
            <button onclick="hideAddValidDialog(), hideAddDialog(), showAddSuccessDialog()">
              <img class="rounded-s h-10 cursor-pointer" src="storage/assets/Yes.png" alt="Yes">
            </button>
          </div>
        </div>
      </div>
    </div>

    <!--Add Successful Button Modal-->
    <div id="add success dialog" class="fixed left=0 top=0 bg-black bg-opacity-50 z-10 w-screen h-screen justify-center items-center opacity-0 hidden transition-opacity duration-500">
      <div class="bg-white rounded-xl shadow-lg shadow-slate-200 p-8 w-[30%] h-[20%] flex flex-col overflow-hidden">
        <div class="flex flex-col gap-4 w-full">
          <span class="text-2xl font-semibold text-black">Success!</span>
          <span class="text-xl text-gray-500">Asset is added successfully!</span>
          <div class="flex justify-end py-1">
            <button onclick="hideAddSuccessDialog()">
              <img class="rounded-s h-10 cursor-pointer" src="storage/assets/continue.png" alt="Continue">
            </button>
          </div>
        </div>
      </div>
    </div>

    <!--Update Button Modal-->
    <div id="update dialog" class="fixed left=0 top=0 bg-black bg-opacity-50 z-10 w-screen h-screen justify-center items-center opacity-0 hidden transition-opacity duration-500">
      <div class="bg-white rounded-3xl shadow-lg shadow-slate-200 pt-6 px-4 w-[60%] h-[70%] flex flex-col overflow-hidden">
        <div class="flex flex-col gap-4 w-full">
          <div class="flex w-full pt-2 pb-2">
            <div class="flex pb-2">
              <!--Update Validation Trigger-->
              <button onclick="showUpdateValidDialog()">
                <img class="rounded-s h-9 cursor-pointer" src="storage/assets/Update Button.png" alt="Update">
              </button>
              <!--Delete Validation Trigger-->
              <button class="ml-4" onclick="showDeleteValidDialog()">
                <img class="rounded-s h-9 cursor-pointer" src="storage/assets/Delete Button.png" alt="Delete">
              </button>
            </div>
            <!--Back Button Modal-->
            <button class="ml-auto" onclick="hideUpdateDialog()">
              <img class="rounded-s h-8 cursor-pointer" src="storage/assets/Back Button.png" alt="Back">
            </button>
          </div>
        </div>
        <div class="bg-slate-200 rounded-xl p-8 w-full h-[89%] flex flex-col overflow-hidden">
          <form action="">
            <div class="flex justify-start my-4">
              <span class="text-lg text-black">Provide data to the following fields. Click UPDATE FIXED ASSETS when you're done.</span>
            </div>
            <div class="flex gap-4 mb-4 mt-5">
                <!--Form Left-->
                <div class="flex flex-col w-full gap-8">
                    <div class="flex flex-col">
                        <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Code</label>
                        <input type="text" name="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Item Code" required="">
                    </div>
                    <div class="flex flex-col">
                        <label for="item name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Name</label>
                        <input type="text" name="item name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Item Name" required="">
                    </div>
                    
                    <div class="flex gap-3">
                      <div class="flex flex-col w-full">
                          <label for="date acquired" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Acquired</label>
                          <input type="date" name="date acquired" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="mm/dd/yyyy" required="">
                      </div>
                    </div>

                      <div class="flex flex-col">
                        <label for="original value" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Original Value</label>
                        <input type="text" name="original value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Original Value" required="">
                      </div>
                </div>
                <!--Form Right-->
                <div class="flex flex-col w-full gap-8">
                    <div class="flex items-center gap-7 pb-2.5 pt-10">
                      <label for="status" class="block text-sm font-medium text-gray-900 dark:text-white">Account Status:</label>
                    <div class="flex justify-end gap-6">
                        <div class="flex font-medium text-sm">
                        <input type="radio" id="active" name="status" value="active" class="cursor-pointer">
                        <label for="active" class="cursor-pointer">-Active</label>
                        </div>
                        <div class="flex font-medium text-sm ml-11">
                        <input type="radio" id="inactive" name="status" value="inactive" class="cursor-pointer">
                        <label for="inactive" class="cursor-pointer">-Inactive</label>
                        </div>
                    </div>
                    </div>
                    <div class="flex items-center gap-10 pb-3 pt-9">
                      <label for="status" class="block text-sm font-medium text-gray-900 dark:text-white">Depreciation:</label>
                    <div class="flex justify-end gap-6">
                        <div class="flex font-medium text-sm mt-1">
                        <input type="radio" id="manual input" name="depreciation" value="manual input" class="cursor-pointer">
                        <label for="manual input" class="cursor-pointer">-Manual Input</label>
                        </div>
                        <div class="flex font-medium text-sm mt-1">
                        <input type="radio" id="automatic input" name="depreciation" value="automatic input" class="cursor-pointer">
                        <label for="automatic input" class="cursor-pointer">-Automatic Input</label>
                        </div>
                    </div>
                    </div>
                    <div class="flex flex-col">
                      <label for="depreciation value" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Depreciation Value</label>
                      <input type="text" name="depreciation value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Depreciation Value" required="">
                    </div>
                    <div class="flex flex-col">
                      <label for="current value" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Value</label>
                      <input type="text" name="current value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Current Value" required="">
                    </div>
                    
                </div>
              </div>
              <div class="flex justify-end mt-auto">
                <button type="reset" class="p-2 mt-2 rounded-md">Clear Fields</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <!--Update Validation Modal-->
    <div id="update validation dialog" class="fixed left=0 top=0 bg-black bg-opacity-50 z-20 w-screen h-screen justify-center items-center opacity-0 hidden transition-opacity duration-500">
      <div class="bg-white rounded-xl shadow-lg shadow-slate-200 px-8 pt-10 pb-8 w-[30%] h-[25%] flex flex-col overflow-hidden">
        <div class="flex flex-col gap-4 w-full">
          <span class="text-2xl font-semibold text-black">Are you absolutely sure?</span>
          <span class="text-lg text-gray-500">Please make sure that all details are correct. If you wish to proceed, click Yes to update an asset.</span>
          <div class="flex justify-end pt-2 gap-4">
            <button onclick="hideUpdateValidDialog()">
              <img class="rounded-s h-10 cursor-pointer" src="storage/assets/Cancel.png" alt="Cancel">
            </button>
            <button onclick="hideUpdateValidDialog(), hideUpdateDialog(), showUpdateSuccessDialog()">
              <img class="rounded-s h-10 cursor-pointer" src="storage/assets/Yes.png" alt="Yes">
            </button>
          </div>
        </div>
      </div>
    </div>

    <!--Update Successful Modal-->
    <div id="update success dialog" class="fixed left=0 top=0 bg-black bg-opacity-50 z-10 w-screen h-screen justify-center items-center opacity-0 hidden transition-opacity duration-500">
      <div class="bg-white rounded-xl shadow-lg shadow-slate-200 p-8 w-[30%] h-[20%] flex flex-col overflow-hidden">
        <div class="flex flex-col gap-4 w-full">
          <span class="text-2xl font-semibold text-black">Success!</span>
          <span class="text-xl text-gray-500">Asset is updated successfully!</span>
          <div class="flex justify-end py-1">
            <button onclick="hideUpdateSuccessDialog()">
              <img class="rounded-s h-10 cursor-pointer" src="storage/assets/continue.png" alt="Continue">
            </button>
          </div>
        </div>
      </div>
    </div>

    <!--Delete Validation Modal-->
    <div id="delete validation dialog" class="fixed left=0 top=0 bg-black bg-opacity-50 z-20 w-screen h-screen justify-center items-center opacity-0 hidden transition-opacity duration-500">
      <div class="bg-white rounded-xl shadow-lg shadow-slate-200 px-8 pt-10 pb-8 w-[30%] h-[25%] flex flex-col overflow-hidden">
        <div class="flex flex-col gap-4 w-full">
          <span class="text-2xl font-semibold text-black">Are you absolutely sure?</span>
          <span class="text-lg text-gray-500">Please make sure that all details are correct. If you wish to proceed, click Yes to delete an asset.</span>
          <div class="flex justify-end pt-2 gap-4">
            <button onclick="hideDeleteValidDialog()">
              <img class="rounded-s h-10 cursor-pointer" src="storage/assets/Cancel.png" alt="Cancel">
            </button>
            <button onclick="hideDeleteValidDialog(), hideUpdateDialog(), showDeleteSuccessDialog()">
              <img class="rounded-s h-10 cursor-pointer" src="storage/assets/Yes2.png" alt="Yes2">
            </button>
          </div>
        </div>
      </div>
    </div>

    <!--Delete Successful Modal-->
    <div id="delete success dialog" class="fixed left=0 top=0 bg-black bg-opacity-50 z-10 w-screen h-screen justify-center items-center opacity-0 hidden transition-opacity duration-500">
      <div class="bg-white rounded-xl shadow-lg shadow-slate-200 p-8 w-[30%] h-[20%] flex flex-col overflow-hidden">
        <div class="flex flex-col gap-4 w-full">
          <span class="text-2xl font-semibold text-black">Success!</span>
          <span class="text-xl text-gray-500">Asset has been successfully deleted!</span>
          <div class="flex justify-end py-1">
            <button onclick="hideDeleteSuccessDialog()">
              <img class="rounded-s h-10 cursor-pointer" src="storage/assets/continue.png" alt="Continue">
            </button>
          </div>
        </div>
      </div>
    </div>

    <!--View Depreciation Modal-->
    <div id="depreciation dialog" class="fixed left=0 top=0 bg-black bg-opacity-50 z-10 w-screen h-screen justify-center items-center opacity-0 hidden transition-opacity duration-500">
      <div class="bg-white rounded-3xl shadow-lg shadow-slate-200 pt-6 px-4 w-[60%] h-[70%] flex flex-col overflow-hidden">
        <div class="flex flex-col gap-4 w-full">
          <div class="flex justify-start pt-2 pb-2 gap-4">
            <!--Time Selection Modal-->
            <div id="accordion" class="h-full w-36 flex flex-col">
              <nav class="flex flex-col h-full w-full">
                <!--Time Selection-->
                <div class="item2 -mt-1 fixed">
                  <div class="header font-bold flex items-center cursor-pointer rounded-xl  text-white bg-indigo-800  border-2 border-slate-600 hover:bg-indigo-900">
                    <div class="flex items-center py-1 pl-4 gap-3">
                      <span class="w-full text-xl font-normal leading-7 transition duration-300">Monthly</span>
                    </div>
                    <img class="inactiveIcon w-3 h-2 ml-7" src="storage/assets/dropdown.png">
                    <img class="activeIcon w-3 h-2 ml-7" src="storage/assets/flyup.png">
                  </div>

                  <div class="content font-medium transition-all bg-indigo-800 rounded-xl duration-500 flex flex-col gap-2">
                    <a href="" class="w-32 h-fit px-2 rounded-md  text-white hover:bg-indigo-900">Quarterly</a>
                    <a href="" class="w-32 h-fit px-2 rounded-md  text-white hover:bg-indigo-900">Annually</a>
                  </div>
                </div>
              </nav>
            </div>
            <!--Back Button Modal-->
            <button class="ml-auto" onclick="hideDepreciationDialog()">
              <img class="rounded-s h-8 cursor-pointer" src="storage/assets/Back Button.png" alt="Back">
            </button>
          </div>
        </div>
        <div class="bg-slate-200 rounded-xl shadow-lg shadow-slate-100 mt-2 p-8 w-full h-[89%] flex flex-col overflow-hidden">
        </div>
      </div>
    </div>

    <!--Import Button Modal-->


    <!--Export Button Modal-->


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
                    <button onclick="showAddDialog()">
                      <img class="w-50 h-10" src="storage/assets/Add Button.png" alt="Add Button">
                    </button>
                    <!--Update Button Trigger-->
                    <button onclick="showUpdateDialog()">
                      <img class="w-50 h-10" src="storage/assets/Update Button.png" alt="Update Button">
                    </button>
                    <!--View Depreciation Button Trigger-->
                    <button onclick="showDepreciationDialog()">
                      <img class="w-50 h-10" src="storage/assets/View Depreciation.png" alt="View Depreciation Button">
                    </button>
                    <!--Import Button Trigger-->
                    <button onclick="showImportDialog()">
                      <img class="w-50 h-10" src="storage/assets/Import Button.png" alt="Import Button">
                    </button>
                    <!--Export Button Trigger-->
                    <button onclick="showExportDialog()">
                        <a class="w-50 h-10" href="{{route('exportPDF')}}">Export to PDF</a>
                    </button>
                    <a href="{{route('export')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">Export to Excel</a>
                    <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="fixed_assets" required>
                        <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">Import Excel</button>
                    </form>

                    <form action ="{{url('search')}}" method="GET">
                    <div class="relative flex items-center space-x-4 ml-auto">
                      <input type="search" name="search" class="block w-72 h-10 rounded-lg border-0 pl-11 pr-4 bg-zinc-100 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search Asset">
                      <input type="submit" value="Search">
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
                  <th class="w-40 border border-slate-100">Item Code</th>
                  <th class="w-80 border rowtext-margin text-left border-slate-100">Item Name</th>
                  <th class="w-64 border rowtext-margin text-left border-slate-100">Category</th>
                  <th class="w-32 border rowtext-margin text-left border-slate-100">Status</th>
                  <th class="w-44 border rowtext-margin text-left border-slate-100">Date Acquired</th>
                  <th class="w-44 border rowtext-margin text-left border-slate-100">Original Value</th>
                  <th class="w-44 border rowtext-margin text-left border-slate-100">Current Value</th>
                  <th class="w-44 border rowtext-margin text-left border-slate-100">Depreciation Value</th>
                  <th class="w-44 border rowtext-margin text-left border-slate-100">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white">
              @foreach($fixedassets as $data)
                <tr class="h-8 hover:bg-gray-300">
                  <td class="border text-center border-slate-100">{{$data->AccountNum}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->ItemName}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->AccountName}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->Status}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->dateAcquired}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->OrigVal}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->CurrentVal}}</td>
                  <td class="border rowtext-margin border-slate-100">{{$data->DepVal}}</td>
                  <td>
                    <a href="{{ url('editAssets/'.$data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form method="POST" action="{{ route('assets.destroy', $data->id)}}">            
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form> 
                  </td> 
                </tr>
            @endforeach
                <tr class="h-8 hover:bg-gray-300">
                  <td class="border text-center border-slate-100">Text</td>
                  <td class="border rowtext-margin border-slate-100">Very Long Item Name</td>
                  <td class="border rowtext-margin border-slate-100">Very Long Category Name</td>
                  <td class="border rowtext-margin border-slate-100">Text</td>
                  <td class="border rowtext-margin border-slate-100">Text</td>
                  <td class="border rowtext-margin border-slate-100">Text</td>
                  <td class="border rowtext-margin border-slate-100">Text</td>
                  <td class="border rowtext-margin border-slate-100">Text</td>
                </tr>
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

  <!--Add Modal Script-->
  <script>
    function showAddDialog(){
      let dialog = document.getElementById('add dialog');
      dialog.classList.remove('hidden');
      dialog.classList.add('flex');
      setTimeout(() => {
      dialog.classList.add('opacity-100');
      }, 20);
    }

    function hideAddDialog(){
      let dialog = document.getElementById('add dialog');
      dialog.classList.add('opacity-0');
      dialog.classList.remove('opacity-100');
      setTimeout(() => {
      dialog.classList.add('hidden');
      dialog.classList.remove('flex');
      }, 500);
    }
  </script>

  <!--Add Validation Modal Script-->
  <script>
    function showAddValidDialog(){
      let dialog = document.getElementById('add validation dialog');
      dialog.classList.remove('hidden');
      dialog.classList.add('flex');
      setTimeout(() => {
      dialog.classList.add('opacity-100');
      }, 20);
    }

    function hideAddValidDialog(){
      let dialog = document.getElementById('add validation dialog');
      dialog.classList.add('opacity-0');
      dialog.classList.remove('opacity-100');
      setTimeout(() => {
      dialog.classList.add('hidden');
      dialog.classList.remove('flex');
      }, 500);
    }
  </script>

  <!--Add Successful Modal Script-->
  <script>
    function showAddSuccessDialog(){
      let dialog = document.getElementById('add success dialog');
      dialog.classList.remove('hidden');
      dialog.classList.add('flex');
      setTimeout(() => {
      dialog.classList.add('opacity-100');
      }, 20);
    }

    function hideAddSuccessDialog(){
      let dialog = document.getElementById('add success dialog');
      dialog.classList.add('opacity-0');
      dialog.classList.remove('opacity-100');
      setTimeout(() => {
      dialog.classList.add('hidden');
      dialog.classList.remove('flex');
      }, 500);
    }
  </script>

  <!--Update Asset Modal Script-->
  <script>
    function showUpdateDialog(){
      let dialog = document.getElementById('update dialog');
      dialog.classList.remove('hidden');
      dialog.classList.add('flex');
      setTimeout(() => {
      dialog.classList.add('opacity-100');
      }, 20);
    }

    function hideUpdateDialog(){
      let dialog = document.getElementById('update dialog');
      dialog.classList.add('opacity-0');
      dialog.classList.remove('opacity-100');
      setTimeout(() => {
      dialog.classList.add('hidden');
      dialog.classList.remove('flex');
      }, 500);
    }
  </script>
  
  <!--Update Validation Modal Script-->
  <script>
    function showUpdateValidDialog(){
      let dialog = document.getElementById('update validation dialog');
      dialog.classList.remove('hidden');
      dialog.classList.add('flex');
      setTimeout(() => {
      dialog.classList.add('opacity-100');
      }, 20);
    }

    function hideUpdateValidDialog(){
      let dialog = document.getElementById('update validation dialog');
      dialog.classList.add('opacity-0');
      dialog.classList.remove('opacity-100');
      setTimeout(() => {
      dialog.classList.add('hidden');
      dialog.classList.remove('flex');
      }, 500);
    }
  </script>

  <!--Update Successful Modal Script-->
  <script>
    function showUpdateSuccessDialog(){
      let dialog = document.getElementById('update success dialog');
      dialog.classList.remove('hidden');
      dialog.classList.add('flex');
      setTimeout(() => {
      dialog.classList.add('opacity-100');
      }, 20);
    }

    function hideUpdateSuccessDialog(){
      let dialog = document.getElementById('update success dialog');
      dialog.classList.add('opacity-0');
      dialog.classList.remove('opacity-100');
      setTimeout(() => {
      dialog.classList.add('hidden');
      dialog.classList.remove('flex');
      }, 500);
    }
  </script>

  <!--Delete Validation Modal Script-->
  <script>
    function showDeleteValidDialog(){
      let dialog = document.getElementById('delete validation dialog');
      dialog.classList.remove('hidden');
      dialog.classList.add('flex');
      setTimeout(() => {
      dialog.classList.add('opacity-100');
      }, 20);
    }

    function hideDeleteValidDialog(){
      let dialog = document.getElementById('delete validation dialog');
      dialog.classList.add('opacity-0');
      dialog.classList.remove('opacity-100');
      setTimeout(() => {
      dialog.classList.add('hidden');
      dialog.classList.remove('flex');
      }, 500);
    }
  </script>

  <!--Delete Success Modal Script-->
  <script>
    function showDeleteSuccessDialog(){
      let dialog = document.getElementById('delete success dialog');
      dialog.classList.remove('hidden');
      dialog.classList.add('flex');
      setTimeout(() => {
      dialog.classList.add('opacity-100');
      }, 20);
    }

    function hideDeleteSuccessDialog(){
      let dialog = document.getElementById('delete success dialog');
      dialog.classList.add('opacity-0');
      dialog.classList.remove('opacity-100');
      setTimeout(() => {
      dialog.classList.add('hidden');
      dialog.classList.remove('flex');
      }, 500);
    }
  </script>

  <!--View Depreciation Modal Script-->
  <script>
    function showDepreciationDialog(){
      let dialog = document.getElementById('depreciation dialog');
      dialog.classList.remove('hidden');
      dialog.classList.add('flex');
      setTimeout(() => {
      dialog.classList.add('opacity-100');
      }, 20);
    }

    function hideDepreciationDialog(){
      let dialog = document.getElementById('depreciation dialog');
      dialog.classList.add('opacity-0');
      dialog.classList.remove('opacity-100');
      setTimeout(() => {
      dialog.classList.add('hidden');
      dialog.classList.remove('flex');
      }, 500);
    }
  </script>

  <!--Import Depreciation Modal Script-->


  <!--Export Depreciation Modal Script-->


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