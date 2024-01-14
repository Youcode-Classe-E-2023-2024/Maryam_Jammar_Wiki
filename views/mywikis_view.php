<!-- component -->
<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
<div class="p-3">
    <header class="flex items-center justify-between py-4 border-b">
        <div class="flex items-center justify-start">
            <a href="#" class="text-xl font-bold flex items-center lg:ml-2.5">
                <img src="assets/img/wiki.png" class="h-8 mr-2" alt="Windster Logo">
                <span class="self-center text-cyan-600 whitespace-nowrap">WIKI</span>
            </a>

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
</div>

<!-- ====== Blog Section Start -->
<section class="p-12 pt-4 lg:pt-[120px] pb-10 lg:pb-20">
    <div class="container">
        <div class="flex flex-wrap justify-center -mx-4">
            <div class="w-full px-4">
                <div class="text-center mx-auto mb-[60px] lg:mb-20 max-w-[510px]">
               <span class="font-semibold text-lg text-primary mb-2 block">
               <a data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="hidden flex flex-col sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-bold rounded-lg text-sm px-3 py-2 text-center items-center mr-3"

               >
                                <!-- HeroIcon - User -->
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="3"
                                        stroke="currentColor"
                                        class="w-6 h-6 shrink-0"
                                >
                                    <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 6v12m-6-6h12"
                                    />
                                </svg>

                                <small class=" text-center text-xs font-bold"> Add Wiki </small>

                            </a>


               </span>
                    <h2
                            class="
                  font-bold
                  text-3xl
                  sm:text-4xl
                  md:text-[40px]
                  text-dark
                  mb-4
                  "
                    >
                        My Wikis
                    </h2>
                    <p class="text-base text-body-color">
                        You can Add, Update and Delete your wikis.
                    </p>
                </div>
            </div>
        </div>

        <div class=" flex flex-wrap -mx-4">
            <?php
            $wiki = new Wiki();
            $myWikis = $wiki->getMyWikis();
            foreach ($myWikis as $wiki): ?>
                <div class="relative mb-8 w-full md:w-1/2 lg:w-1/3 px-4">
                    <div class="p-2">
                        <div class="max-w-[370px] mx-auto mb-10">
                            <div class="rounded overflow-hidden mb-8">
                                <img
                                        src="assets/img/wikigray.jpg"
                                        alt="image"
                                        class="w-full"
                                />
                            </div>
                            <div>
                  <span
                          class="
                     bg-cyan-800
                     rounded
                     inline-block
                     text-center
                     py-1
                     px-4
                     text-xs
                     leading-loose
                     font-semibold
                     text-white
                     mb-5
                     "
                  >
                  <?= $wiki['date_wiki'] ?>
                  </span>
                                <h3>
                                    <a
                                            class="
                        font-semibold
                        text-xl
                        sm:text-2xl
                        lg:text-xl
                        xl:text-2xl
                        mb-4
                        inline-block
                        text-dark
                        hover:text-cyan-500
                        "
                                    >
                                        <?= $wiki['title'] ?>
                                    </a>
                                </h3>
                                <p class="text-base text-body-color">
                                    <?=  substr($wiki['content'], 0, 90) ?>
                                </p>
                                <a href="index.php?page=wikidetails&id=<?= $wiki['wiki_id'] ?>" class="text-cyan-600 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex absolute mt-12 p-0 w-full bottom-0 left-0 z-100 justify-center space-x-0">
                        <input type="hidden" name="wiki_id" value="<?= $wiki['wiki_id'] ?>">

                        <button data-wiki-id="<?= $wiki['wiki_id'] ?>"
                                data-title="<?= $wiki['title'] ?>"
                                data-content="<?= $wiki['content'] ?>"
                                data-categorie  ="<?= $wiki['categorie_id'] ?>"
                                data-modal-target="crud-edit" data-modal-toggle="crud-edit"  class="edit-wiki-btns min-w-auto w-32 h-10 bg-cyan-700 p-2 rounded-l-xl hover:bg-cyan-800 transition-colors duration-50 hover:animate-pulse ease-out text-white font-semibold">
                            Edit
                        </button>
                        <button data-wiki-id="<?= $wiki['wiki_id'] ?>"  class="delete-btns  min-w-auto w-32 h-10 bg-cyan-700 p-2 rounded-r-xl hover:bg-cyan-800 transition-colors duration-50 hover:animate-pulse ease-out text-white font-semibold">
                            Delete
                        </button>
                    </div>
                    </div>



            <?php endforeach; ?>
        </div>
    </div>
    <!--AddWikiform popup-->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-3/6  max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Create New Article
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" method="post" action="index.php?page=wikis" id="addArticleForm" enctype="multipart/form-data">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type article title" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="categorie_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="categorie_id" name="categorie_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <?php
                                $categoryModel = new Categorie();
                                $categories = $categoryModel->getCategories();
                                foreach ($categories as $category):
                                    ?>
                                    <option value="<?php echo $category["categorie_id"]; ?>">
                                        <?php echo $category["categorie"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="tag" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag</label>
                            <select id="tag" name="tag[]" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <?php
                                $tag = new Tag();
                                $tags = $tag->getTags();
                                foreach ($tags as $tag):
                                    ?>
                                    <option value="<?php echo $tag["tag_id"]; ?>">
                                        <?php echo $tag["tag"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Article Description</label>
                            <textarea id="content" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write article description here"></textarea>
                        </div>
                    </div>

                    <button type="button" id="submitBtn" name="submitBtn" ata-action="add" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Add new Article
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!--         EditWikiForm-->
    <div id="crud-edit" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-3/6  max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Update Wiki
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-edit">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="update-wiki-form" class="EditWiki p-4 md:p-5" method="post" action="index.php?page=wikis" enctype="multipart/form-data">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <input type="text" name="title" id="edit-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type article title" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="categorie_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="edit-categorie_id" name="categorie_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <?php
                                $categoryModel = new Categorie();
                                $categories = $categoryModel->getCategories();
                                foreach ($categories as $category):
                                    ?>
                                    <option value="<?php echo $category["categorie_id"]; ?>">
                                        <?php echo $category["categorie"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="tag" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag</label>
                            <select id="edit-tags" name="tag" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <?php
                                foreach ($tags as $tag):
                                    ?>
                                    <option value="<?php echo $tag["tag_id"]; ?>">
                                        <?php echo $tag["tag"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Article Description</label>
                            <textarea id="edit-content" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write article description here"></textarea>
                        </div>
                    </div>

                    <button type="button" id="edit-submitBtn" name="submitBtn"  class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Update Wiki
                    </button>
                </form>
            </div>
        </div>
    </div>


</section>
<script>
    let tags = []
    new MultiSelectTag('tag', {
        rounded: true, // default true
        shadow: true, // default false
        placeholder: 'Search', // default Search...
        tagColor: {
            textColor: '#327b2c',
            borderColor: '#92e681',
            bgColor: '#eaffe6',
        },
        onChange: function(values) {
            tags = values;
        }
    })
</script>


<script src="assets/js/mywiki.js"></script>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://demo.themesberg.com/windster/app.bundle.js"></script>

<!-- ====== Blog Section End -->