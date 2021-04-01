$(document).ready(function(){

    fCadastrar();
    fEnviarEmail();
	
});

function fCadastrar(){

    $("#btnCadastrar").click(function(){
		
		//var senha_hash_md5 = $.MD5($('#cadSenha').val());

		var myBitArray = sjcl.hash.sha256.hash($('#cadSenha').val());
		var senha_hash_sha256 = sjcl.codec.hex.fromBits(myBitArray);

		//alert(senha_hash_md5);
		alert(senha_hash_sha256);

        cadMail =$("#cadMail").val()
        cadSenha = $("#cadSenha").val()

        alert(cadMail)
        alert(cadSenha)

		return false;
	});

}

function fEnviarEmail(){

    $("#btnCadastrar").click(function(){

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../php/enviar-email.php",
            data: {
                email: $("#cadMail").val(),
            },
            sucess: function(retorno){}
        })

        location.href = "../php/conexao-bd.php"

    });
}