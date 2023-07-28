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
        <p style="color: #F045D5;"><?php echo $user_name ;?></p>
    </div>
</div>
</header>


<div class="mn_div">
   
    <div>
        
        <div class="label_field">
            <span><img src="<?=base_url('image/fs.jpg')?>"></span>
            <span class="label-filed-child2">Faculté des sciences <br>
            	<span class="dt_topic"><?php echo $topic['date'];?></span>
            </span>
        </div>
        <div class="topic_title">
            <?php   echo $topic['title']; ?>
        </div>

        <div class="text" style="">
	        <?php   
	            echo $topic['body'];
	        ?>
        </div>

        <div class="diapo">
        				<div class="element">
                            <?php   
                                $i = 0;
                                foreach($images_topic as $image){ 
                                    if($image['id_topic'] == $topic['id']){
                            ?>
		                                <div class="el">
		                                    <a href="<?=base_url();?>home/show_a_img/<?php echo $image['id'];?>"><img src="<?=base_url('image/images_topic/').$image['name'];?>"  class="img-dip-1" ></a>
		                                </div>
                            <?php       
                                    } 
                                }
                            ?>
                            <div class="cp_like_coment">
                                <span class="jaime"><i class="fa-regular fa-heart"></i>&nbspJ'aime</span>
                                <span class="coment"> <i class="fa-regular fa-comment-dots"></i>&nbspComment</span>
                            </div>
                            <div>   
                                <?php 
                                    foreach($comments as $comment){
                                        if($comment['id_topic'] == $topic['id']){ 
                                ?> 
                                            <div style="width : 80%; background-color:white; margin-top: 20px; margin-left: 0%; border-radius : 20px; padding :10px;" > <?php echo "<b>".$comment['user_name']." :</b>  ".$comment['body']; ?> </div>
                                <?php           
                                        }
                                    }
                                 ?>

                            </div>
        				</div>
        			</div>
                <hr>

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


    var images = document.querySelectorAll('img');
	for(var i = 0; i < images.length; i++){
		images[i].addEventListener('click',image_grand);
	}

	function image_grand(){
		
	}
</script>