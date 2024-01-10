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
    console.log(status);
    // Vous pouvez également actualiser la liste des catégories ici si nécessaire

} else {
    alert("Failed to delete Category. Please try again.");
}
}
});
});
