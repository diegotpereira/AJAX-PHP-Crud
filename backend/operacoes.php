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
    if (count($_POST) > 0) {
        # code...
        if ($_POST['type'] == 2) {
            # code...
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $cidade = $_POST['cidade'];
            $SQL = "UPDATE `tb_funcionario` SET `nome` = '$nome', `email` = '$email', `telefone` = '$telefone', `cidade` = '$cidade' WHERE id = $id";
            if (mysqli_query($conexao, $SQL)) {
                # code...
                echo json_encode(array("statusCode" => 200));
            }else {
                # code...
                echo "Error: " .$SQL. "<br>" .mysqli_error($conexao);
            }
            mysqli_close($conexao);
        }
    }
    if (count($_POST) > 0) {
        # code...
        if ($_POST['type'] == 3) {
            # code...
            $id = $_POST['id'];
            $SQL = "DELETE FROM `tb_funcionario` WHERE id = $id";
            if (mysqli_query($conexao, $SQL)) {
                # code...
                echo $id;
            } else {
                # code...
                echo "Error: " .$SQL . "<br>" .mysqli_error($conexao);
            }
            mysqli_close($conexao);
        }
    }
    if (count($_POST) > 0) {
        # code...
        if ($_POST['type'] == 4) {
            # code...
            $id = $_POST['id'];
            $SQL = "DELETE FROM tb_funcionario WHERE id in ($id)";
            if (mysqli_query($conexao, $SQL)) {
                # code...
                echo $id;
            }else {
                echo "Error: " .$SQL . "<br>" .mysqli_error($conexao);
            }
            mysqli_close($conexao);
        }
    }
?>