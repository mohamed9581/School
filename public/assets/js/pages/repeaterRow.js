
// $('#btnRepeater').click(function () {
//     let rowRepeater = $("#1").html();
//     let nbr=$('.classe').length;
//     let i = nbr;
//     nbr++;

//     $("#newlink").append("<tr id='"+nbr+"' class='classe'>"+rowRepeater+"</tr>");
//     $("#" + nbr).children("th").text(nbr);
//     $("#" + nbr).children("th").attr("id", "nbrClassement" + nbr);
//     $("#" + nbr).find("input").attr("id", "nameClasse-" + nbr);
//     $("#" + nbr).find("#nameClasse-"+nbr).attr("name","name["+i+"][ar]");
//     $("#" + nbr).find("input").last().attr("id","nameClasse-en-"+nbr);
//     $("#" + nbr).find("#nameClasse-en-"+nbr).attr("name","name["+i+"][en]");
//     $("#" + nbr).find("select").attr("id","nameGrade-"+nbr);

// })


// $("#tbleClasse").on('click', '.btnDelete', function () {
//     let nbr=$('.classe').length;
//     if (nbr > 1) {
//     $(this).closest('tr').remove();
//     }
// });



$('#btnRepeater').click(function () {
    let rowRepeater = $('#showModal').find("#1").html();
    let nbr=$('#showModal').find('.classe').length;
    let i = nbr;
    nbr++;

    $('#showModal').find("#newlink").append("<tr id='"+nbr+"' class='classe'>"+rowRepeater+"</tr>");
    $('#showModal').find("#" + nbr).children("th").text(nbr);
    $('#showModal').find("#" + nbr).children("th").attr("id", "nbrClassement" + nbr);
    $('#showModal').find("#" + nbr).find("input").attr("id", "nameClasse-" + nbr);
    $('#showModal').find("#" + nbr).find("#nameClasse-"+nbr).attr("name","name["+i+"][ar]");
    $('#showModal').find("#" + nbr).find("input").last().attr("id","nameClasse-en-"+nbr);
    $('#showModal').find("#" + nbr).find("#nameClasse-en-"+nbr).attr("name","name["+i+"][en]");
    $('#showModal').find("#" + nbr).find("select").attr("id","nameGrade-"+nbr);

})


$('#showModal').find("#tbleClasse").on('click', '.btnDelete', function () {
    let nbr = $('#showModal').find('.classe').length;
        let i = nbr-1;
    if (nbr > 1) {
        $(this).closest('tr').remove();
    }
    $('#showModal').find("#" + nbr).find("#nameClasse-" + nbr).attr("name", "name[" + i + "][ar]");
    $('#showModal').find("#" + nbr).find("#nameClasse-en-" + nbr).attr("name", "name[" + i + "][en]");
});



    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#classeTable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });



$('#btnRepeaterFees').click(function () {
    let rowRepeater = $('#newlink').find("#1").html();
    let nbr = $('#newlink').find('.fee').length;
    // console.log(nbr);

    let i = nbr;
    nbr++;

    $('#newlink').append("<tr id='"+nbr+"' class='fee'>"+rowRepeater+"</tr>");
    $('#newlink').find("#" + nbr).children("th").text(nbr);
    $('#newlink').find("#" + nbr).children("th").attr("id", "nbrClassement" + nbr);
    $('#newlink').find("#" + nbr).find('select[name="student_id[]"]').attr("id","student_id-"+nbr);
    $('#newlink').find("#" + nbr).find('select[name="fee_id[]"]').attr("id","fee_id-"+nbr);
    $('#newlink').find("#" + nbr).find('select[name="amount[]"]').attr("id","amount-"+nbr);
    $('#newlink').find("#" + nbr).find('select[name="description[]"]').attr("id","description-"+nbr);

})

$('#newlink').on('click', '.btnRemove', function () {
    let nbr = $('#newlink').find('.fee').length;
        let i = nbr-1;
    if (nbr > 1) {
        $(this).closest('tr').remove();
    }

});

