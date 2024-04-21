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
      .assets-dashboard {
          height: 500px;
          margin-bottom: 0;
      }
      .reports-dashboard {
          margin-bottom: 20px;
      }
      .interact-dashboard {
          width: 800px;
          margin-bottom: 20px;
          margin-top: 15px;
          margin-right: 15px;
      }
      .image-size {
          margin-top: -20px;
          height: 250px;
          margin-bottom: -20px;
      }
      .image-format1 {
          margin-top: 30px;
          margin-left: 20px;
          height: 30px;
          width: 195px;
      }
      .image-format2 {
          margin-top: 20px;
          margin-bottom: -20px;
          margin-left: 20px;
          height: 33px;
          width: 195px;
      }
      .quotes-format {
          margin-left: 60px;
          margin-right: 60px;
          margin-bottom: -20px;
      }
      .assetbuttonsize1 {
          height: 255px;
          margin-top: -10px;
          margin-bottom: 20px;
      }
      .assetbuttonsize2 {
          height: 255px;
          margin-top: -5px;
          margin-bottom: 20px;
      }
      .assetbuttonsize3 {
          height: 255px;
          margin-bottom: -15px;
          margin-right: 10px;
      }
      .assetbuttonsize4 {
          height: 255px;
          margin-right: 10px;
      }
      .vertical-menu {
          width: 350px;
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
      .vertical-menu-container {
          height: auto;
          margin-left: -15px;
          margin-bottom: 35px;
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
  <!--Main Div-->
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
            <button onclick="document.location='loginPage'">
              <img class="rounded-s h-10 cursor-pointer" src="storage/assets/Log Out.png" alt="Yes">
            </button>
          </div>
        </div>
      </div>
    </div>
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
    <div class="flex h-screen">
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
      <div class="flex w-screen bg-neutral-200">
        <div class="flex flex-col w-full h-screen">  
          <div class="assets-dashboard flex w-auto my-4 mx-4 bg-white rounded-2xl shadow-lg">
            <div class="flex flex-col">
              <img class="image-format1 justify-start" src="storage/assets/assets dashboard.png">
              <div class="flex items-center">
                <button onclick="document.location='fixedAssets'">
                  <img class="assetbuttonsize1 -mt-1" src="storage/assets/Check Fixed Assets (1).png">
                </button>
                <button onclick="document.location='supplies'">
                  <img class="assetbuttonsize2 mt-2" src="storage/assets/Check Supplies (1).png">
                </button>
              </div>
            </div>
          </div>
          <div class="flex h-full">
            <div class="reports-dashboard flex w-full my-4 mx-4 bg-white rounded-2xl shadow-lg">
              <div class="flex flex-col">
                <img class="image-format2" src="storage/assets/reports dashboard.png">
                <div class="flex flex-col items-center">
                  <button onclick="document.location='genReport'">
                    <img class="assetbuttonsize3 -mt-1" src="storage/assets/Generate Reports (1).png">
                  </button>
                  <button onclick="document.location='viewReport'">
                    <img class="assetbuttonsize4 mt-0" src="storage/assets/View All Reports (1).png">
                  </button>
                </div>
              </div>
            </div>
            <div class="interact-dashboard h-auto flex flex-col mb-2 bg-white rounded-2xl justify-between shadow-lg">
              <div class="flex flex-col items-center mt-5 pt-2">
                <p class="text-indigo-900 font-semibold text-4xl mt-2">Hello, Mara!</p>
                <p class="text-gray-900 font-medium text-xl mt-4">What do you want to do today?</p>
              </div>
              <div class="flex justify-center opacity-100">
                <img src="storage/assets/officerworker.png" class="image-size">
              </div>
              <div class="flex justify-center text-center w-auto motivation-message px-4 rounded-2xl">
                <p class="text-indigo-900 text-base quotes-format font-normal" id="motivationalQuote"></p>
              </div>
              <div class="flex justify-center items-baseline pb-3 p-3 rounded-2xl shadow-lg">
                <span id="datetime" class="text-indigo-900 text-base mb-4 font-bold"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="vertical-menu-container flex w-auto justify-end">
          <!--Scroll Menu-->
          <div class="flex flex-col h-full w-auto mb-auto mx-4 my-4 px-4 py-3 bg-white rounded-2xl shadow-lg">
            <div class="flex ml-2 border-8 justify-between border-white">
              <div class="flex w-auto">
                <img src="storage/assets/pencil-alt.png" class="h-7">
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

  <!--Script for Date and Time-->

  <script>
    // create a function to update the date and time
    function updateDateTime() {
      // create a new `Date` object
      const now = new Date();

      // get the current date and time as a string
      const currentDateTime = now.toLocaleString();

      // update the `textContent` property of the `span` element with the `id` of `datetime`
      document.querySelector('#datetime').textContent = currentDateTime;
    }

    // call the `updateDateTime` function every second
    setInterval(updateDateTime, 1000);
  </script>

<script>
  // Array of motivational quotes
  const motivationalQuotes = [
    "Believe you can and you're halfway there.",
    "The only way to do great work is to love what you do.",
    "Success is not final, failure is not fatal: It is the courage to continue that counts.",
    "Life is all about going through upward and all in to pursue our dreams.",
    "The only thing standing between you and outrageous success is continuous progress.",
    "Success is the sum of small efforts, repeated day in and day out.",
    "The most certain way to succeed is always to try just one more time.",
    "Talent is nothing without persistence.",
    "If you get tired, learn to rest, not to quit.",
    "Perseverance is not a long race; it is many short races one after the other.",
    "The only thing that overcomes hard luck is hard work.",
  ];

  // Function to get a random quote
  function getRandomQuote() {
    return motivationalQuotes[Math.floor(Math.random() * motivationalQuotes.length)];
  }

  // Get the element where the motivational quote will be displayed
  const motivationalQuoteElement = document.getElementById("motivationalQuote");

  // Display a random quote on page load
  motivationalQuoteElement.textContent = getRandomQuote();
</script>
  
</body>

</html>