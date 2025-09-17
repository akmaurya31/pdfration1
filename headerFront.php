
<!DOCTYPE html>
<html>
<head>
    <?php include('meta.php');?>
    <link href="./output.css" rel="stylesheet" />
</head>


<?php session_start(); ?>


<style>
  .blink-bg {
    animation: background-blink 1s infinite;
  }

  @keyframes background-blink {
    0% { background-color: #ef4444; } /* red-500 */
    50% { background-color: #3b82f6; } /* blue-500 */
    100% { background-color: #ef4444; } /* red-500 */
  }

 
     
</style>

    <nav class="bg-white border-gray-200 ">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="images/logo1.jpeg" class="h-10" alt="Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap ">🏠 Home_Page</span>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                <a href="tel:7518869428" class="text-sm  text-gray-500  hover:underline"> 📞 (91)7518869428</a>
              
              <?php  //print_r($_SESSION); 
              if (isset($_SESSION['is_login'])) { ?>
                <a href="dashboard.php" class="text-sm  text-blue-600  hover:underline">Dashboard</a>
                <?php } else{ ?>
                <a href="login.php" class="text-sm  text-blue-600  hover:underline">Login</a>
                <?php } ?>
          
          
            </div>
        </div>
    </nav>
    <nav class="bg-gray-50">
        <?php include('secondmenu.php'); ?>
    </nav>
