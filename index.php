<?php
    include 'backend/dataBase.php';
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="css/style.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/mascara.js"></script>

    <script src="ajax/ajax.js"></script>
</head>
<body>
    <div class="container">
        <p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>Gerenciar Usuários</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addFuncModal" class="btn btn-success" data-toggle="modal">
                            <i class="material-icons"></i><span>Adicionar Usuário</span>
                        </a>
                        <a href="JavaScript:void(0)" class="btn btn-danger" id="deletar_multiplos">
                            <i class="material-icons"></i><span>Deletar</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selecionarTodos">
                                <label for="selecionarTodos"></label>
                            </span>
                        </th>
                        <th>ID Nº</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         $result = mysqli_query($conexao, "SELECT * FROM tb_funcionario");
                         $i = 1;
                         while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr id="<?php echo ["id"]; ?>">
                       <td>
                           <span class="custom-checkbox">
                               <input type="checkbox" class="usuario_checkbox" data-usuario-id="<?php echo $row["id"]; ?>">
                               <label for="checkbox2"></label>
                           </span>
                       </td>
                       <td><?php echo $i; ?></td>
                       <td><?php echo $row["nome"]; ?></td>
                       <td><?php echo $row["email"]; ?></td>
                       <td><?php echo $row['telefone']; ?></td>
                       <td><?php echo $row['cidade']; ?></td>
                       <td>
                           <a href="#editFuncModal" class="edit" data-toggle="modal">
                               <i class="material-icons atualizar" data-toggle="tooltip" 
                               data-id ="<?php echo $row["id"]; ?>"
                               data-nome ="<?php echo $row["nome"]; ?>"
                               data-email ="<?php echo $row["email"]; ?>"
                               data-telefone ="<?php echo $row["telefone"]; ?>"
                               data-cidade ="<?php echo $row["cidade"]; ?>"
                               title="Editar"></i>
                           </a>
                           <a href="#deletarFuncModal" class="delete" data-id="<?php echo $row["id"]; ?>"
                           data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Deletar"></i></a>
                       </td>
                    </tr>
                    <?php 
                    $i++;
                         }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Adicionar Funcionário -->
    <div id="addFuncModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="user_form">
                    <div class="modal-header">
                        <h4 class="modal-title">Novo Usuário</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Fechar</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="phone" id="telefone" name="telefone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="city" id="cidade" name="cidade" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="1" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <button type="button" class="btn btn-success" id="btn-add">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar HTML -->
    <div id="editFuncModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="atualizar_form">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Usuário</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_u" name="id" class="form-control" required>
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" id="nome_u" name="nome" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" id="email_u" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="phone" id="telefone_u" name="telefone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="city" id="cidade_u" name="cidade" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="2" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <button type="button" class="btn btn-info" id="atualizar">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delete HTML -->
    <div id="deletarFuncModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Deletar Usuário</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_d" name="id" class="form-control">
                        <p>Tem certeza de que deseja excluir estes registros?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <button type="button" class="btn btn-danger" id="deletar">Deletar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>