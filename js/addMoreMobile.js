var count1=2;

$("#addMobile").click(function(){

    if(count1<6)
    {
        var mail='';

        mail+='<div id="mobilebox" class="mb-3">';
        mail+='<label class="form-label">Other Mobile Number</label>';
        mail+='<div class="input-group">';
        mail+='<input type="tel" name="userMobile[]" class="form-control" placeholder="xxxxxxxxxx">';
        mail+='<button class="btn btn-danger" type="button" id="removeMobile">-</button>';
        mail+='</div>';
        mail+='</div>';
        
        $('#mobileAll').append(mail);

        count1++;
    }
    else
    {
        swal('Limit over! You can add only 5 mobile numbers.');
    }
});

$(document).on('click','#removeMobile',function(){

    $(this).closest('#mobilebox').remove();

    count1--;

});