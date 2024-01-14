<!-- component -->
<div class="max-w-screen-xl mx-auto">
    <!-- header -->
    <?php include_once 'header_view.php'?>
    <!-- header ends here -->

    <main class="mt-10">

        <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
            <div class="absolute left-0 bottom-0 w-full h-full z-10"
                 style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
            <img src="assets\img\wikigray.jpg" class="absolute left-0 top-0 w-full h-full z-0 object-cover rounded-lg" />
            <div class="p-4 absolute bottom-0 left-0 z-20">

                <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                    <?= $singleWiki['title'] ?>
                </h2>
                <div class="flex justify-between mt-3">
                    <div class="flex">
                        <img src=<?= $singleWiki['picture'] ?>
                             class="h-10 w-10 rounded-full mr-2 object-cover" />
                        <div>
                            <p class="text-gray-200">Created by: <span class="font-semibold text-gray-200 text-lg"> <?= $singleWiki['username'] ?></span> </p>
                        </div>
                    </div>
                    <div
                         class="ml-12 px-4 py-1 rounded-lg bg-gray-800 text-gray-200 inline-flex items-center justify-center"> <?= $singleWiki['categorie'] ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center p-4">
            <div class=" flex px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">
                <?= $singleWiki['tags'] ?>
            </div>
            <div class="px-4 lg:px-0 mt-12 text-justify text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
                <p class="pb-6"><?= $singleWiki['content'] ?></p>

            </div>
        </div>
    </main>
    <!-- main ends here -->

    <!-- footer -->
    <p class="text-center text-sm text-gray-500 my-10">
        &copy;
        <script>
            document.write(new Date().getFullYear());
        </script>
        <!--                <a>Maryam JAMMAR</a>. -->
        All rights reserved.
    </p>
</div>