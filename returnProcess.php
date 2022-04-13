<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Application/css/footer.css" />
    <link rel="stylesheet" href="Application/css/menu-bar.css" />
    <link rel="stylesheet" href="Application/css/index.css" />
    <link rel="stylesheet" type="text/css" href="../Application/css/logIn.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              sans: ['Inter', 'sans-serif'],
            },
          }
        }
      }

    </script>
    <title>AMAZIN</title>

    <!--bootstrap from w3school https://www.w3schools.com/bootstrap4/bootstrap_ref_all_classes.asp-->

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</head>
<body>
  <?php

    include "navbar.php";
  ?>     
  <div class="mainpage-img" style="background-image: url(https://www.wikihow.com/images/thumb/8/85/Return-an-Item-to-Amazon-Step-20.jpg/aid4441403-v4-1200px-Return-an-Item-to-Amazon-Step-20.jpg);  background-repeat: no-repeat;margin-left:20%; width: auto; height: 300px">
      
  </div>
  <div class="main-content" style="margin-left: 150px;">

      <div class="container-md">
      <h2 class="title p-6" style="font-size: 2.5rem;
    line-height: 2rem;">Return Process</h2>
      <p style="width: 100%;justify-content: center" class="content"><b>
      <p class="md:space-x-1 space-y-1 md:space-y-0 mb-4">
        <button class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Click to see return criterions
        </button>
        </p>
        <div class="collapse" id="collapseExample">
        <div class="block p-6 rounded-lg shadow-lg bg-white" style="width: 500px;">
            <li>Product must be filed for return within 14 days of use.</li>
            <li>Product can only be returned if it is in acceptable condition</li>
            <li>Product is not a peice of clothing.</li>
        </div>
        </div>
      </p>
      <p style="width: 100%;justify-content: center" class="content">You can email us at: Amazin@example.com</p>
      </div>

    </div>

    <br/>

    </body>
    </html>

 <?php
    include "footer.php";
  ?>

</body>
</html>
