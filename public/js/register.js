$(document).ready(function () {

    if ($('#userTable').length) {
        loadUsers();
    }

    $('#addUserForm').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append('action', 'store');

        $.ajax({
            url: '/demo/controllers/UserController.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.trim() === 'success') {
                    $('#addUserForm')[0].reset();
                    Swal.fire({
                        icon: 'success',
                        title: 'User Added',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(()=>{
                        window.location.href = '/demo/views/login.php';  
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: res
                    });
                }
            }
        });
    });

});

/* DELETE */
$(document).on('click', '.deleteBtn', function () {

    let id = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true
    }).then((result) => {

        if (result.isConfirmed) {
            $.post('/demo/controllers/UserController.php', {
                action: 'delete',
                id: id
            }, function (res) {
                if (res.trim() === 'success') {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Deleted',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    loadUsers();
                }
            });
        }
    });
});

/* GET USER FOR UPDATE */
$(document).on('click', '.updateBtn', function () {

    let id = $(this).data('id');

    $.post('/demo/controllers/UserController.php', {
        action: 'get',
        id: id
    }, function (res) {

        let user = JSON.parse(res);

        $('#edit_id').val(user.id);
        $('#edit_name').val(user.name);
        $('#edit_email').val(user.email);

        $('input[name="hobby[]"]').prop('checked', false);
        if (Array.isArray(user.hobby)) {
            user.hobby.forEach(hobby => {
                $('input[name="hobby[]"][value="' + hobby + '"]').prop('checked', true);
            });
        }

        $('#oldProfileImg').hide();
        if (user.profile) {
            $('#oldProfileImg')
                .attr('src', '/demo/public/uploads/' + user.profile)
                .show();
        }
    });
});

/* UPDATE */
$(document).on('submit', '#updateForm', function (e) {

    e.preventDefault();

    let formData = new FormData(this);
    formData.append('action', 'update');

    $.ajax({
        url: '/demo/controllers/UserController.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            if (res.trim() === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Updated',
                    timer: 1500,
                    showConfirmButton: false
                });
                $('#editModal').modal('hide');
                loadUsers();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Update Failed'
                });
            }
        }
    });
});

$('#loginForm').on('submit', function (e) {
    e.preventDefault();

    let email = $('#email').val().trim();
    let password = $('#password').val().trim();

    $.ajax({
        url: '/demo/controllers/UserController.php',
        method: 'POST',
        data: {
            action: 'login',
            email: email,
            password: password
        },
        success: function (res) {

            if (res.trim() === 'success') {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Login Successful',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = '/demo/views/view.php';
                });

            } else {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: res,
                    timer: 2500,
                    showConfirmButton: false
                });
            }
        }
    });
});


/* LOAD USERS */
function loadUsers() {

    $.post('/demo/controllers/UserController.php', {
        action: 'list'
    }, function (res) {

        let users = JSON.parse(res);
        let rows = '';

        if (users.length === 0) {
            rows = `<tr><td colspan="6" class="text-center">No Data</td></tr>`;
        } else {
            users.forEach(user => {
                rows += `
                    <tr>
                        <td>${user.id}</td>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>${user.hobby ?? ''}</td>
                        <td>
                            ${user.profile
                                ? `<img src="/demo/public/uploads/${user.profile}" width="50" height="50" class="rounded-circle">`
                                : 'No Image'}
                        </td>
                        <td>
                            <button class="btn btn-sm btn-primary updateBtn"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal"
                                data-id="${user.id}">
                                Edit
                            </button>
                            <button class="btn btn-sm btn-danger deleteBtn"
                                data-id="${user.id}">
                                Delete
                            </button>
                        </td>
                    </tr>
                `;
            });
        }

        $('#userTable').html(rows);
    });
}
