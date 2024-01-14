<?php include_once 'navbar.php'?>
<div class="flex overflow-hidden bg-white pt-12">
    <?php include_once 'sidebar.php'?>
    <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
        <section class="container mx-auto px-8 py-8 lg:py-20">
            <div class="text-center">
                <h2 class="text-2xl font-bold">Archived Wikis</h2>
            </div>

             <div class="mt-10 grid grid-cols-1 gap-10 lg:grid-cols-3">
                <?php
                $wiki = new Wiki();
                $restore = $wiki->getArchivedWikis();
                foreach ($restore as $wiki): ?>
                    <div class="relative">
                        <div class="h-1/2">
                            <a href="index.php?page=wikidetails&id=<?= $wiki['wiki_id'] ?>">
                                <div class="mb-8 relative flex flex-col bg-clip-border rounded-xl bg-transparent text-gray-700 shadow-md relative grid min-h-[30rem] items-end overflow-hidden rounded-xl"><img src="assets/img/wikiblue.jpeg" alt="bg" class="absolute inset-0 h-full w-full object-cover object-center" />
                                    <div class="absolute inset-0 bg-black/70"></div>
                                    <div class="p-6 relative flex flex-col justify-end">
                                        <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-white"><?= $wiki['title'] ?></h4>
                                        <p class="block antialiased font-sans text-base font-light leading-relaxed text-white my-2 font-normal"><?=  substr($wiki['content'], 0, 300) ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--                                <div class="flex justify-between items-center">-->
                        <div class="flex absolute p-2 w-full bottom-0 left-0 z-100 justify-center space-x-0">
                            <input type="hidden" name="wiki_id" value="<?= $wiki['wiki_id'] ?>">
                            <button data-wiki-id="<?= $wiki['wiki_id'] ?>" class="restore-btns min-w-auto w-32 h-10 bg-cyan-600 p-2 rounded-full hover:bg-gray-500 text-white font-semibold hover:flex-grow transition-all duration-200 ease-in-out">
                                Restore
                            </button>
                        </div>
                        <!--</div>-->
                    </div>

                <?php endforeach; ?>
            </div>
            </a>
        </section>

        <p class="text-center text-sm text-gray-500 my-10">
            &copy;
            <script>
                document.write(new Date().getFullYear());
            </script>
            <!--                <a>Maryam JAMMAR</a>. -->
            All rights reserved.
        </p>
    </div>


    <script src="assets/js/wiki.js"></script>
