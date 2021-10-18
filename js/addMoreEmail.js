var count=2;

$("#addEmail").click(function(){

    if(count<6)
    {
        var mail='';

        mail+='<div id="emailbox" class="mb-3">';
        mail+='<label class="form-label">Other Email Address</label>';
        mail+='<div class="input-group">';
        mail+='<input type="email" name="userEmail[]" class="form-control" placeholder="name@example.com">';
        mail+='<button class="btn btn-danger" type="button" id="removeEmail">-</button>';
        mail+='</div>';
        mail+='</div>';
        
        $('#emailAll').append(mail);

        count++;
    }
    else
    {
        swal('Limit over! You can add only 5 email address.');
    }
});

$(document).on('click','#removeEmail',function(){

    $(this).closest('#emailbox').remove();

    count--;

});