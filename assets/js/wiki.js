function addWiki() {
    var title = $("#title").val();
    var categorie_id = $("#categorie_id").val();
    var tags = $("#tag").val();
    var content = $("#content").val();

    $.ajax({
        type: "POST",
        url: "index.php?page=wikis",
        data: { title: title, categorie_id: categorie_id, tags: tags, content: content, create_wiki: 'add' },
        success: function (data) {
            if (data === "Wiki added successfully") {
                alert(data);
                window.location.href = 'index.php?page=wikis';
            } else if (data === "Failed to add Wiki") {
                alert(data);
            } else {
                alert("Erreur inattendue lors de l'ajout du wiki");
            }
        },
        error: function (error) {
            console.error("Erreur lors de la requête AJAX:", error);
        }
    });
}
$("#submitBtn").click(() => {
    addWiki();
})

// Update Tag
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-wiki-btns');
    const editSubmitBtn = document.getElementById('edit-submitBtn');
    const wikiIdInput = document.getElementById('wiki-id-input');
    const titleInput = document.getElementById('edit-title');
    const contentInput = document.getElementById('edit-content');
    const categorieInput = document.getElementById('edit-categorie_id');
    const tagsInput = document.getElementById('edit-tags');


    let wikiId;
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            wikiId = this.getAttribute('data-wiki-id');
            const wikiTitle = this.getAttribute('data-title');
            const wikiContent = this.getAttribute('data-content');
            const wikiCategorie = this.getAttribute('data-categorie');
            const wikiTags = this.getAttribute('data-tags');


            // wikiIdInput.value = wikiId;
            titleInput.value = wikiTitle;
            contentInput.value = wikiContent;
            categorieInput.value = wikiCategorie;
            tagsInput.value = wikiTags;

        });
    });

    editSubmitBtn.addEventListener('click', function (e) {
        e.preventDefault();
        console.log('zzzz')
        const formData = new FormData();

        formData.set("title", titleInput.value);
        formData.set("content", contentInput.value);
        formData.set("categorie", categorieInput.value);
        formData.set("tags", tagsInput.value);
        formData.set("wiki_id", wikiId);


        fetch('index.php?page=wikis', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Wiki updated successfully');
                    window.location.href = 'index.php?page=wikis';
                } else {
                    console.error('Failed to update wiki:', data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });




});


const deleteBtn = document.querySelectorAll(".delete-btns");

deleteBtn.forEach((btn) => {
    btn.addEventListener("click", function() {
        let wiki_id = this.getAttribute("data-wiki-id");
        deleteWiki(wiki_id);
    })
})

function deleteWiki(wiki_id) {
    $.get(
        "index.php?page=wikis&delete=true&id=" + wiki_id,
        (data) => {
            console.log(data);
            alert('Wiki deleted successfully');
            window.location.href = 'index.php?page=wikis';
        }
    )
}


    const archiveBtn = document.querySelectorAll(".archive-btns");

    archiveBtn.forEach((btn) => {
        btn.addEventListener("click", function() {
            let wiki_id = this.getAttribute("data-wiki-id");
            archiveWiki(wiki_id);
        })
    })

function archiveWiki(wiki_id) {
    $.get(
        "index.php?page=wikis&archive=true&id=" + wiki_id,
        (data) => {
            console.log(data);
            alert('Wiki archived successfully');
            window.location.href = 'index.php?page=wikis';
        }
    )
}

const restoreBtn = document.querySelectorAll(".restore-btns");

restoreBtn.forEach((btn) => {
    btn.addEventListener("click", function() {
        console.log('zzzz')

        let wiki_id = this.getAttribute("data-wiki-id");
        restoreWiki(wiki_id);
    })
})

function restoreWiki(wiki_id) {
    $.get(
        "index.php?page=restorewiki&restore=true&id=" + wiki_id,
        (data) => {
            console.log(data);
            alert('Wiki restored successfully');
            window.location.href = 'index.php?page=restorewiki';
        }
    )
}
