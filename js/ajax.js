function validate() {
	var name = document.getElementById('name').value
	var pass = document.getElementById('pass').value

	var url="php/validate.php";

	$.ajax({
		type:"post",
		url:url,
		data:{name1:name,pass1:pass},
		beforeSend: function(){
			$('#result').html("Procesando Solicitud")
		},
		success:function(response){
			if (response==1) {
				location.href="dashboard.php";
			}
			else{
				$('#result').html("Usuario o Clave Incorrecta");
			}			
		}
	})
}