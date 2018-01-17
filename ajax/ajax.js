// Validar inicio de sesion
   function validate() {
	var name = document.getElementById('name').value
	var pass = document.getElementById('pass').value

	var url="php/validate.php";

	$.ajax({
		type:"post",
		url:url,
		data:{name:name,pass:pass},
		beforeSend: function(){
			$('#result').html("<div class='alert alert-warning' role='alert'>Procesando solicitud</div>")
		},
		success:function(response){
			if (response==1) {
				$('#result').html("<div class='alert alert-success' role='alert'>Usuario verificado</div>");		
				location.href="dashboard.php";
			}
			else{
				$('#result').html("<div class='alert alert-danger' role='alert'>Usuario o Contraseña incorrecta!</div>");
			}			
		}
	})
}

// Funciones Js para la Tabla Usuarios

$(search_users());

function search_users(query) {

	$.ajax({
		url: "php/users/search_users.php",
		type: 'POST',
		data: {query: query},
	})
	.done(function(response) {
		$("#table-search-users").html(response);
	})
	.fail(function() {
		$("#table-search-users").html("error");
		console.log("error");
	})	
	
}

$(document).on('keyup','#search-users',function(){
	var valor = $(this).val();
	if (valor != "") {
		search_users(valor);
	} else {
		search_users();
	}
});

function update_users(id) {
	
	$.ajax({
		url: 'php/users/update_name_users.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#name').val(response);
	})
	.fail(function() {
		console.log("error");
	})
	
	$.ajax({
		url: 'php/users/update_lastname_users.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#lastname').val(response);
	})
	.fail(function() {
		console.log("error");
	})

	$.ajax({
		url: 'php/users/update_dni_users.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#dni').val(response);
	})
	.fail(function() {
		console.log("error");
	})

	$.ajax({
		url: 'php/users/update_email_users.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#email').val(response);
	})
	.fail(function() {
		console.log("error");
	})

}

$(document).on('change','#idusers',function () {
	var valor = $(this).val();
	update_users(valor);
});

// Funciones Js para la Tabla Cliente

$(search_client());

function search_client(query) {

	$.ajax({
		url: "php/client/search_client.php",
		type: 'POST',
		data: {query: query},
	})
	.done(function(response) {
		$("#table-search-client").html(response);
	})
	.fail(function() {
		$("#table-search-client").html("error");
		console.log("error");
	})	
	
}

$(document).on('keyup','#search-client',function(){
	var valor = $(this).val();
	if (valor != "") {
		search_client(valor);
	} else {
		search_client();
	}
});

function update_client(id) {
	
	$.ajax({
		url: 'php/client/update_name_client.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#name').val(response);
	})
	.fail(function() {
		console.log("error");
	})
	
	$.ajax({
		url: 'php/client/update_lastname_client.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#lastname').val(response);
	})
	.fail(function() {
		console.log("error");
	})

	$.ajax({
		url: 'php/client/update_phone_client.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#phone').val(response);
	})
	.fail(function() {
		console.log("error");
	})

	$.ajax({
		url: 'php/client/update_dni_client.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#dni').val(response);
	})
	.fail(function() {
		console.log("error");
	})
}

$(document).on('change','#idclient',function () {
	var valor = $(this).val();
	update_client(valor);
});

// Funciones Js para la Tabla Mascotas

function select_pet(idclient) {
	$.ajax({
		url: 'php/consultation/select_pet_idclient.php',
		type: 'POST',
		data: {idclient: idclient},
	})
	.done(function(response) {
		$('#idPet_Consultation').html(response);
	})
	.fail(function() {
		console.log("error");
	})
	
}

$(document).on('change','#idClient_Consultation', function() {
	var valor = $(this).val()
	select_pet(valor);
});

$(search_pet());

function search_pet(query) {

	$.ajax({
		url: "php/pet/search_pet.php",
		type: 'POST',
		data: {query: query},
	})
	.done(function(response) {
		$("#table-search-pet").html(response);
	})
	.fail(function() {
		$("#table-search-pet").html("error");
		console.log("error");
	})	
	
}

$(document).on('keyup','#search-pet',function(){
	var valor = $(this).val();
	if (valor != "") {
		search_pet(valor);
	} else {
		search_pet();
	}
});

function update_pet(id) {
	
	$.ajax({
		url: 'php/pet/update_name_pet.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#name').val(response);
	})
	.fail(function() {
		console.log("error");
	})
	
	$.ajax({
		url: 'php/pet/update_species_pet.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#species').val(response);
	})
	.fail(function() {
		console.log("error");
	})

	$.ajax({
		url: 'php/pet/update_race_pet.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#race').val(response);
	})
	.fail(function() {
		console.log("error");
	})

	$.ajax({
		url: 'php/pet/update_haircolor_pet.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#haircolor').val(response);
	})
	.fail(function() {
		console.log("error");
	})

	$.ajax({
		url: 'php/pet/update_birthdate_pet.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#birthdate').val(response);
	})
	.fail(function() {
		console.log("error");
	})
	$.ajax({
		url: 'php/pet/update_idClient_pet.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#idClient').val(response);
	})
	.fail(function() {
		console.log("error");
	})
}

$(document).on('change','#idpet',function () {
	var valor = $(this).val();
	update_pet(valor);
});


// Funciones Js para la Tabla Consulta

$(search_consultation());

function search_consultation(query) {

	$.ajax({
		url: "php/consultation/search_consultation.php",
		type: 'POST',
		data: {query: query},
	})
	.done(function(response) {
		$("#table-search-consultation").html(response);
	})
	.fail(function() {
		$("#table-search-consultation").html("error");
		console.log("error");
	})	
	
}

$(document).on('keyup','#search-consultation',function(){
	var valor = $(this).val();
	if (valor != "") {
		search_consultation(valor);
	} else {
		search_consultation();
	}
});

function update_Consultation(id) {
	
	$.ajax({
		url: 'php/consultation/update_client_Consultation.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#update_idClient_Consultation').val(response);
	})
	.fail(function() {
		console.log("error");
	})
	
	$.ajax({
		url: 'php/consultation/update_pet_Consultation.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#update_idPet_Consultation').val(response);
	})
	.fail(function() {
		console.log("error");
	})

	$.ajax({
		url: 'php/consultation/update_date_Consultation.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#date_Consultation').val(response);
	})
	.fail(function() {
		console.log("error");
	})

	$.ajax({
		url: 'php/consultation/update_consult_Consultation.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#query_Consultation').val(response);
	})
	.fail(function() {
		console.log("error");
	})

	$.ajax({
		url: 'php/consultation/update_description_Consultation.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#description_Consultation').val(response);
	})
	.fail(function() {
		console.log("error");
	})
	$.ajax({
		url: 'php/consultation/update_cost_Consultation.php',
		type: 'POST',		
		data: {id: id},
	})
	.done(function(response) {
		$('#cost_Consultation').val(response);
	})
	.fail(function() {
		console.log("error");
	})
}

$(document).on('change','#idConsultation',function () {
	var valor = $(this).val();
	update_Consultation(valor);
});

