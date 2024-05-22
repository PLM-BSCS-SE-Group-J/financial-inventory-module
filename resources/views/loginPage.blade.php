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
       .login-box {
          height: 650px;
          width: 550px;
          margin-left: 250px;
          padding-top: 60px;
          padding-left: 60px;
          padding-right: 60px;
          padding-bottom: 60px;

       }
       .login-header {
          font-size: 50px;
          font-weight: 800;
          margin-top: 10px;
          color: #3730a3;
       }
       .sign-in {
          font-size: 42px;
          font-weight: 600;
          margin-top: -10px;
          color: #3730a3;
       }
       .login-button {
          margin-top: 30px;
       }
       .text-color {
          color: #3b82f6;
       }
       .text-color2 {
          color: #9ca3af;
       }
    </style>

</head>

<body class="bg-indigo-800 h-screen w-screen">
  <!--Main Div-->
  <div class="flex justify-start items-center w-full h-full">
    <div class="relative flex h-full w-full">
      <div class="relative h-full w-full">
        <img class="w-full h-full" src="storage/assets/Sign in Prompt.png" alt="bg">
      </div>
    </div>

    <!--Login Box-->
    <div class="absolute flex flex-col w-1/3 h-fit bg-white rounded-2xl login-box">
      <div class="w-full mb-3">
        <img class="w-full h-full rounded-xl" src="storage/assets/PLM LOGO.png" alt="Logo">
      </div>
      <div class="login-header">PLM Inventory</div>
      <div class="sign-in">Sign in</div>

      <!--Login Fields-->
      <div class="w-full">
        <form action="" method="" class="p-4 w-full">
          <div class="flex flex-col gap-4 mt-4">
            <div class="flex flex-col w-full">
                <label for="employee name" class="block mb-2 text-base font-medium text-gray-900">Employee Number</label>
                <input type="text" name="employee name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email Address" required="">
            </div>
            <div class="flex flex-col mb-3">
                <div class="flex justify-between">
                  <label for="report title" class="block mb-2 text-base font-medium text-gray-900">Password</label>
                  <a href="" for="report title" class="block mt-1 text-sm font-normal text-color">Forgot Password?</a>
                </div>
                <input type="text" name="report title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Password" required="">
            </div>
            <div class="flex font-sm text-sm">
              <input type="checkbox" name="checkbox" class="cursor-pointer">
              <label for="checkbox" class="cursor-pointer mx-2 text-color2">Keep me signed in</label>
            </div>
          </div>
          <div class="flex flex-col justify-center items-center login-button">
            <button type="button" onclick="document.location='/'" class="w-full px-4 py-2 bg-indigo-800 hover:bg-indigo-900 rounded-md shadow items-centerlex">
              <div class="text-white text-base font-medium leading-normal">Log in</div>
            </button>
          </div>
        </form>
      </div>
    </div>

  </div>

</body>

</html>