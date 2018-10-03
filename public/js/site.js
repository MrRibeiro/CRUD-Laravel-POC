$ = jQuery.noConflict();

$( ".del-colab" ).click(function() {
    swal({
        title: "Você tem certeza?",
        text: "Uma vez deletado, não poderá recuperar este colaborador!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            let btnthis = this;
            $.ajax({
                url: "/del/" +$(this).attr('id'),
                context: document.body
            }).done(function() {
                swal("Colaborador deletado com sucesso!", {
                    icon: "success",
                });
                $( btnthis ).parents('tr').remove();
            }).fail(function (status, xhr) {
                swal("Algo deu errado!", "Tente novamente!", "error");
            });

        } else {
            swal("O colaborador não foi deletado!");
        }
    });
});

$( ".edit-colab" ).click(function() {
    $.ajax({
        url: "/edit/" +$(this).attr('id'),
        context: document.body
    }).done(function(data) {
        console.log(data);
        setUpEdit(data);
        $("#modal-edit-colab").modal();
    }).fail(function (status, xhr) {
        alert(xhr);
        console.log(status, xhr);
    });

    function setUpEdit(data) {
        $("#idedit").val(data.id);
        $("#fristnameedit").val(data.fristname);
        $("#lastnameedit").val(data.lastname);
        $("#roleedit").val(data.role);
        $("#empresaedit").val(data.empresa);
    }
});

$( "#form-new-colab" ).submit(function(e) {
    e.preventDefault();
    let dados = jQuery( this ).serialize();
    jQuery.ajax({
        type: "POST",
        url: "/",
        data: dados,
        context: document.body
    }).done(function(result) {
        swal(result.title, result.text, result.status ? 'success' : 'error').then((confirm) => {
            if (confirm) {
                location.reload();
            }
        });
        $("#modal-new-colab").modal('hide');
    }).fail(function (dados, xhr) {
        let result = JSON.parse(dados);
        swal(result.title, result.text, result.status ? 'success' : 'error').then((confirm) => {
            if (confirm) {
                location.reload();
            }
        });
    });
});

$( "#form-edit-colab" ).submit(function(e) {
    e.preventDefault();
    let dados = jQuery( this ).serialize();
    jQuery.ajax({
        type: "POST",
        url: "/update",
        data: dados,
        context: document.body
    }).done(function(result) {
        swal(result.title, result.text, result.status ? 'success' : 'error').then((confirm) => {
            if (confirm) {
                location.reload();
            }
        });
        $("#modal-edit-colab").modal('hide');
    }).fail(function (dados, xhr) {
        let result = JSON.parse(dados);
        swal(result.title, result.text, result.status ? 'success' : 'error').then((confirm) => {
            if (confirm) {
                location.reload();
            }
        });
    });
});
