<?php
session_start();
include_once("./connection.php");
include_once("./url.php");

$data = $_POST;

//Modificação de Dados
if(!empty($data)) {
	// Criar contato se type é create
	if($data["type"] === "create") {
		$name = $data["name"];
		$phone = $data["phone"];
		$observations = $data["observations"];

		$query = "INSERT INTO contacts(name, phone, observations) VALUES(:name, :phone, :observations)";

		$stmt = $connection->prepare($query);

		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":phone", $phone);
		$stmt->bindParam(":observations", $observations);

		$stmt->execute();
		$_SESSION["msg"] = "Contato adicionado com sucesso!";

	// Editar dado (type == edit)
	} else if($data["type"] === "edit") {
		$name = $data["name"];
		$phone = $data["phone"];
		$observations = $data["observations"];
		$id = $data["id"];

		$query = "UPDATE contacts SET name = :name, phone = :phone, observations = :observations WHERE id = :id";

		$stmt = $connection->prepare($query);

		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":phone", $phone);
		$stmt->bindParam(":observations", $observations);
		$stmt->bindParam(":id", $id);

		$stmt->execute();
		$_SESSION["msg"] = "Contato atualizado com sucesso!";

	// Deletar dado (type == delete)
	} else if($data["type"] === "delete") {
		$id = $data["id"];

		$query = "DELETE FROM contacts WHERE id = :id";

		$stmt = $connection->prepare($query);

		$stmt->bindParam(":id", $id);

		$stmt->execute();
		$_SESSION["msg"] = "Contato removido com sucesso!";
	}

	//Redirect user to home
	header("Location:" . $BASE_URL . "../index.php");
	// exit();

// Seleção de Dados
} else {
	if(!empty($_GET)) { // Caso estejamos recebendo um ID por método GET
		// ----------------------------------------------------------------
		//                     RETORNA UM CONTATO PELO ID
		// ----------------------------------------------------------------	
		$id = $_GET['id'];

		$query = "SELECT * FROM contacts WHERE id = :id";

		$stmt = $connection->prepare($query);

		$stmt->bindParam(':id', $id);

		$stmt->execute();

		$contact = $stmt->fetch();
		} else {
		// ----------------------------------------------------------------
		//                     RETORNA TODOS OS CONTATOS
		// ----------------------------------------------------------------		
		$query = "SELECT * FROM contacts";

		$stmt = $connection->prepare($query);

		$stmt->execute();

		$contacts = $stmt->fetchAll();	
	}	
}

// Fechar conexão ao final da execução do processo (proces)
$connection = null;
?>