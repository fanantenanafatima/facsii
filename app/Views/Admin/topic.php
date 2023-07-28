
	<aside class="asd">
		
		
		<div class="sect1">
			
			<div class="nv-item">
				<span class="icon-par"><i class="fa-solid fa-house"></i></span>
				<a href="<?php echo base_url('/Admin');?>">Accueil</a>
				
			</div>
			<div class="nv-item active">
				<span class="icon-par"><i class="fa-solid fa-newspaper"></i></span>
				<a href="<?php echo base_url();?>admin/topics">Topics</a>
				
			</div>
		</div>
		
	    <div class="sect2">
	    	<div class="nv-item">
				<span class="icon-par"><i class="fa-solid fa-graduation-cap"></i></span>
			<a href="#">Résultats</a>
			</div>
			<div class="nv-item">
				<span class="icon-par"><i class="fa-solid fa-person-chalkboard"></i></span>
				<a href="#">Cours</a>
			</div>
			<div class="nv-item">
				<span class="icon-par"><i class="fa-solid fa-users-line"></i></span>
				<a href="#">Membres</a>				
			</div>
	    </div>
		
		<div class="sect3">
			<div class="nv-item">
				<span class="icon-par"><i class="fa-solid fa-database"></i></span>
				<a href="#">Données</a>				
			</div>
			<div class="nv-item">
				<span class="icon-par"><i class="fa-solid fa-trash-can"></i></span>
				<a href="#">Corbeille</a>
				
			</div>
			<div class="nv-item">
				<span class="icon-par"><i class="fa-solid fa-right-from-bracket"></i></span>
				<a href="<?=base_url('Admin/logout');?>">Se deconnecter</a>
			 </div>
		</div>
		<hr>
	</aside>
	
		
	<main  class="mn" style="padding-left: 20px; ">
	
				<table >
					<tr><th>Titre</th><th>Corps</th><th>images</th><th>Action</th></tr>
					
						<?php 
							foreach($topics as $topic){
							echo "<tr><td class=\"tab_title\">".$topic['title']."</td>";
							echo "<td class=\"tab_body\">".$topic['body']."</td>";
							echo "<td class=\"tab_img\">";
								foreach($images_topic as $image){
									if ($image['id_topic'] == $topic['id']) {
										echo "<img src = \"".base_url('image/images_topic/').$image['name']."\" class=\"img\"/>";
									}
								}
							echo "</td>";
							echo "<td class=\"tab_act\">"; ?> 

							 
							<div class="link-action" style="width: 80px; background-color: blue; margin-left: 10px; margin-bottom: 40px;">
								<a href="<?= base_url('Topics/update_topic/') . urlencode($topic['id'])?>" style=""> <i class="fa-solid fa-pen"></i> Modifier </a>
							</div>
							<div class="link-action" style="width: 80px; background-color: red; margin-left: 10px; margin-bottom: 40px;">
								<a  href="<?= base_url('Topics/delete_topic/') . urlencode($topic['id']);?>" style="" id="<?= $topic['id']?>"> <i class="fa-solid fa-trash-can"></i> Supprimer </a>
							</div>
						</td></tr>

						<?php }
					
					?>

				</table>
			
	</main>
			
	<footer class="ft">
		<p></p>
	</footer>
	<div class="empity3"></div>
	<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
	<script type="text/javascript">
		$('.champ-logo').dragable();
		$('.name-fs').dragable();
		$('.champ-admin').dragable();


		var scrollables = document.getElementsByClassName('asd');
for (var i = 0; i < scrollables.length; i++) {
  scrollables[i].addEventListener('mouseenter', function () {
    this.style.overflowY = 'scroll';
  });
  scrollables[i].addEventListener('mouseleave', function () {
    this.style.overflowY = 'hidden';
  });
}
	</script>
	<script type="text/javascript" src="js/fs_adm_1.js"></script>
</body>
</html>