var n = $('#disabled').val();

$('.create-fee').on('click', function (e) {
    $('#createFeeOpup').modal('show')
});

//=======================create Fee ==///////////////////////


$('#formFee').on('submit', function (e) {
    e.preventDefault();
    enableFormatElement(this);
    var data = $(this).serialize();
    var url = $(this).attr('action');
    $.post(url, data, function (data) {
        location.reload();
    })

})

function enableFormatElement(frmName) {
    $.each($(frmName).find('input,select'), function (i, element) {
        $(element).attr('disabled', false).css({'background': '#fff', 'border': '1px solid #ccc'});
    });
}

/////===============================///////
$('.btn-paid').on('click', function (e) {
    e.preventDefault();
    s_fee_id = $(this).data('id-paid');
    balance = $(this).val();

    $.get(url('/student/pay'), {s_fee_id: s_fee_id}, function (data) {
        console.log(data);
        /*$('#Paid').attr('id', 'Pay');
        $('#s_fee_id').val(data.s_fee_id);
        //$('#program_id').val(data.program_id);
        //$('#level_Id').val(data.level_id);
        $('#levelID').val(data.level_id);
        $('#Fee').val(data.school_fee);
        $('#feeID').val(data.fee_id);
        $('#Amount').val(data.student_amount);
        $('#Discount').val(data.discount);
        $('#Pay').val(balance);
        $('#Pay').focus();
        $('#Pay').select();
        $('#b').val(balance);
        //addItme(data);
        //showLevelStudent(data);*/
    });
});


////////////////////////////
function addItme(data) {
    $('#program_id').empty().append($("<option/>", {
        value: data.program_id,
        text: data.program
    }))
    $('#level_Id').empty().append($("<option/>", {
        value: data.level_id,
        text: data.level
    }))
}

/////////////////////////////////////
function showLevelStudent(data) {
    $.get("{{ route('showLevelStudent') }}", {level_id: data.level_id, student_id: data.student_id}, function (data) {
        $('.acadeaicDetails').text(data.detail)
    })
}

////////////////////////////////////////////
$('.btn-reset').on('click', function (e) {
    e.preventDefault();
    var caption = $(this).val();
    if (caption == "Reset") {
        $(this).val('Cancel');
        $('#btn-go').val('Save');
        $('#Pay').attr('id', 'Paid');
        $('#formPayment').attr('action', "{{route('savePayment')}}");
        enableFormatElement('#formPayment');
        return;


    }
    loction.relod();
})

///====================///
function disabled_input() {
    $.each($('body').find('.d'), function (i, item) {
        $(item).attr('disabled', true).css({'background': '#f5f5f5', 'border': '1px solid #ccc'});
        $(item).attr('readonly', false);
    })
}

$(document).ready(function () {
    if (n == 0) {
        disabled_input();
    }
});