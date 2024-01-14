<?php include_once 'navbar.php'?>
<div class="flex overflow-hidden bg-white pt-16">
    <?php include_once 'sidebar.php'?>
        <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>
                <div class="pt-6 px-4">
                    <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">$45,385</span>
                                    <h3 class="text-base font-normal text-gray-500">Sales this week</h3>
                                </div>
                                <div class="flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                                    12.5%
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div id="main-chart"></div>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                            <div class="mb-4 flex items-center justify-between">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Latest Catgeories</h3>
                                    <span class="text-base font-normal text-gray-500">This is a list of latest categories</span>
                                </div>
                            </div>
                            <div class="flex flex-col mt-8">
                                <div class="overflow-x-auto rounded-lg">
                                    <div class="align-middle inline-block min-w-full">
                                        <div class="shadow overflow-hidden sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Wiki Categories
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="bg-white">
                                                <?php
                                                $categorie = new Categorie();
                                                $latestCategories = $categorie->getLatestCategories();

                                                foreach ($latestCategories as $category):
                                                    ?>
                                                    <tr>
                                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                            <span class="font-semibold flex justify-between">
                                                                <?php echo $category['categorie']; ?>
                                                                <span class="text-gray-500 ml-auto">
                                                                    <?php
                                                                    $wiki = new Wiki;
                                                                    echo $wiki->totalWikiCategory($category['categorie_id']);
                                                                    ?> Articles
                                                                </span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
<!--                        total wikis-->
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                        <?php $wiki = new Wiki;
                                        echo $wiki->totalWiki();
                                        ?>
                                    </span>
                                    <h3 class="text-base font-normal text-gray-500">Total Wikis</h3>
                                </div>
                                <div class="ml-5 w-0 flex items-center justify-end flex-1 text-gray-500 text-base font-bold">
                                    <i class="fas fa-newspaper fa-2x"></i>
                                </div>
                            </div>
                        </div>
<!--                        total users-->
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                        <?php $user = new User;
                                            echo $user->totalUsers();
                                            ?>
                                    </span>
                                    <h3 class="text-base font-normal text-gray-500">Total Users</h3>
                                </div>
                                <div class="ml-5 w-0 flex items-center justify-end flex-1 text-gray-500 text-base font-bold">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                            </div>
                        </div>
<!--                        total categories-->
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
                                        <?php $categorie = new Categorie();
                                        echo $categorie->totalCategory();
                                        ?>
                                    </span>
                                    <h3 class="text-base font-normal text-gray-500">Total Categories</h3>
                                </div>
                                <div class="ml-5 w-0 flex items-center justify-end flex-1 text-gray-500 text-base font-bold">
                                    <i class="fas fa-th fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
<!--                        latest users-->
                        <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-bold leading-none text-gray-900">Latest Author</h3>
                                <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                                    View all
                                </a>
                            </div>
                            <div class="flow-root">
                                <ul role="list" class="divide-y divide-gray-200">
                                    <?php
                                    $user = new User();
                                    $latestUsers = $user->getLatestUsers();
                                    foreach ($latestUsers as $user) : ?>
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/neil-sims.png" alt="Neil image">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="inline-flex items-center text-base font-semibold text-gray-900">
                                                    <?= $user['username'] ?>
                                                </p>
                                            </div>
                                            <div class="text-sm font-medium text-gray-900 truncate">
                                                <?= $user['email'] ?>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                            <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Latest Wikis</h3>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                    <tr class="">
                                        <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Latest wikis</th>
                                        <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Category</th>
                                        <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Tags</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                    <?php
                                    $wiki = new Wiki();
                                    $latestWikis = $wiki->getLatestWikis();
                                    foreach ($latestWikis as $wiki) : ?>
                                    <tr class=" text-gray-500">
                                        <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4"> <?= $wiki['title'] ?> </td>
                                        <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"> <?= $wiki['categorie'] ?> </th>
                                        <th class="border-t-0 px-4  text-sm font-normal whitespace-nowrap p-4 text-left"> <?= $wiki['tags'] ?> </th>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <p class="text-center text-sm text-gray-500 my-10">
                &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                <!--                <a>Maryam JAMMAR</a>. -->
                All rights reserved.
            </p>
        </div>
    </div>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
</div>