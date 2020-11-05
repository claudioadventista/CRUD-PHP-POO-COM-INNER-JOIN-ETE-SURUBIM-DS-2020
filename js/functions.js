// Só aceita números e ponto no campo altura
function SomenteNumero(e){
	var tecla = (window.event) ? event.keyCode : e.which;
				
	if ((tecla > 47 && tecla < 58))
		return true;
	else {
		if (tecla == 8 || tecla == 0 || tecla == 46)
			return true;
				else
					return false;
		 }
}
			
// Só cadastra se os campos nome e altura estiverem preenchidos nos limites pre-estabelecidos
function validaCampo(){
	var nome = form.nome.value;
	var altura = form.altura.value;
	var peso = form.peso.value;
				
	if(nome == ""|| altura == ""|| peso == ""){
		alert('Campos em branco');
		return false;	
	}
				
	if(altura < 0.50 || altura > 2.70){
		alert('Altura inválida');
		form.altura.focus();
		return false;	
	}
	
	if(peso < 20 || peso > 120){
		alert('Peso inválida');
		form.peso.focus();
		return false;	
	}
	
	if (nome.length < 3) {
		alert('Nome muito pequeno');
		form.nome.focus();
		return false;
	}
}

			
// Função valida campo pesquisa
function validaCampoPesquisa(){
	var busca = formPesquisa.buscaAluno.value;
				
	if(busca == ""){
		alert('Nada foi digitado em Pesquisa');
		return false;	
	}
}

// Função marcar todos os checkbox
		  function marcar(){
		    var boxes = document.getElementsByName("numeros[]");
		    for(var i = 0; i < boxes.length; i++)
		      boxes[i].checked = true;
		  }
		 
// Função desmarcar todos os checkbox 
		  function desmarcar(){
		    var boxes = document.getElementsByName("numeros[]");
		    for(var i = 0; i < boxes.length; i++)
		      boxes[i].checked = false;
		  }

