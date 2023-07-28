<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Créer un compte | Faculté des sciences</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
	<link rel="stylesheet" href="<?= base_url('css/form.css');?>">

	<style type="text/css">
	
	</style>
</head>
<body>
	<div class="user_champ_login">
		<div class="frm0">
		    <form action="<?php echo base_url('Admin/save_a_count'); ?>" method="post">
                <div class="ttl">Créer un compte </div>
                <div>
                    <span><i class="fa-regular fa-user icon"></i></span>
                    <input type="text" name="user_name" placeholder="Nom" size="50" />
                </div>
				<span style="color:#dc3545; text-decoration:  none; font-size: 12px; margin-left:15px;">
					<?= isset($validation)?display_error($validation,'user_name'):""; ?>
				</span>
                <div>
					<span><i class="fa-regular fa-envelope"></i></span>
					<input type="email" name="email"  placeholder="Entrez l'email"/>
				</div>
					<span style="color:#dc3545; text-decoration:  none; font-size: 12px; margin-left:15px;">
					<?= isset($validation)?display_error($validation,'email'):""; ?>
				</span>
                <div>
                    <span><i class="fa-solid fa-user-lock"></i></span>
                    <input type="password" name="password" placeholder="Mots de passe" size="50" />
                </div>
				<span style="color:#dc3545; text-decoration:  none; font-size: 12px; margin-left:15px;">
					<?= isset($validation)?display_error($validation,'password'):""; ?>
				</span>
                <div>
                    <span><i class="fa-solid fa-user-lock"></i></span>
                    <input type="password" name="password_conf" placeholder="Mots de passe" size="50" />
                </div>  
				<span style="color:#dc3545; text-decoration:  none; font-size: 12px; margin-left:15px;">
					<?= isset($validation)?display_error($validation,'password_conf'):""; ?>
				</span>              
                <div><input type="submit" value="Affirmer" /></div>
            </form>
		     <hr>
		     <a href=" <?php echo base_url('Admin/login'); ?>">Vous avez déja un compte?</a>

		</div>
	</div>
</body>
</html>