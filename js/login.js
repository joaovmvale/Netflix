/*$(document).ready(function(){

    fLocalComunicaServidor();
	
});

function fLocalComunicaServidor(){

    var myBitArray = sjcl.hash.sha256.hash($('#password').val());
	var senha_hash_sha256 = sjcl.codec.hex.fromBits(myBitArray);

    $("#btnLogin").click(function(){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../pages/cadastroOk.php",
            data: {
                email: $("#username").val(),
                senha: senha_hash_sha256,
            },
            success: function(retorno){}
        })
        return false;
    });
}*/