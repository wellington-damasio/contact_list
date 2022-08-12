<?php
	include_once('./templates/header.php');
?>

<div class="container view-contact__container">
	<?php include_once('./templates/backBtn.php'); ?>

	<h1 class=main__title><?= $contact['name'] ?></h1>

	<p class="bold">Telefone:</p>
	<p><?= $contact['phone'] ?></p>

	<p class="bold">Observações:</p>
	<p><?= $contact['observations'] ?></p>
</div>

<?php
	include_once('./templates/footer.php');
?>

