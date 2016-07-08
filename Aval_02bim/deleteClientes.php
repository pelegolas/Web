<!--Pedro Barbosa e Edgard Alexandre-->
<?php
require_once 'init.php';
//Pega o ID
$id = isset($_GET['id']) ? $_GET['id'] : null;
//Validar
if (empty($id)) {
    echo "ID Não Válido";
    exit;
}
//Exclui
$PDO  = db_connect();
$sql  = "DELETE FROM clientes WHERE idCliente = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
if ($stmt->execute()) {
    header('Location:cliente.php');
} else {
    echo "Erro ao excluir!";
    print_r($stmt->errorInfo());
}
?>