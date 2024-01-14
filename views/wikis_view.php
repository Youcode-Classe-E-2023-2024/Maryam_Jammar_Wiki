<?php include_once 'navbar.php'?>
<div class="flex overflow-hidden bg-white pt-12">
    <?php include_once 'sidebar.php'?>
     <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
                <section class="container mx-auto px-8 py-8 lg:py-20">
                    <div class="flex justify-between">
                    <h2 class="block antialiased tracking-normal font-sans text-4xl font-semibold leading-[1.3] text-blue-gray-900 !text-3xl !leading-snug lg:!text-4xl">Wikis</h2>
                            <a data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="hidden sm:inline-flex ml-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-bold rounded-lg text-sm px-5 py-2.5 text-center items-center mr-3"

                            >
                                <!-- HeroIcon - User -->
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
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
                        <!--form popup-->
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

                    </div>
<!--                    <p class="block antialiased font-sans text-xl font-normal leading-relaxed text-inherit mt-2 w-full font-normal !text-gray-500 lg:w-5/12">Read about our latest achievements and milestones.</p>-->
<!--                    <a href="https://www.material-tailwind.com/" target="_blank">Generated with <b>Magic AI Blocks</b> by Creative Tim</a>.-->

<!--                    <a href="index.php?page=wikidetails">-->
                        <div class="mt-10 grid grid-cols-1 gap-10 lg:grid-cols-3">
                            <?php foreach ($wikis as $wiki): ?>
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

                                    <button data-wiki-id="<?= $wiki['wiki_id'] ?>"
                                            data-title="<?= $wiki['title'] ?>"
                                            data-content="<?= $wiki['content'] ?>"
                                            data-categorie  ="<?= $wiki['categorie_id'] ?>"
                                         data-modal-target="crud-edit" data-modal-toggle="crud-edit" class="edit-wiki-btns min-w-auto w-32 h-10 bg-cyan-600 p-2 rounded-l-full hover:bg-gray-500  text-white font-semibold  hover:flex-grow transition-all duration-200 ease-in-out">
                                        Edit
                                    </button>
                                    <button data-wiki-id="<?= $wiki['wiki_id'] ?>" class="delete-btns min-w-auto w-32 h-10 bg-teal-600 p-2 rounded-none hover:bg-red-600 text-white font-semibold  hover:flex-grow transition-all duration-200 ease-in-out">
                                        Delete
                                    </button>
                                    <button data-wiki-id="<?= $wiki['wiki_id'] ?>" class="archive-btns min-w-auto w-32 h-10 bg-cyan-600 p-2 rounded-r-full hover:bg-gray-500 text-white font-semibold hover:flex-grow transition-all duration-200 ease-in-out">
                                        Archive
                                    </button>
                                </div>
                                <!--</div>-->
                            </div>

                            <?php endforeach; ?>
                        </div>
                    </a>
                </section>

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

         <p class="text-center text-sm text-gray-500 my-10">
             &copy;
             <script>
                 document.write(new Date().getFullYear());
             </script>
             <!--                <a>Maryam JAMMAR</a>. -->
             All rights reserved.
         </p>
        </div>
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


<script src="assets/js/wiki.js"></script>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
