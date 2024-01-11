// Update Category
    document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.EditCategory');
    const modalForm = document.getElementById('update-category-form');
    const categoryIdInput = document.getElementById('categorie_id');
    const categoryNameInput = document.getElementById('categorie');

    editButtons.forEach(button => {
    button.addEventListener('click', function () {
    const categoryId = this.getAttribute('data-category-id');
    const categoryName = this.getAttribute('data-category-name');

    categoryIdInput.value = categoryId;
    categoryNameInput.value = categoryName;
});
});

    modalForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('index.php?page=catag', {
    method: 'POST',
    body: formData
})
    .then(response => response.json())
    .then(data => {
    if (data.success) {
    window.location.href = 'index.php?page=catag';
} else {
    console.error('Failed to update category:', data.error);
}
})
    .catch(error => {
    console.error('Error:', error);
});
});
});



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
