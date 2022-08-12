<?php
	include_once('./templates/header.php');
?>

<div class="container editContact__container">
	<?php include_once('./templates/backBtn.php'); ?>

	<h1 class="main__title">Editar Contato</h1>

	<form action="<?= $BASE_URL ?>config/process.php" method="POST">
		<input type="hidden" name="type" value="edit">
		<input type="hidden" name="id" value="<?= $contact["id"] ?>">
		<div class="mb-3">
			<label class="form-label" for="name">Nome do contato:</label>
			<input class="form-control" type="text"  id="name" name="name" value="<?= $contact['name'] ?>" required>
		</div>
		<div class="mb-3">
			<label class="form-label" for="phone">Número do contato:</label>
			<input class="form-control" type="tel"  id="phone" name="phone" value="<?= $contact['phone'] ?>" required pattern="[0-9]{2} [0-9]{4}-[0-9]{4}">
		</div>
		<div class="mb-3">
			<label for="observations" class="form-label">Observações:</label>
			<textarea class="form-control" id="observations" name="observations"><?= $contact['observations'] ?></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Atualizar</button>
	</form>

</div>

<?php
	include_once('./templates/footer.php');
?>

