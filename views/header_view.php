<header class="flex items-center justify-between py-4 border-b">
    <div class="flex items-center justify-start">
        <a href="#" class="text-xl font-bold flex items-center lg:ml-2.5">
            <img src="assets/img/wiki.png" class="h-8 mr-2" alt="Windster Logo">
            <span class="self-center text-cyan-600 whitespace-nowrap">WIKI</span>
        </a>

    </div>
    <div class="flex items-center rounded-xl ml-44">
        <div class="flex bg-gray-100 p-2 w-72 space-x-4 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input class="bg-gray-100 outline-none" type="text" placeholder="Article name or keyword..." />
        </div>
        <div class="flex py-1 px-4 rounded-lg text-gray-500 font-semibold cursor-pointer">
            <span>All categorie</span>

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </div>
    <ul class="inline-flex items-center">
        <li class="px-2 md:px-4">
            <a href="index.php?page=home" class="text-cyan-600 font-semibold hover:text-cyan-800"> Home </a>
        </li>

        <?php if (isset($_SESSION["login"])) {

            if (empty($_SESSION["admin"])) {
                ?>
                <li class="px-2 md:px-4 hidden md:block">
                    <a href="index.php?page=mywikis" id="manage-wikis-btn" class="cursor-pointer text-gray-500 font-semibold hover:text-cyan-800"> Manage My Wikis </a>
                </li>
            <?php } else { ?>
                <li class="px-2 md:px-4 hidden md:block">
                    <a href="mywikis_view.php" id="manage-wikis-btn" class="cursor-pointer text-gray-500 font-semibold hover:text-green-600"> Manage Wikis </a>
                </li>
                <li class="px-2 md:px-4 hidden md:block">
                    <a href="index.php?page=dashboard" class="text-gray-500 font-semibold hover:text-green-600"> Dashboard </a>
                </li>
            <?php } ?>
            <li class="px-2 md:px-4 hidden md:block">
                <form action="index.php?page=logout" method="post">
                    <button name="logout" class="text-gray-500 font-semibold hover:text-cyan-800"> Logout</button>
                </form>
            </li>
        <?php } else { ?>
            <li class="px-2 md:px-4 hidden md:block">
                <a href="index.php?page=signin" class="text-gray-500 font-semibold hover:text-green-600"> Login </a>
            </li>
            <li class="px-2 md:px-4 hidden md:block">
                <a href="index.php?page=signup" class="text-gray-500 font-semibold hover:text-green-600">
                    Register </a>
            </li>

        <?php } ?>
    </ul>

</header>
