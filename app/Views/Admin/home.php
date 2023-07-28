
	<aside class="asd">
		
		
		<div class="sect1">
			
			<div class="nv-item active">
				<span class="icon-par"><i class="fa-solid fa-house"></i></span>
				<a href="<?php echo base_url();?>Admin/home">Accueil</a>
				
			</div>
			<div class="nv-item">
				<span class="icon-par"><i class="fa-solid fa-newspaper"></i></span>
				<a href="<?php echo base_url('Admin/topics');?>">Topics</a>
				
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
		 
				<div>
        <?php
        $suite_index = 0;
        foreach ($topics as $topic) { ?>
            <div class="label_field">
                <span><img src="<?= base_url('image/fs.jpg'); ?>"></span>
                <span class="label-filed-child2">Faculté des sciences <br><span class="dt_topic">
                        <?php echo $topic['date']; ?>
                    </span>
                </span>
            </div>

            <div class="topic_title">
                <?php echo $topic['title']; ?>
            </div>
            <div class="text" style="">
                <?php
                $chaine = $topic['body'];
                if (strlen($chaine) > 100) {
                    echo "<span class = \"shw" . $suite_index . "\">";
                    echo substr($chaine, 0, 100) . "...";
                    echo "</span>";
                    echo "<br> <button class=\"suite\"> voir la suite </button>";
                    echo "<span class=\"text_hiden a" . $suite_index . "\">$chaine</span>";
                    $suite_index++;
                } else {
                    echo "<span>";
                    echo substr($chaine, 0, 100) . ".";
                    echo "</span>";
                } ?>
                <div class="element">
                    <?php
                    $i = 0;
                    foreach ($images_topic as $image) {
                        if ($image['id_topic'] == $topic['id']) {
                            if ($i == 0) {
                                ?>
                                <div class="el">
                                    <a href="<?= base_url(); ?>Home/show_a_art/<?php echo $topic['id']; ?>"><img
                                            src="<?= base_url('image/images_topic/'); ?><?= $image['name']; ?>" class="img-dip-1"></a>
                                </div>

                                <div class="cp_like_coment">
                                    <span class="jaime"><i class="fa-regular fa-heart"></i>&nbsp <span class="cmt0">J'aime</span></span>
                                    <span class="coment"> <i class="fa-regular fa-comment-dots"></i>&nbsp <span
                                            class="cmt0">Commentaire</span></span>
                                </div>

                                <div class="txt_cmt_ar">
                                    <form action="">
                                        <div style="display:flex;">
                                            <textarea class="txtarea_cmp" name="comment_body"
                                                placeholder="Ecrivez un commentaire..."></textarea>
                                            <button type="submit" class="btn_com"><i class="fa-regular fa-paper-plane"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <?php
                            } else {

                                ?>
                                <div class="el">
                                    <img src="<?= base_url('image/images_topic/'); ?><?= $image['name'] ?>" class="img-dip-0">
                                </div>
                            <?php }
                            $i++;
                        }
                    }
        
        ?>
            </div>
        </div>
        <hr>
        <?php } ?>
    </div>





			<?php  foreach($topics as $topic) print_r($topic);?>

 

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

<script type="text/javascript">
    /*var element = document.querySelector('[class="text_hiden a1"]');
    console.log(element);*/

    var suite = document.querySelectorAll(".suite");
    var arrayElements = Array.from(suite);
    for (var i = 0; i < arrayElements.length; i++) {
        arrayElements[i].addEventListener('click', show_all_body);
    }

    function show_all_body() {
        var x = arrayElements.indexOf(this);
        var x1 = "[class=\"text_hiden a" + x + "\"]";
        var x2 = ".shw" + x;
        var a_afficher = document.querySelector(x1);
        var a_masquer = document.querySelector(x2);
        a_masquer.style.display = "none";
        a_masquer.style.with = "0";
        a_masquer.style.heigh = "0";
        a_afficher.classList.remove('text_hiden');
        this.style.display = "none";
    }

    var cmt = document.querySelectorAll()


    
</script>
	</script>
	<script type="text/javascript" src="js/fs_adm_1.js"></script>
</body>
</html>