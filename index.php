<?php  @session_start();  ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       <meta charset="UTF-8">
       
       
       <!-- Tag Viewport -->
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
       
       
       <!-- link dos ficheiros bootstrap, incluindo um bootstrap alterado pela techie, que contem
            um novo estilo para os elementos -->
       <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
       <link href="css/bootstrap.techie.css" rel="stylesheet" type="text/css"/>
       <link href="css/navbar_transparente.css" rel="stylesheet" type="text/css"/> 
       <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
       <link href="css/animate.css" rel="stylesheet" type="text/css"/> 

    
       
       
       
       
    
        <title>Index</title>
        
     
      
        
    </head>
    <body data-spy="scroll" data-target=".navbar">
        
        <div class="col-sm-12 col-lg-12 navbar-container" style="padding-top: 25px;">
            

            <nav class="navbar navbar-inverse  navbar-fixed-top" role="navigation">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-exemplo">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                <a class="navbar-brand" href="#">UCM-Faltas.com</a>
              </div>

              
      
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse navbar-ex3-collapse" id="navbar-exemplo">
                <ul class="nav navbar-nav">
                    <li class=""><a href="#seccao_login">Iniciar Sessao</a></li>
                    <li><a href="#seccao_sobre">Sobre nós</a></li>
                    <li><a href="#seccao_contactos">Contacte-nos</a></li>
                  
                </ul>
                
              </div>
              <!-- /.navbar-collapse -->
            </nav>

           
            
            
          </div>
        <section id ="seccao_login"> 
        <div class="row">    
                
            <div class="col-sm-12 col-lg-12 navbar-container">
                
                <br><br>
                
                 <div class="row">
      <div class="col-sm-6 col-lg-6" data-effect="slide-left">
        
          <blockquote>
          <p>"Quem ensina aprende ao ensinar e quem aprende ensina ao aprender"</p>
          <small>-Paulo Freire <cite title="Source Title">Source Title</cite></small>
        </blockquote>
      </div>
                 </div>
                <br><br><br><br><br><br>
                     
                <div class="row" id="formulario_centralizado">
                     
          <div class="col-sm-12 col-lg-12" data-effect="slide-right">
              <form class="form-horizontal" method="GET">
              <div class="form-group">
              <?php
        // put your code here
        
        
        require_once 'conexao.php';
        
        
        if(isset($_GET["sub"])){
        $email = @$_GET["email"];
        $pass = @$_GET["password"];
        
        login($conexao, $email, $pass);
        
        }
        
        ?>
                <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="email" name ="email" class="form-control has-success has-feedback" placeholder="Email" required>
              </div>
              </div>
              <div class="form-group">
                
                  
                <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" id="inputSuccess2"      class="form-control" placeholder="password" required>
                </div>
            
            </div>
              </div>
                  
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <a class="azul" onclick="esqueceu()">esqueceu-se da palavra passe?</a><br>
                    <div class="checkbox">
                    <label>
                       
                        <input name="lembrar" type="checkbox"> Lembrar-se de mim
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" name="sub" class="btn btn-default">Iniciar Sessão</button> 
                </div>
              </div>
            </form>
          </div>
                </div>
                
                <div class="row">
                    
                     
      <div class="col-sm-6 col-lg-6 pull-right">
          <br><br><br>
        <blockquote class="pull-right" data-effect="slide-right">
          <p>"Quem ensina aprende ao ensinar e quem aprende ensina ao aprender"</p>
          <small>-Paulo Freire <cite title="Source Title">Source Title</cite></small>
        </blockquote>
      </div>
    </div>
                </section>
        
                <br><br>
                
                <section id="parallax2" class="section parallax" data-stellar-background-ratio="0.5">
                    <div class="" style="padding-top: 40px; padding-bottom: 40px; text-align: center;">
      <blockquote class="bigquote branca color-white"><i class="branca">"Quem ensina aprende ao ensinar e quem aprende ensina ao aprender".</i></blockquote>
                        <p class="color-white branca"><i class="branca">≈Paulo Freire</i></p>
    </div>
  </section>
                
                
                <section id ="seccao_sobre">
                
                <!-- services -->
  <section class="section pad-bot30 bg-white">
    <div class="container">
        <h1 class="align-center " style="margin-bottom: 120px;">Sobre o UCM-Faltas</h1>
      <div class="row mar-bot40">
        <div class="col-lg-4">
          <div class="align-center">
            <i class="fa fa-code fa-5x mar-bot20"></i>
            <h4 class="text-bold">HTML5 100% Válido!</h4>
            <p>O sistema UCM-Faltas possui uma pagina valida pelos padroes da w3c.
            </p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="align-center">
            <i class="fa fa-android fa-5x mar-bot20"></i>
            <h4 class="text-bold">Responsivo</h4>
            <p>É isso mesmo! Poderá usar o ucm-faltas confortavelmente em <b>QUALQUER</b> dos seus dispositivos.
            </p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="align-center">
            <i class="fa fa-smile-o fa-5x mar-bot20"></i>
            <h4 class="text-bold">Interface Amigavel</h4>
            <p>Desenvolvida minuciosamente para prover a melhor experiencia possivel aos usuarios.
            </p>
          </div>
        </div>

      </div>

    </div>
  </section>
                
                
                </section>        
                
                
                
                
                
                
                
                
                
                 <section id="parallax2" class="section parallax" data-stellar-background-ratio="0.5">
                    <div class="" style="padding-top: 40px; padding-bottom: 40px; text-align: center;">
     <blockquote class="bigquote branca color-white"><i class="branca">"Quem ensina aprende ao ensinar e quem aprende ensina ao aprender".</i></blockquote>
                        <p class="color-white branca"><i class="branca">≈Paulo Freire</i></p>
    </div>
  </section>
                
                
                
                <section id="seccao_contactos" style="margin-top: 40px;">
                <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Contacte-nos</h2>
              <br><br><br>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-4x fa-mobile"></i>
                <p>
                  Call: +258 87 6767524<br>
                  <span>Segunda-Sexta (9h-17h)</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-5x fa-envelope-o"></i>
                <p>
                  Email: Reitoria@ucm.ac.mz<br>
                  <span><a>Web: www.ucm.ac.mz</a></span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-4x fa-map-marker"></i>
                <p>
                  Location: A108 Adam Street<br>
                  <span>NY 535022, USA</span>
                </p>
              </div>
            </div>
          </div>
        </div>
          
          <br><br><br
        <div class="row">

          <!-- Start Google Map -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- Start Map -->
            <!-- Uncomment below if you wan to use dynamic maps -->
            <!--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>-->
            <img src="" alt="">
            <!-- End Map -->
          </div>
          <!-- End Google Map -->

          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form form-horizontal">
             
              <form action="" method="post" role="form" class="form-horizontal">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nome Completo"/>
                 
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Correio eletrônico"/>
                  
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Assunto" />
                  
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="5" placeholder="Corpo da mensagem"></textarea>
                  
                </div>
                  <div class="text-center"><button class="btn-default" type="">Enviar Mensagem</button></div>
              </form>
            </div>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area --> 
  
                </section>
          
          <div class="container" style="margin-top: 30px;"> 
              <div class="row">  
                
            <div class="col-sm-12 col-lgl-12">
            
                 <footer class="text-center">
    <p>&copy; UCM-FEG</p>
    <div class="credits">
     
        <p> Beira-Moçambique.<a class="azul">www.ucm.ac.mz</a></p>
        
    </div>
  </footer>
            </div>
    </div>
          </div>
        
        
        
          
        
        
        
        
        
        
         <!-- javascript,jquery e typehead-->
       
  
  
 
  
  
  
          
 
  
   
 
  
  
  
  
  <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  <script src="js/typeahead.min.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.nicescroll.min.js"></script>
  <script src="js/fancybox/jquery.fancybox.pack.js"></script>
  <script src="js/skrollr.min.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/jquery.localScroll.js"></script>
  <script src="js/stellar.js"></script>
  <script src="js/jquery.appear.js"></script>
  <script src="js/main.js"></script>
  <script src="contactform/contactform.js"></script>
  
  

  <script>
      
     
      $(Window).scroll(function(){
         
        
        if($(this).scrollTop()>100){
        
            
            $(".navbar-inverse").addClass("navbar-inverse1");
          
          
        }
        else{
            
           $(".navbar-inverse").removeClass("navbar-inverse1");
           
           
        }
          
          
      });
      
      
      
          
      function esqueceu(){
          
          
          alert("Por Favor contacte o seu Coordenador para a Reposição de Palavra-passe");
          
          
          
      }   
      
      
              
         
        
            
           
 
 
 
</script>
  
  
    </body>
</html>

        
        
           
      