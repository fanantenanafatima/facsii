<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Se connecter | Faculté de sciences</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	<link rel="stylesheet" href="<?= base_url('css/form.css');?>">
	<style type="text/css">
	</style>
</head>

<body>

	<div class="user_champ_login">

		<div class="frm0">

			<form action="<?= base_url('Home/login_validation') ?>" method="post">
				<div class="ttl">Se connecter</div>
				<div>
					<span><i class="fa-regular fa-user icon"></i></span>
					<input type="text" name="user_name" size="50" placeholder="Entrez le nom" />
				</div>
				<span style="color:#dc3545; text-decoration:  none; font-size: 12px; margin-left:15px;">
					<?= isset($validation)?display_error($validation,'nce'):""; ?>
				</span>


				<div>
					<span><i class="fa-regular fa-user icon"></i></span>
					<input type="text" name="user_fname" size="50" placeholder="Entrez le prénom" />
				</div>
				<span style="color:#dc3545; text-decoration:  none; font-size: 12px; margin-left:15px;">
					<?= isset($validation)?display_error($validation,'user_fname'):""; ?>
				</span>

				<div>
					<span><i class="fa-regular fa-id-card"></i></span>
					<input type="text" name="nce" size="50" placeholder="Carte d'etudiant N°" />
				</div>
				<span style="color:#dc3545; text-decoration:  none; font-size: 12px; margin-left:15px;">
					<?= isset($validation)?display_error($validation,'nce'):""; ?>
				</span>

				<div>
					<span><i class="fa-solid fa-user-lock"></i></span>
					<input type="password" name="password" size="50" placeholder="Entrez le mot de passe" />
				</div>
				<span style="color:#dc3545; text-decoration:  none; font-size: 12px; margin-left:15px;">
					<?= isset($validation)?display_error($validation,'password'):""; ?>
				</span>


				<div><input type="submit" value="Se connecter" /></div>

				<div><a href="#">Mot de passe oublié ?</a></div>


			</form>
			<hr>
			<a href=" <?= base_url('Home/create_a_count'); ?>">Créer un compte</a>

		</div>
	</div>

</body>

</html>