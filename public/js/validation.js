$(".needs-validation").submit(function () {

    var form = $(this);
    if (form[0].checkValidity() === false) {
        //je selectionne tous les invalid feedback
        $(".invalid-feedback").each(function (index,elt){
            elt.textContent = elt.previousElementSibling.validationMessage
        })
        event.preventDefault();
        event.stopPropagation();
    }
    form.addClass('was-validated');
});

