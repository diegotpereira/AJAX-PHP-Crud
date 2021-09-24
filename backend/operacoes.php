<?php
    include 'dataBase.php';

    if (count($_POST) > 0) {
        # code...
        if ($_POST['type'] == 1) {
            # code...
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $cidade = $_POST['cidade'];

            $SQL = "INSERT INTO `tb_funcionario`(`nome`, `email`, `telefone`, `cidade`) VALUES ('$nome', '$email', '$telefone', '$cidade')";

            if (mysqli_query($conexao, $SQL)) {
                # code...
                echo json_encode(array("statusCode" => 200));
            }else {
                # code...
                echo "Error: " . $SQL . "<br>" . mysqli_error($conexao);
            }
            mysqli_close($conexao);
        }
    }
?>