<?php
	include_once('./templates/header.php');
?>

<div class="container">
	<?php if(isset($printMessage) && $printMessage != ''): ?>
		<p class="session-msg"><?= $printMessage ?></p>
	<?php endif ?>

	<h1 class="main__title">Minha Agenda</h1>

	<?php if(count($contacts) > 0): ?>
		<table class="table">
			<thead>
				<tr class="table-primary">
					<th scope="col">#</th>
					<th scope="col">Nome</th>
					<th scope="col">Telefone</th>
					<th scope="col">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($contacts as $contact): ?>
					<tr>
						<td scope="row"><?= $contact['id'] ?></td>
						<td><?= $contact['name'] ?></td>
						<td><?= $contact['phone'] ?></td>
						<td class="actions">
							<a href="<?= $BASE_URL ?>show.php?id=<?= $contact['id'] ?>"><i class="fas fa-eye check-icon"></i></a>
							<a href="<?= $BASE_URL ?>edit.php?id=<?= $contact['id'] ?>"><i class="fas fa-edit edit-icon"></i></a>
							<form action="<?= $BASE_URL ?>config/process.php" method="POST">
								<input type="hidden" name="type" value="delete">
								<input type="hidden" name="id" value="<?= $contact["id"] ?>">
								<button class="delete-btn" type="submit"><i class="fas fa-times delete-icon"></i></button>
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php else: ?>
		<p class="list-text--empty">
			Ainda não há contatos na sua agenda,
			<a href="<?= $BASE_URL ?>create.php">adicione um contato</a>.
		</p>
	<?php endif ?>
</div>

<?php
	include_once('./templates/footer.php');
?>

