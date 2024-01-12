<!-- component -->
<div class="max-w-screen-xl mx-auto">
    <!-- header -->
    <header class="flex items-center justify-between py-2 border-b">
        <a href="#" class="px-2 lg:px-0 uppercase font-bold text-purple-800">
            LOGO
        </a>
        <ul class="inline-flex items-center">
            <li class="px-2 md:px-4">
                <a href="" class="text-purple-600 font-semibold hover:text-purple-500"> Home </a>
            </li>
            <li class="px-2 md:px-4">
                <a href="" class="text-gray-500 font-semibold hover:text-purple-500"> About </a>
            </li>
            <li class="px-2 md:px-4">
                <a href="" class="text-gray-500 font-semibold hover:text-purple-500"> Press </a>
            </li>
            <li class="px-2 md:px-4">
                <a href="" class="text-gray-500 font-semibold hover:text-purple-500"> Contact </a>
            </li>
            <li class="px-2 md:px-4 hidden md:block">
                <a href="" class="text-gray-500 font-semibold hover:text-purple-500"> Login </a>
            </li>
            <li class="px-2 md:px-4 hidden md:block">
                <a href="" class="text-gray-500 font-semibold hover:text-purple-500"> Register </a>
            </li>
        </ul>

    </header>
    <!-- header ends here -->

    <main class="mt-10">

        <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
            <div class="absolute left-0 bottom-0 w-full h-full z-10"
                 style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
            <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
            <div class="p-4 absolute bottom-0 left-0 z-20">
                <div href="#"
                   class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2"><?= $singleWiki['categorie'] ?>
                </div>
                <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                    <?= $singleWiki['title'] ?>
                </h2>
                <div class="flex mt-3">
                    <img src=<?= $singleWiki['picture'] ?>
                         class="h-10 w-10 rounded-full mr-2 object-cover" />
                    <div>
                        <p class="font-semibold text-gray-200 text-sm"> <?= $singleWiki['username'] ?> </p>
                        <p class="font-semibold text-gray-400 text-xs"> 14 Aug </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center p-4">
            <div class="w-36 flex px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">
                <?= $singleWiki['tags'] ?>
            </div>
            <div class="px-4 lg:px-0 mt-12 text-justify text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
                <p class="pb-6"><?= $singleWiki['content'] ?></p>

            </div>
        </div>
    </main>
    <!-- main ends here -->

    <!-- footer -->
    <footer class="border-t mt-32 pt-12 pb-32 px-4 lg:px-0">
        <div class="flex">

            <div class="w-full md:w-1/3 lg:w-1/4">
                <h6 class="font-semibold text-gray-700 mb-4">Company</h6>
                <ul>
                    <li> <a href="" class="block text-gray-600 py-2">Team</a> </li>
                    <li> <a href="" class="block text-gray-600 py-2">About us</a> </li>
                    <li> <a href="" class="block text-gray-600 py-2">Press</a> </li>
                </ul>
            </div>

            <div class="w-full md:w-1/3 lg:w-1/4">
                <h6 class="font-semibold text-gray-700 mb-4">Content</h6>
                <ul>
                    <li> <a href="" class="block text-gray-600 py-2">Blog</a> </li>
                    <li> <a href="" class="block text-gray-600 py-2">Privacy Policy</a> </li>
                    <li> <a href="" class="block text-gray-600 py-2">Terms & Conditions</a> </li>
                    <li> <a href="" class="block text-gray-600 py-2">Documentation</a> </li>
                </ul>
            </div>

        </div>
    </footer>
</div>