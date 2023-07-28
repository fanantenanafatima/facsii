<div class="navigation">
    <ul>
        <li class="list  active">
            <a href="<?= base_url('/Home'); ?>">
                <span class="icon"><i class="fa-solid fa-house"></i></span>
                <span class="text">Actualité</span>
            </a>
        </li>

        <li class="list">
            <a href="<?= base_url(); ?>home/result">
                <span class="icon"><i class="fa-solid fa-graduation-cap"></i></span>
                <span class="text">Résultats</span>
            </a>
        </li>

        <li class="list">
            <a href="<?= base_url(); ?>home/learning">
                <span class="icon"><i class="fa-solid fa-person-chalkboard"></i></span>
                <span class="text">Cours</span>
            </a>
        </li>

        

        <li class="" id="logout">
            <a href="#">
                <span class="icon" id="logout"><i class="fa-solid fa-right-from-bracket"></i></span>
                <span class="text">log out</span>
            </a>
        </li>

       


        <div class="indicator"></div>
    </ul>
</div>
<div class="rt-div">
    <img src="<?= base_url('image/amin.png'); ?>" alt="image-users" class="avt-user">
    <div class="users-name">
        <p style="color: #F045D5;"><?php echo $user_name; ?></p>
    </div>
</div>
</header>


<div class="mn_div">
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
                    echo "<span id = \"shw" . $suite_index . "\" class=\"shw0\">";
                    echo substr($chaine, 0, 100) . "...";
                    echo "</span>";
                    echo "<br> <button class=\"suite\"> voir la suite </button>";
                    echo "<span class=\"text_hiden shw0 a" . $suite_index . "\">$chaine</span>";
                    $suite_index++;
                } else {
                    echo "<span>";
                    echo substr($chaine, 0, 100) . ".";
                    echo "</span>";
                } ?>

                <?php  
                    $x = 0;
                    foreach ($images_topic as $image) {
                        if ($image['id_topic'] == $topic['id']) {
                            $x++;
                        }
                    }
                    echo "<br><i>Image 1 / ".$x."</i>"; 
                ?>


                <div class="element">
                    <?php
                    $i = 0;
                    foreach ($images_topic as $image) {
                        if ($image['id_topic'] == $topic['id']) {
                            if ($i == 0) {
                                ?>
                                <div class="el">
                                    <a href="<?= base_url('Home/show_a_art'); ?><?php echo $topic['id']; ?>"><img
                                            src="<?= base_url('image/images_topic/'); ?><?= $image['name']; ?>" class="img-dip-1"></a>
                                </div>

                                <div class="cp_like_coment">
                                    <span class="jaime"><i class="fa-regular fa-heart"></i>&nbsp <span class="cmt0">J'aime</span></span>
                                    <span class="coment"> <i class="fa-regular fa-comment-dots"></i>&nbsp <span
                                            class="cmt0"><a href="<?= base_url('Home/show_a_art'); ?><?php echo $topic['id']; ?>" style="text-decoration : none; color: inherit;">Commentaire</a></span></span>
                                </div>

                                <div class="txt_cmt_ar">
                                    <form action="Home/comment/<?php echo $topic['id'];?>" method="post">
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
</div>

<div style="width :100vw; height:100vh; background-color :rgba(0,0,0,0.8) ; position : fixed; top : 0; left : 0; display: flex; align-items:center; justify-content: center; display:none;"  id="dics">
   <div style="width : 400px; height: 300px; background-color: rgb(230,230,230); border-radius: 10px; display:flex; flex-direction: column; text-align:center;">
            <div style=" text-align:right;   width: 400px;  margin-top: 5px;" id="x"> 
            <span style="background : rgba(0,0,0,0.1);width:100px; padding :8px 8px 10px 15px; " ><i class="fa-solid fa-x"></i></span> </div>
   
            <h4 style="margin-top:70px">Voulez vous vraiment se deconnecter?</h4>
            <div class="log_out_option" style="margin-top :30px">
                <div><a href="<?= base_url('Home/log_out'); ?>"
                        style="padding: 10px 60px; background : #1E90FF; border-radius : 20px; color: white; text-decoration: none;">Oui</a>
                </div>
                <div><a href="#" onclick="hide_it()"
                        style="padding: 10px 60px; background : #1E90FF; border-radius : 20px; color: white; text-decoration: none;">Non</a>
                </div>
            </div>
    </div>
</div>




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
        var x1 = "[class=\"text_hiden shw0 a" + x + "\"]";
        var x2 = "#shw" + x;
        var a_afficher = document.querySelector(x1);
        var a_masquer = document.querySelector(x2);
        a_masquer.style.display = "none";
        a_masquer.style.with = "0";
        a_masquer.style.heigh = "0";
        a_afficher.classList.remove('text_hiden');
        this.style.display = "none";
    }

    


    var logout = document.getElementById('logout');
    var dics = document.getElementById('dics');
    var x = document.getElementById('x');

    x.addEventListener('click', hide_it);
    logout.addEventListener('click',logout_prepare);
    function logout_prepare(){
        dics.style.display= "flex";
    }
    function hide_it(){
        dics.style.display= "none";
    }
</script>