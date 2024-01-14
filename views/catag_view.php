<?php include_once 'navbar.php'?>
<div class="flex overflow-hidden bg-white pt-16">
    <?php include_once 'sidebar.php'?>
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>

                <div class="grid grid-col-2 mx-auto">
                    <div>
                        <!-- category form -->
                        <div class="p-10 flex items-center justify-center">
                            <div class="bg-white p-4 rounded-2xl shadow-lg max-w-md w-96">
                                <h1 class="text-xl font-semibold mb-4">Add a Category</h1>
                                <div class="mb-4 flex justify-between">
                                    <form action="index.php?page=catag" method="post">
                                        <input type="text" name="categorie" placeholder="Ajouter une catégorie" class="email-input w-72 px-4 py-2 border rounded-lg text-gray-700 focus:border-blue-500 md:mb-8" required/>
                                        <button name="ctg-submit" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 focus:outline-none">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- category list -->
                        <div class="overflow-hidden max-w-sm mx-auto rounded-lg border border-gray-200 shadow-md m-5">
                            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                <tbody id="edit-delete-btns" class="divide-y divide-gray-100 border-t border-gray-100">
                                <?php
                                foreach ($categories as $categorie){
                                    ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4"> <?= $categorie['categorie']?> </td>

                                        <td class="px-6 py-4">
                                            <div class="flex justify-end gap-4">
                                                <input type="hidden" name="categorie_id" value="<?= $categorie['categorie_id'] ?>">

<!--                                                deleteCategory-->
                                                <button class="DeleteCategory" data-category-id="<?= $categorie['categorie_id'] ?>">
                                                    <a>
                                                        <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke-width="1.5"
                                                                stroke="currentColor"
                                                                class="h-6 w-6"
                                                                x-tooltip="tooltip"
                                                        >
                                                            <path
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                            />
                                                        </svg>
                                                    </a>
                                                </button>


                                                <!--editCatgeory-->
                                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="EditCategory block text-gray bg-transparent" data-category-id="<?= $categorie['categorie_id'] ?>"
                                                        data-category-name="<?= $categorie['categorie'] ?>" type="button">
                                                    <a x-data="{ tooltip: 'Edite' }" >
                                                        <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke-width="1.5"
                                                                stroke="currentColor"
                                                                class="h-6 w-6"
                                                                x-tooltip="tooltip"
                                                        >
                                                            <path
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                                            />
                                                        </svg>
                                                    </a>
                                                </button>


                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

<!---->
<!--                    <div class="vertical-line"></div>-->
<!--                    <style>-->
<!--                        .vertical-line {-->
<!--                            border-left: 1px solid #dbdada;-->
<!--                            height: 500px;-->
<!--                            margin-top: 88px;-->
<!--                        }-->
<!--                    </style>-->


                    <hr class="mt-12 border-t w-1/2 mx-auto" />

                    <div>
                        <!-- category form -->
                        <div class="p-10 flex items-center justify-center">
                            <div class="bg-white p-4 rounded-2xl shadow-lg max-w-md w-96">
                                <h1 class="text-xl font-semibold mb-4">Add a Tag</h1>
                                <div class="mb-4 flex justify-between">
                                    <form action="index.php?page=catag" method="post">
                                        <input type="text" name="tag" placeholder="Add tag" class="email-input w-72 px-4 py-2 border rounded-lg text-gray-700 focus:border-blue-500" required/>
                                        <button name="tag-submit" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 focus:outline-none">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- category list -->
                        <div class="overflow-hidden max-w-sm mx-auto rounded-lg border border-gray-200 shadow-md m-5">
                            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                                <tbody id="edit-delete-btnsTag" class="divide-y divide-gray-100 border-t border-gray-100">
                                <?php
                                foreach ($tags as $tag){
                                    ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4"><?= $tag['tag'] ?></td>

                                        <td class="px-6 py-4">
                                            <div class="flex justify-end gap-4">
<!--                                                deleteTag-->
                                                <button class="DeleteTag" data-tag-id="<?= $tag['tag_id'] ?>">
                                                    <a>
                                                        <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke-width="1.5"
                                                                stroke="currentColor"
                                                                class="h-6 w-6"
                                                                x-tooltip="tooltip"
                                                        >
                                                            <path
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                            />
                                                        </svg>
                                                    </a>
                                                </button>

                                                <!-- Main modal -->
<!--                                                editTAg-->

                                                <button data-modal-target="crud-tag" data-modal-toggle="crud-tag"  class="EditTag block text-gray bg-transparent" data-tag-id="<?= $tag['tag_id'] ?>"
                                                        data-tag-name="<?= $tag['tag'] ?>" type="button">
                                                    <a x-data="{ tooltip: 'Edite' }" >
                                                        <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke-width="1.5"
                                                                stroke="currentColor"
                                                                class="h-6 w-6"
                                                                x-tooltip="tooltip"
                                                        >
                                                            <path
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                                            />
                                                        </svg>
                                                    </a>
                                                </button>


                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

<!--                editTagForm-->
                <div id="crud-tag" tabindex="-1" x-data="{ tooltip: 'Edit' }" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Update your Tag
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-tag">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form id="update-tag-form" class="p-4 md:p-5" method="post">
                                <input type="hidden" name="tag_id" id="tag_id">
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2">
                                        <label for="tag" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag name</label>
                                        <input type="text"  name="tag" id="tag" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type tag name" required="">
                                    </div>
                                </div>
                                <button onclick="updateTag()" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    Update Tag
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

<!--                editCategoryFotm-->
                <div id="crud-modal" x-data="{ tooltip: 'Edit' }" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Update your Category
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form id="update-category-form" class="p-4 md:p-5" method="post">
                                <input type="hidden" name="categorie_id" id="categorie_id">
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2">
                                        <label for="categorie" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category name</label>
                                        <input type="text"  name="categorie" id="categorie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type category name" required="">
                                    </div>
                                </div>
                                <button onclick="updateCategory()" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    Update Category
                                </button>
                            </form>
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
    <script>

        console.log("test");


        $("#edit-delete-btns").on('click', '.DeleteCategory', function () {
            let categoryId = $(this).data('category-id');
            console.log(categoryId);
        $.ajax({
        type: "post",
        url: "index.php?page=catag",
        data: { categoryId: categoryId },
        success: function (data, status) {
        if (status === "success") {
        alert("Category " + categoryId + " has been deleted successfully!");
        window.location.reload();
        console.log(status);
        // Vous pouvez également actualiser la liste des catégories ici si nécessaire

        } else {
            alert("Failed to delete Category. Please try again.");
        }
        }
        });
        });

    </script>

    <script>
        $("#edit-delete-btnsTag").on('click', '.DeleteTag', function () {
            let tagId = $(this).data('tag-id');
            console.log(tagId);
            $.ajax({
                type: "post",
                url: "index.php?page=catag",
                data: { tagId: tagId },
                success: function (data, status) {
                    if (status === "success") {
                        alert("Tag " + tagId + " has been deleted successfully!");
                        window.location.reload();
                        console.log(status);
                        // Vous pouvez également actualiser la liste des catégories ici si nécessaire

                    } else {
                        alert("Failed to delete Tag. Please try again.");
                    }
                }
            });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
    <script src="assets/js/category.js"></script>
    <script src="assets/js/tag.js"></script>