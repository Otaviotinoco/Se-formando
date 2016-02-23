    <html>
    <head>
    <title>Cadastro</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando JQuery -->
    <script src="//code.jquery.com/jquery-2.2.0.min.js"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...")
                        $("#bairro").val("...")
                        $("#cidade").val("...")
                        $("#uf").val("...")


                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);

                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
    </head>

    <body background="DSC_0679_1.jpg">
    <!-- Inicio do formulario -->
	<br>
	<center><FONT size="6" face="AR BONNIE" color="black">Cadastro</font></center>
	<br>
      <form method="get" action="validacadastro.php">
        <center><label>Nome
		<input name="nome" type="text" id="nome" /></label><br /></center>
		<br>
		<center><label>Sobrenome
		<input name="sobrenome" type="text" id="sobrenome" /></label><br /></center>
		<br>
		<center><label>Apelido
		<input name="apelido" type="text" id="apelido" /></label><br /></center>
		<br>
		<center><label>Email:
        <input name="email" type="text" id="email" value="" size="10"  /></label><br /></center>
		<br>
		<center><label>Cep:
        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" /></label><br /></center>
		<br>
        <center><label>Rua:
        <input name="rua" type="text" id="rua" size="60" /></label><br /></center>
		<br>
        <center><label>Bairro:
        <input name="bairro" type="text" id="bairro" size="40" /></label><br /></center>
		<br>
        <center><label>Cidade:
        <input name="cidade" type="text" id="cidade" size="40" /></label><br /></center>
		<br>
        <center><label>UF:
        <input name="uf" type="text" id="uf" size="2" /></label><br /></center>
		<br>
		<center><label>Senha:
        <input name="senha" type="password" id="senha" size="2" /></label><br /></center>
		<br>
		<center><label>Telefone:
        <input name="telefone" type="text" id="telefone" size="2" /></label><br /></center>
		<br>
		<center><label for="imagem">Imagem:
		<input name="arq" type="file" id="arq"></label></center>
		<br>
		<center><input type="submit" value="Cadastrar" a class="but"><center>

      </form>
    </body>

    </html>
