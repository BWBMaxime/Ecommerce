<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <? $_ASSET::style("style") ?>
    <? $_ASSET::style("form") ?>
</head>
<body>
    <div class="flex mt-12 h-screen w-full justify-center">

        <!-- User Card -->
        <div class="max-w-xs mt-6">
            <div class="bg-white shadow-lg rounded-lg border border-gray-800">
                <div class="photo-wrapper pt-4">
                    <img class="w-32 h-32 rounded-full mx-auto shadow-lg" src="https://www.gravatar.com/avatar/2acfb745ecf9d4dccb3364752d17f65f?s=260&d=mp" alt="John Doe">
                </div>
                <div class="">
                    <div class="container">
                        <form action="/action_page.php">
                            <div class="row">
                                <div class="col-25 mt-3 text-sm text-gray-600">
                                    <label for="fname">First Name</label>
                                </div>
                                <div class="col-75 text-sm text-gray-400">
                                    <input type="text" id="fname" name="firstname" placeholder="John">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25 mt-3 text-sm text-gray-600">
                                    <label for="lname">Last Name</label>
                                </div>
                                <div class="col-75 text-sm text-gray-400">
                                    <input type="text" id="lname" name="lastname" placeholder="Doe">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25 mt-3 text-sm text-gray-600">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-75 text-sm text-gray-400">
                                    <input type="text" id="email" name="email" placeholder="johndoe.gmail.com">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25 mt-3 text-sm text-gray-600">
                                    <label for="birth">Birthday</label>
                                </div>
                                <div class="col-75 text-sm text-gray-400">
                                <input type="date" id="birth" name="birth" value="2018-07-22">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25 mt-3 text-sm text-gray-600">
                                    <label for="phone">Phone number</label>
                                </div>
                                <div class="col-75 text-sm text-gray-400">
                                    <input type="text" id="phone" name="phone" placeholder="0625484236">
                                </div>
                            </div>
                            <div class="row text-sm text-gray-600 text-white">
                                <input type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- This is an example component -->
        <div class="py-5">
            <main class="h-full overflow-y-auto">
                <div class="container mx-auto grid">
                <!-- Cards -->
                    <div class="grid gap-6 mb-8 ml-8 md:grid-cols-1 xl:grid-cols-2">
                        <!-- Card Payment -->
                        <div class="flex items-center p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800 border border-gray-800">
                            <div class="space-y-6">
                                <div>
                                    <h3 class="text-m font-bold">
                                        Default payment method
                                    </h3>
                                    <p class="mt-4 text-sm">
                                        Bank card
                                    </p>
                                    <p class="text-sm">
                                        Type : MasterCard
                                    </p>
                                    <p class="text-sm">
                                        Name : John Doe
                                    </p>
                                </div>
                                <div class="w-64 h-40 m-auto rounded-xl relative text-white shadow-xl transition-transform transform hover:scale-105">
                                    <!-- Credit card -->
                                    <img class="relative object-cover w-full h-full rounded-xl" src="https://i.imgur.com/kGkSg1v.png">
                                    <div class="w-full px-5 absolute top-4">
                                        <div class="flex justify-between">
                                            <div class="">
                                                <p class="font-light text-sm">
                                                    Name
                                                </p>
                                                <p class="font-medium tracking-widest text-xs">
                                                    Karthik P
                                                </p>
                                            </div>
                                            <img class="w-12 h-12" src="https://i.imgur.com/bbPHJVe.png"/>
                                        </div>
                                        <div class="pt-0">
                                            <p class="font-light text-sm">
                                                Card Number
                                            </p>
                                            <p class="font-medium tracking-more-wider text-xs">
                                                ****  ****  ****  7632
                                            </p>
                                        </div>
                                        <div class="pt-2 pr-2">
                                            <div class="flex justify-between">
                                                <div class="">
                                                    <p class="font-light text-xs">
                                                        Valid
                                                    </h1>
                                                    <p class="font-medium tracking-wider text-xs">
                                                        **/21
                                                    </p>
                                                </div>
                                                <div class="">
                                                    <p class="font-light text-xs text-xs">
                                                        Expiry
                                                    </h1>
                                                    <p class="font-medium tracking-wider text-xs">
                                                        **/25
                                                    </p>
                                                </div>
                                                <div class="">
                                                    <p class="font-light text-xs">
                                                        CVV
                                                    </h1>
                                                    <p class=" tracking-more-wider text-xs">
                                                        ***
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a class="text-xs text-indigo-500 hover:underline hover:text-indigo-600 font-medium" href="#">View all</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Delivery -->
                        <div class="flex items-center p-8 bg-white rounded-lg shadow-xl border border-gray-800">
                            <div class="space-y-6">
                                <div>
                                    <p class="text-m font-bold color4C dark:text-gray-400">
                                        Default delivery method
                                    </p>
                                    <p class="mt-4 text-sm font-light dark:text-gray-400">
                                        John Doe
                                    </p>
                                    <p class="text-sm font-light dark:text-gray-400">
                                        12 avenue de Toulouse
                                    </p>
                                    <p class="text-sm font-light dark:text-gray-400">
                                        34000 Montpellier
                                    </p>
                                    <p class="text-sm font-light dark:text-gray-400">
                                        France
                                    </p>
                                </div>
                                <div class="w-64 h-40 rounded-xl relative text-white shadow-lg transition-transform transform hover:scale-105">
                                    <!-- Maps -->
                                    <img class="relative object-cover w-full h-full rounded-xl" 
                                    src="https://geeko.lesoir.be/wp-content/uploads/2019/03/capture-1068x557.png" 
                                    sizes="(max-width: 1068px) 100vw, 1068px" alt="" title="capture">
                                </div>
                                <div class="text-center">
                                    <a class="text-xs text-indigo-500 hover:underline hover:text-indigo-600 font-medium" href="#">View all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>


        <!-- Order Table -->
        <div class="flex flex-col absolute bottom-0">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow-lg overflow-hidden border border-gray-800 sm:rounded-lg">
                    <p scope="col" class="text-m text-left font-bold color4C p-4">
                        Order history
                    </p>
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Order number
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Tracking number
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Products ordered
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Total order
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-center font-semibold">10/12/2020</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-center font-semibold">1</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <span class="px-2 inline-flex text-xs leading-7 font-semibold rounded-full bg-gray-200 hover:text-gray-500">
                                <a href="" class="underline">658212682</a>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-center font-semibold">4</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-center font-semibold">39.90€</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-7 font-semibold rounded-full bg-green-100 text-green-800">
                                Delivered
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-xs font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900 hover:underline">Edit the invoice</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>

    </div>
</body>
</html>
