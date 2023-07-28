<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Faculté des sciences</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	 <link rel="stylesheet" href="<?= base_url('css/body_home_sm.css');?>">
        <link rel="stylesheet" href="<?= base_url('css/home_650_css.css');?>">
        <link rel="stylesheet" href="<?= base_url('css/home_880_css.css');?>">
        <link rel="stylesheet" href="<?= base_url('css/home_1174_css.css');?>">
        <link rel="stylesheet" href="<?= base_url('css/home_2800_css.css');?>">
       
        <link rel="stylesheet" href="<?= base_url('css/body_admin_frm.css');?>">

<style>
    	 .text_hiden {
            display: none;
        }

                
@media only screen and (min-width :0px) and (max-width : 650px){
	body{
		background-color: white;
		margin: 0px 5px;
	}
	*{
		font-size: 16px;
	}
    .navigation {
        width: 100vw;
        height: 60px;
        position: absolute;
        display: flex;
        top: calc(100vh - 60px);
        left: 0px;
		background-color : white;
    }
	.navigation ul{
		display: flex;
		width: 100vw;
		padding-left: 0;
		padding-right: 0;
		margin-top: 0px;
	}

	.navigation ul li{
		position: relative;
		list-style: none;
		height: 20px;
		z-index: 1;
		width : 25vw;
		
		
	}

	.navigation ul li:first-child{
		padding-left: 0;
		margin-left: 0;
		text-align: left;
	}

	.navigation ul li a{
		position: relative;
		display: flex;
		justify-content: center;
		align-items:  left;
		width: 100%;
		text-align: center;
		font-weight: 500;
	}

	.navigation ul li a .icon{
		position: relative;
		display: block;
		 font-size: 20px;
		 text-align: center;
		 transition: 0.5s;
		 color: rgba(0,0,0,0.7);
		font-weight : 100;
	}

	.navigation ul li.active a .icon{
		transform: translateY(0px);
		 color: #1E90FF;
	}
	.navigation ul li a{
		text-decoration: none;
	}

	.navigation ul li a .text{
		font-size : 10px;
		color: rgba(0,0,0,0.7);
		
	}
	
	.navigation ul li a{
		display : flex;
		flex-direction : column;
	}
	.navigation ul li.active a .text {
		
		color: #1E90FF;
	}


	.logo-fs{
		width: 20px;
		height: 20px; 
		border-radius: 100%; 
		margin: 3px 10px auto 0px;
	}	

	.avt-user{
		width: 0px; 
		height: 0px; 
		margin: 0px; 
		padding: 0;
		display: none;

	}

	.sct{
		width: 100%;
		background-color: white;
        padding-top: 70px;
	}

	main{
		padding: 30px 0px 30px 0px;
	}
	
	.header1{
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		background-color: transparent;
		height: 64px;
	}

	.empity4{
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		background-color: #FFA07A;
		height: 30px;
	}

	.lf-div{
		position: fixed;
		left: 0px;
		display: flex;
		justify-content: center;
	}
	.rt-div{
		position: fixed;
		right: 10px;
		display: flex;
		justify-items: center;
		width: auto;
		top: -5px;
	}

	.rch1{
		width: 0px;
		height: 0px;
		margin: 0px;
		padding: 0px;
		display: none;
	}

	.users-name{
		display: none;
		width: 0;
		height: 0;
		padding: 0;
		margin: 0;
	}
	.bt-h1{
		display: none;
	}


	.show-form{
		display: block;
		position: fixed;
		right: 10px;
		top: 2px;
		width: 27px;
		height: 27px;
	}

	.btn-show-form{
		font-size: 10px;
	}

	.btn-sub1{
		width: 0;
		height: 0;
		display: none;
		margin: 0;
		padding: 0;
	}

	.champ-name-fs1{
		position: fixed;
		left: 30px;
		top: 5px;
		font-weight: bold;
		color: white;
	}

	.suite{
		font-family: Roboto;
		background-color: transparent;
		border: none;
		text-decoration: underline;
		color: #310F57;
		padding: 0px;
	}
	
	.dt_topic{
		font-size : 10px;
	}
	
	.shw0{
		font-size:13px;
	}
	
		
}

@media only screen and (min-width : 500px) and (max-width : 650px){
	.sct{
		width: calc(100vw - 20px)
		background-color: white;
	}

	body{
		background-color: white;
		margin: 10px 10px;
	}
}
</style>

    <style type="text/css">
        .text_hiden {
            display: none;
			width : 0;
			height : 0;
			padding : 0;
			margin: 0;
        }

        @media only screen and (min-width :301px) {
            .txt_cmt_ar {
                width: 80%;
                margin-top: 10px;
                background-color: rgba(0,0,0,0.1);
                margin-left: 10%;
                border-radius: 10px;
            }

            .txtarea_cmp {
                width: 90%;
                background-color: rgba(0,0,0,0.1);
                border: none;
                padding: 10px 0px 0px 20px;
                font-size: inherit;
                height: 25px;
                outline: none;
            }

            .btn_com {
                width: 10%;
                background-color: rgba(0,0,0,0.1);
                border: none;
                font-size: 18px;
            }
        }

        @media only screen and (max-width :300px) {
            .txt_cmt_ar {
                width: 100%;
                margin-top: 10px;
                background-color: rgba(0,0,0,0.1);
                border-radius: 10px;
            }

            form div textarea::placeholder {
                font-size: 9px;
            }

            .txtarea_cmp {
                width: 70%;
                background-color: rgba(0,0,0,0.1);
                border: none;
                padding: 10px 0px 0px 20px;
                font-size: inherit;
                height: 25px;
                outline: none;
            }

            .btn_com {
                width: 30%;
                background-color: rgba(0,0,0,0.1);
                border: none;
                font-size: 18px;
            }

            .cmt0 {
                display: none;
                width: 0;
                height: 0;
                margin: 0;
                padding: 0;
            }

            .jaime {
                background-color: rgba(0,0,0,0.1);
                width: 45%;
                text-align: center;
                border-radius: 10px;
                padding-top: 3px;
                padding-bottom: 3px;
                color: blue;
            }

            .coment {
                background-color: rgba(0,0,0,0.1);
                width: 45%;
                text-align: center;
                border-radius: 10px;
                padding-top: 3px;
                padding-bottom: 3px;
                color: blue;
            }

            .cp_like_coment {
                display: flex;
                justify-content: space-between;
                width: 100%;
                margin-left: 0px;
                margin-top: 6px;
            }


        }

    </style>
	
     <style>
		@media only screen and  (min-width : 650px) and (max-width :1170px){
			.navigation ul{
				display: flex;
				padding-left: 0;
				padding-right: 0;
				margin-top: 0px;
			}
			.navigation ul li{
		
		width : 25%;
		
		
	}
		}
	 </style

</head>

<body>
    <section class="sct">
        <header class="header1">
            <div class="empity4"></div>
            <div class="show-form"><button class="btn-show-form" id="show-form"> <i
                        class="fa-solid fa-magnifying-glass"></i></button></div>
            <div class="champ-name-fs1"><span class="name-fs1">Faculté des sciences</span></div>
            <div class="lf-div">
                <img src="<?= base_url('image/fs.jpg'); ?>" alt="logo" class="logo-fs">
                <form class="frm-rch1">
                    <input type="search" name="" placeholder="Recherche..." class="rch1">
                    <button type="submit" class="btn-sub1"><span class="sp-one"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                    </button>
                </form>

            </div>
