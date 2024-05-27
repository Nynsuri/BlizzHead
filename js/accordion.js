
    function toggleEditForm(id) {
        var form = document.querySelector('#collapse' + id + ' .edit-form');
        if (form.style.display === 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }




