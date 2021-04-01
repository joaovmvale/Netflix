$(document).ready(function(){

    fCadastrar();
    fLocalComunicaServidor();
	
});

function fCadastrar(){

    $("#btnCadastrar").click(function(){

		return false;
	});

}

function fLocalComunicaServidor(){

    var myBitArray = sjcl.hash.sha256.hash($('#cadSenha').val());
	var senha_hash_sha256 = sjcl.codec.hex.fromBits(myBitArray);

    $("#btnCadastrar").click(function(){

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../php/enviar-email.php",
            data: {
                email: $("#cadMail").val(),
            },
            success: function(retorno){}
        })

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../php/email-confirmacao.php",
            data: {
                email: $("#cadMail").val(),
                senha: senha_hash_sha256,
            },
            success: function(retorno){}
        })

        return false;
    });
}