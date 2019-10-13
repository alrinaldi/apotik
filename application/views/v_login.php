<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rakha Farma</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="shortcut icon" href="<?php echo base_url().'assets/images/clinic.png'?>" >
    <link href="<?php echo base_url().'desain/lumino/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url().'desain/lumino/css/font-awesome.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'desain/lumino/css/datepicker3.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'desain/lumino/css/lg.css'?>" rel="stylesheet">
  
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <link href="<?php echo base_url().'template/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet'?>">

   <script type="text/javascript" src="<?php echo base_url().'template/js/jquery-1.3.2.min.js'?>"></script>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body >

                
              

                 <div class="profile-userpic">
        
            </div>


                     <div class="login-page">
              
       
                       <p><?php echo $this->session->flashdata('msg');?></p>

  <div class="form">
                   
                             
                 
                <div class="form-contact">
                
                    
                       <img src="<?php echo base_url().'assets/images/kissclipart-system-administrator-icon-clipart-computer-icons-s-3f1cec1746905cbc.png'?>" style="width: 100px; position: center;">
                         <h2><span style="color:#0ea0c3; ">Rakha Farma</span></h2>
                         <form class = "login-form" name="loginform" id="loginform" action="<?php echo base_url().'index.php/login/auth'?>" method="post" >
                       <div class="form-group">
                            
                             <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" name ="username"  class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                          
                             <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                            <input type="password" name ="password"  class="form-control" placeholder="Password">
                            </div>
                        </div>
                      <button type="submit" class="btn btn-info">Login</button>
                       
                    </form>
                     
                </div>
            </div>
            </div>
    </body>
                    
               
 <!--          <div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form">
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <button>login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
     -->

<!-- <div class="wrap-form-contact"> 
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-contact">
                    <h3><span>INDOSMART</span> Login Form</h3>
                    
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="pwd" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn btn-default">login</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div> -->
<script src="<?php echo base_url().'desain/lumino/js/jquery-1.11.1.min.js'?>"></script>
    <script src="<?php echo base_url().'desain/lumino/js/bootstrap.min.js'?>"></script>
         <script src="<?php echo base_url().'desain/lumino/js/custom.js'?>"></script>
<script type="text/javascript">
    
    $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
</body>
</html>
