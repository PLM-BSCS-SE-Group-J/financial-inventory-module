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
              <img class="rounded-s h-10 cursor-pointer" src="{{asset('storage/assets/Cancel.png')}}" alt="Cancel">
            </button>
            <button onclick="document.location='Login Page.html'">
              <img class="rounded-s h-10 cursor-pointer" src="{{asset('storage/assets/Log Out.png')}}" alt="Yes">
            </button>
          </div>
        </div>
      </div>
    </div>

    <!--Main Div-->

    <!--Header-->
    <nav class="flex items-center justify-between bg-white py-1 px-4">
    <div class="flex items-center space-x-4">
      <img class="w-116 h-20 rounded-xl" style="margin:10px" src="{{asset('storage/assets/PLM LOGO.png')}}" alt="Logo">
    </div>
    <div class="relative flex items-center space-x-4 ml-auto">
      <input type="text" class="block w-full h-10 rounded-lg border-0 py-1.5 pl-11 pr-24 bg-zinc-100 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search Here">
      <img class="absolute top-1/2 transform -translate-y-1/2 w-5 h-5" src="{{asset('storage/assets/search.png')}}" alt="Search Icon">
    </div>
    <div class="flex items-center space-x-4 ml-8 pr-8">
      <img class="w-10 h-10" src="{{asset('storage/assets/usericon.png')}}" alt="Profile Picture">
      <span class="text-lg text-gray-500">Mara Calinao</span>
      <img class="w-3 h-2" src="{{asset('storage/assets/dropdowndark.png')}}" alt="arrow down">
    </div>
    </nav>
    <!--Header-->

    <!--Lower Div-->
    <div class="flex w-auto h-screen">

      <!--Lower-Right Div-->
      <div class="flex flex-col w-screen">
        <img class="absolute w-full h-full opacity-60" src="{{asset('storage/assets/plm.jpg')}}">
        <!--Title-->
        <div class="flex justify-center">
          <div class="flex h-24 relative w-[50%] m-4 px-4 py-3 items-center bg-white rounded-2xl shadow-2xl">
            <div class="flex h-24 w-5/6 px-5 items-center">
              <div class="mx-4 w-fit h-fit text-4xl font-regular">Assets</div>
              <img class="my-4 w-8 h-6" src="{{asset('storage/assets/arrowright.png')}}">
              <div class="mx-2 w-auto h-fit text-4xl font-regular">Fixed Assets</div>
              <img class="my-4 w-8 h-6" src="{{asset('storage/assets/arrowright.png')}}">
              <div class="mx-2 w-auto h-fit text-4xl font-semibold">View Asset</div>
            </div>
          </div>
        </div>
        <!--Title-->

        <div class="flex h-[85%] mb-4 justify-center">
            <!--Generate Report Format-->
            <div class="tab flex flex-col h-full w-[50%] mb-auto px-4 py-3 bg-white rounded-2xl shadow-lg">
              <div class="jumbotron h-full w-full flex flex-col justify-start p-4">
                <form action="{{ url('updateAssets/'.$fixedassets->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex gap-3 w-full">
                      <div class="form-group mb-3 w-full">
                          <label class="block mb-2 text-base text-left font-medium text-gray-900 dark:text-white">Asset Code</label>
                          <input type="text" name="AssetCode" value="{{$fixedassets->AssetCode}}" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Asset Code" required=""> 
                      </div>
                      <div class="form-group mb-3 w-full">
                          <label class="block mb-2 text-base text-left font-medium text-gray-900 dark:text-white">Status</label>
                          <select name="status" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                              <option value="" disabled selected>Select Status</option>
                              <option value="Active" {{$fixedassets->status == "Active" ? 'selected' : ''}}>Active</option>
                              <option value="Inactive" {{$fixedassets->status == "Inactive" ? 'selected' : ''}}>Inactive</option>
                          </select> 
                      </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="block mb-2 text-base text-left font-medium text-gray-900 dark:text-white">Asset Description</label>
                        <input type="text" name="AssetDesc" value="{{$fixedassets->AssetDesc}}" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Asset Description" required=""> 
                    </div>
                    <div class="form-group mb-3">
                        <label class="block mb-2 text-base text-left font-medium text-gray-900 dark:text-white">Account Title</label>
                        <input type="text" name="AccountTitle" value="{{$fixedassets->AccountTitle}}" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Account Title" required=""> 
                    </div>
                    <div class="flex gap-3 w-full">
                      <div class="form-group mb-3 w-full">
                          <label class="block mb-2 text-left text-base font-medium text-gray-900 dark:text-white">Account Classification</label>
                          <input type="text" name="AccountClass" value="{{$fixedassets->AccountClass}}" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Account Classification" required=""> 
                      </div>
                      <div class="form-group mb-3 w-full">
                          <label class="block mb-2 text-base text-left font-medium text-gray-900 dark:text-white">Date Acquired</label>
                          <input type="date" name="dateAcquired" value="{{$fixedassets->dateAcquired}}" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required=""> 
                      </div>
                      <div class="form-group mb-3 w-full">
                          <label class="block mb-2 text-left text-base font-medium text-gray-900 dark:text-white">UseLife</label>
                          <input type="number" name="UseLife" value="{{$fixedassets->UseLife}}" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Account Classification" required=""> 
                      </div>
                    </div>
                    <div class="flex gap-3 w-full">
                      <div class="form-group mb-3 w-full">
                          <label class="block mb-2 text-base text-left font-medium text-gray-900 dark:text-white">Original Cost</label>
                          <input type="number" name="OrigCost" value="{{$fixedassets->OrigCost}}" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Original Cost" required=""> 
                      </div>
                      <div class="form-group mb-3 w-full">
                          <label class="block mb-2 text-base text-left font-medium text-gray-900 dark:text-white">Netbook Value</label>
                          <input type="number" name="NetbookVal" value="{{$fixedassets->NetbookVal}}" readonly class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required=""> 
                      </div>
                    </div>
                    <div class="flex gap-3 w-full">
                      <div class="form-group mb-3 w-full">
                          <label class="block mb-2 text-left text-base font-medium text-gray-900 dark:text-white">Accumulated Depreciation</label>
                          <input type="number" name="AccuDep" value="{{$fixedassets->AccuDep}}" readonly class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required=""> 
                      </div>
                      <div class="form-group mb-3 w-full">
                          <label class="block mb-2 text-left text-base font-medium text-gray-900 dark:text-white">Yearly Depreciation</label>
                          <input type="number" name="YearlyDep" value="{{$fixedassets->YearlyDep}}" readonly class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required=""> 
                      </div>
                      <div class="form-group mb-3 w-full">
                          <label class="block mb-2 text-left text-base font-medium text-gray-900 dark:text-white">Monthly Depreciation</label>
                          <input type="number" name="MonthlyDep" value="{{$fixedassets->MonthlyDep}}" readonly class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required=""> 
                      </div>
                    </div>
                    <div class="flex gap-3 mb-3 w-full">
                      <div class="form-group mb-3 w-full">
                          <label class="block mb-2 text-base text-left font-medium text-gray-900 dark:text-white">Date of Retirement</label>
                          <input type="date" name="dateRetired" value="{{$fixedassets->dateRetired}}" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required=""> 
                      </div>
                      <div class="form-group mb-3 w-full">
                          <label class="block mb-2 text-left text-base font-medium text-gray-900 dark:text-white">Person in Charge</label>
                          <input type="text" name="PersonCharge" value="{{$fixedassets->PersonCharge}}" readonly class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Person in Charge" required=""> 
                      </div>
                    </div>
                    <div class="form-group mt-8">
                          <button type="submit">
                            <img class="w-50 h-10" src="{{asset('storage/assets/Update Button.png')}}">
                          </button>
                    </div>
                </form>
              </div>
            </div>
            <!--Generate Report Format-->

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

</body>

</html>
