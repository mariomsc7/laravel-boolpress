require('./bootstrap');

// DELETE POST CONFIRM

const delForm = document.querySelectorAll('.delete-post-form');

// looppare sulle form e aggiungere evento addAEventListener

delForm.forEach(form => {
    form.addEventListener('submit', function(e) {
        const resp = confirm('Are you sure you want to delete?')

        if(!resp) {
            e.preventDefault();
        }
    });
});