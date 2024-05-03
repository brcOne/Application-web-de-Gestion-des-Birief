<?php
require_once "../../controller/formateur/formateurDashboard.php";
require_once '../../controller/formateur/brief_details_controller.php';
?>
<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/output.css"> <!-- Custom CSS file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <!-- Alpine.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.7.1/dist/alpine.min.js" defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <title>Dashboard</title>
</head>



<body class="flex h-screen text-gray-900 bg-black md:text-lg lg:text-xl xl:text-2xl">
    <?php
    include_once '../../view/templates/formateur_sidebar.php';
    ?>
    <div class="flex flex-col w-3/4 h-screen gap-4 overflow-auto bg-white ml-60">

        <div class="flex justify-between mx-4">
            <div class="my-11">
                <p class="text-2xl font-semibold">Hello, <span class="font-medium "><?php echo $cardInfo["PRENOM"] ?></span></p>
            </div>
            <div class="flex gap-x-7 my-11">
                <div>
                    <form action="" method="post">
                        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full p-4">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow ">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 ">
                                        <h3 class="text-lg font-semibold text-gray-900 ">
                                            Brief Duration
                                        </h3>
                                        <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div date-rangepicker class="flex items-center mt-7">
                                        <div class="relative">
                                            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                </svg>
                                            </div>
                                            <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5   dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                                        </div>
                                        <span class="mx-4 text-lg text-gray-500">to</span>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                </svg>
                                            </div>
                                            <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5    dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                                        </div>
                                    </div>
                                    <div class="relative flex justify-end w-full">
                                        <button name="done" class="w-20 h-10 mt-3 text-xs text-white border-2 bg-primary rounded-xl ">Donne</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php if (!$inProgres) : ?>
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-primary hover:bg-hoverprimary blue-800 focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-lg px-5 py-2.5 text-center ">
                            Assign now
                        </button>
                    <?php endif; ?>
                </div>

                <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="relative inline-flex items-center p-4 text-xl font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 focus:outline-none " type="button">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                        <path d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z" />
                    </svg>

                    <div class="absolute block w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-0.5 start-2.5 "></div>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownNotification" class="z-20 hidden w-full max-w-sm bg-white border divide-y divide-gray-100 rounded-lg shadow" aria-labelledby="dropdownNotificationButton">
                    <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 ">
                        Notifications
                    </div>
                    <div class="divide-y divide-gray-100 ">
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-100 ">
                            <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11" src="../../public/assets/img/testprofile.jpg" alt="">
                                <div class="absolute flex items-center justify-center w-5 h-5 -mt-5 border border-white rounded-full ms-6 bg-primary ">
                                    <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                        <path d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                                        <path d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full ps-3">
                                <div class="text-gray-500 text-sm mb-1.5 ">New message from <span class="font-semibold text-gray-900 ">Jese Leos</span>: "Hey, what's up? All set for the presentation?"</div>
                                <div class="text-xs text-primary ">a few moments ago</div>
                            </div>
                        </a>

                    </div>

                </div>

            </div>
        </div>
        <div class="flex flex-col mx-2 ">
            <div class="my-4">
                <a href="./briefs_list.php">
                    <button class="flex items-center justify-center h-12 px-6 text-lg rounded-lg w-28 bg-secondary text-primary"><ion-icon name="arrow-back-outline"></ion-icon>Back</button>
                </a>
            </div>
            <div class="flex justify-center p-0 m-0 ">

                <?php if ($briefDetail) : ?>
                    <div class="flex flex-col mx-20 item-center rounded-xl" style=" width: 900px; ">
                        <img class="object-cover bg-white rounded-xl" style="max-height: 320px; width: 700px;" src="../../public/assets/img/bp-cover.jpg" alt="">


                        <div class="flex flex-wrap ">
                            <div class="min-w-0 mt-2 f">
                                <h2 class="mr-auto text-lg font-medium text-gray-800 truncate cursor-pointer hover:text-primary "><?= $briefDetail['TITRE'] ?></h2>
                            </div>

                        </div>
                        <div class="flex items-center w-full mt-2 gap-x-32 ">
                            <div class="flex items-center w-full gap-x-4">
                                <img class='object-cover rounded-full h-7 w-7' alt='User avatar' src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>


                                <div class="w-full text-xs font-medium ">
                                    <p class="text-xs"><?= $briefDetail['NOM'] . ' ' . $briefDetail['PRENOM'] ?></p>
                                    <p class="text-xs text-gray-500">created : <?= $briefDetail['DATE_AJOUTE'] ?></p>
                                </div>


                            </div>

                            <a href="../../BP-PDF/<?= $briefDetail['PIECE_JOINTE'] ?>" download class="bg-secondary text-gray-800 text-xs font-medium me-2 px-4 py-0.5 rounded w-60 "> <svg class="inline-block w-6 h-6 text-gray-800 align-middle p-x-11" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24" download>

                                    <path fill-rule="evenodd" d="M4 4a2 2 0 1 0 0 4h16a2 2 0 1 0 0-4H4Zm0 6h16v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8Zm10.707 5.707a1 1 0 0 0-1.414-1.414l-.293.293V12a1 1 0 1 0-2 0v2.586l-.293-.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l2-2Z" clip-rule="evenodd" />
                                </svg>

                                Attachment

                            </a>

                        </div>



                    </div>
                <?php endif; ?>
                <div class="flex flex-col p-4 border shadow rounded-xl gap-y-7" style="width: 380px;">
                    <p class="text-xl font-semibold">Targeted skill</p>
                    <?php foreach ($briefCompetence as $competence) : ?>
                        <div class="flex mx-4 gap-x-3">
                            <p class="text-sm font-semibold text-primary"><?= $competence['CODE'] ?></p>
                            <span class="text-sm text-gray-500"><?= $competence['COMPETENCE_NOM'] ?></span>
                        </div>
                    <?php endforeach; ?>



                </div>
            </div>


        </div>




    </div>

    <div class="flex justify-cente bg-bodybackground">
        <?php
        include_once '../../view/templates/formateur_info_card.php';
        ?>

    </div>







    <script src="../../public/js/dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>




<!-- <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
  <label for="fileInput" class="cursor-pointer">
    Upload
    <input id="fileInput" class="hidden" type="file">
  </label>
</span> -->