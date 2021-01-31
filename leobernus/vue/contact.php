<!DOCTYPE html>
<html>

	<?php include("vue/head.php"); ?>

	<body>
		<?php include("vue/headernav.php"); ?>

		<section>
			<h1> Me contater </h1>

			<?php if ($envoifait==0) {	$tpost='';	} ?>

			<form method="post" action="to_mail.php" enctype="multipart/form-data">
				<p>
					Votre email (obligatoire) : <input type="email" name="email" />
				</p>
		        <label>Votre message (obligatoire) :<br /></label>
		        <textarea rows="10" cols="100" name="tpost"></textarea>'

    			<p> <img src="modele/captcha2.php" alt="Code de vérification" />
				<label>Sécurité : recopier le code à gauche</label> : <input type="text" name="captcha" /></p>
				<input type="submit" name="submit" value="Envoyer" />
		    </form>
		    <p><?php echo $reponse ; $reponse=''; $envoifait=0; $tpost=''; ?></p>
		</section>

		<?php include("vue/footer.php"); ?>

	</body>
</html>
