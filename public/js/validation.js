$(".needs-validation").submit(function () {
    var form = $(this);
    if (form[0].checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
    }
    form.addClass('was-validated');
});
