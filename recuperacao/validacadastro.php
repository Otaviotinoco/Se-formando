<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
  <body>

<?php

$upload_dir = 'fotos/';

//basename retorna apenas o nome do arquivo do caminho.
$target_file = $upload_dir . basename($_FILES["arq"]["name"]);
echo $target_file.'<br>';

$uploadOk = 1;

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["arq"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image. <br>";
        $uploadOk = 0;
    }
}



if ($_FILES["arq"]["size"] > 500000) {
    echo "Arquivo muito grande.";
    $uploadOk = 0;
}


$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Permitido apenas JPG, JPEG, PNG & GIF.";
    $uploadOk = 0;
}

if (is_dir($upload_dir) && is_writable($upload_dir)) {
    echo 'folder ok<br>';
} else {
    echo 'Diretorio não existe ou sem permissao de escrita';
}

if ($uploadOk == 0) {
    echo "Seu arquivo não pode ser carregado.";
} else {

    if (move_uploaded_file($_FILES["arq"]["tmp_name"], $target_file)) {
        echo "O arquivo ". basename( $_FILES["arq"]["name"]). " foi carregado com sucesso.<br>";
    } else {
        echo "Erro no upload do arquivo.<br>";
    }



$files = scandir($upload_dir);
$total = count($files);
$images = array();
for($x = 0; $x <= $total; $x++){

    }
}


require_once 'bancodedados.php';
require_once 'agendaDAO.php';
require_once 'agendaclass.php';



$nome = filter_input(INPUT_POST, 'nome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$apelido = filter_input (INPUT_POST, 'apelido');
$email = filter_input(INPUT_POST, 'email');
$cep = filter_input(INPUT_POST, 'cep');
$rua = filter_input (INPUT_POST, 'rua');
$bairro = filter_input (INPUT_POST, 'bairro');
$cidade = filter_input (INPUT_POST, 'cidade');
$uf = filter_input (INPUT_POST, 'uf');
$senha = filter_input(INPUT_POST, 'senha' , FILTER_SANITIZE_SPECIAL_CHARS);
$telefone = filter_input(INPUT_POST, 'telefone');
$imagem = $target_file;









if ((!$nome) || (!$sobrenome) || (!$email) || (!$apelido)|| (!$senha)|| (!$cep)||  (!$telefone)){

   echo "ERRO: <br /><br />";

   if (!$nome){

       echo "Nome é requerido.<br />";

   }

   if (!$sobrenome){

       echo "Sobrenome é requerido.<br /> <br />";

   }

   if (!$email){

       echo "Email é um campo requerido.<br /><br />";

   }

   if (!$apelido){

       echo "Nome de apelido é requerido.<br /><br />";

   }

   if (!$imagem){

       echo "Você deve inserir uma imagem.<br /><br />";

   }

   if (!$senha){

       echo "A senha é um campo requerido.<br /><br />";

   }

   if (!$cep){

       echo "O cep é um campo requerido.<br /><br />";

   }




   if (!$telefone){

       echo "O telefone é um campo requerido.<br /><br />";

   }

   echo '<a href="cadastro.php">Voltar</a> <br /><br />';



}else{

$bd = new BancoDeDados();
$usuario = new Usuario(NULL, $nome, $sobrenome, $cep, $email, $telefone, $imagem, $apelido, $senha, $rua, $bairro, $cidade, $uf);
$agendaDAO = new AgendaDAO($bd);
$insert = $agendaDAO->adicionaUsuario($usuario);



	if(mysql_errno() == 1062) {
		echo $erros[mysql_errno()];
		exit;
	} else {
		echo "Erro nao foi possivel efetuar o cadastro";




if($insert){
        header('location:paginainicial.html');





}
else{
    echo '<p>Erro ao cadastrar usuario, usuario já existe: ' . $bd->getErro() . '.</p>';
}

    $bd->fecha();

  }

}

?>


	</body>

</html>
