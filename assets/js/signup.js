const sign = document.getElementById("signUp");



sign.addEventListener('click', (event) => {
    event.preventDefault();

    // Sign up inputs
    // const checkBox = document.getElementById("chk");
    const userName = document.getElementById("signUpName").value;
    const signUpEmail = document.getElementById("signUpEmail").value;
    const signUpPassword = document.getElementById("signUpPassword").value;
    const signUpImage = document.getElementById("imageInput").files[0];

    // Create FormData object
    var formData = new FormData();
    formData.append('username', userName);
    formData.append('email', signUpEmail);
    formData.append('password', signUpPassword);
    formData.append('picture', signUpImage);
    formData.append('req', 'signup');

    formData.forEach((item) => {
        console.log(item);
    })

    // AJAX request
    $.ajax({
        type: "POST",
        url: "index.php?page=signup",
        data: formData,
        contentType: false,
        processData: false,
        success: (response) => {
            const data = JSON.parse(response);
            if (data.success) {
                window.location.href = 'index.php?page=signin';

                alert(data.success)

                // Additional success logic (e.g., redirecting to another page)
            } else if (data.errors) {
                console.log(data.errors);
                var error = data.errors
                var mesg = "";
                if (error.username_err !== false) {
                    mesg = error.username_err;
                } else if (error.email_err !== false) {
                    mesg = error.email_err;
                } else if (error.password_err !== false) {
                    mesg = error.password_err;
                } else if (error.userexists_err !== false) {
                    mesg = error.userexists_err;
                } else if (error.picture_err !== false) {
                    mesg = error.picture_err;
                }
                alert(mesg);
            }

        },

        error: (error) => {
            console.log(error);
            Swal.fire({icon: "error", title: "Error", text: "An unexpected error occurred. Please try again."});
        }
    });
});