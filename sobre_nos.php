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
       
       
       
    
        <title>Iniciar Sessão</title>
        
     
      
        
    </head>
    <body>
        
         <div class="col-sm-12 col-lg-12 navbar-container">
             <br>

                        <nav class="navbar navbar-inverse  navbar-fixed-top" role="navigation">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex3-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                <a class="navbar-brand" href="#">UCM-Faltas.com</a>
              </div>

              
      
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse navbar-ex3-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Iniciar Sessao</a></li>
                    <li class="active"><a href="sobre_nos.php">Sobre nós</a></li>
                  
                </ul>
                
              </div>
              <!-- /.navbar-collapse -->
            </nav>

          </div>
                
                
                
                
                
        <!-- about -->
  <section id="section-about" class="section appear clearfix">
    <div class="container">

      <div class="row mar-bot40">
        <div class="col-md-offset-3 col-md-6">
          <div class="section-header">
            <h2 class="section-heading animated" data-animation="bounceInUp">Our Team</h2>
            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur, adipisci velit, sed quia non numquam.</p>
          </div>
        </div>
      </div>

      <div class="row align-center mar-bot40">
        <div class="col-md-3">
          <div class="team-member">
            <figure class="member-photo"><img class="circulo" src="img/team/member1.jpg" alt="" /></figure>
            <div class="team-detail">
              <h4>Jason Doe</h4>
              <span>User experiences</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team-member">
            <figure class="member-photo"><img src="img/team/member1.jpg" alt="" /></figure>
            <div class="team-detail">
              <h4>Timothy Clark</h4>
              <span>Web developer</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team-member">
            <figure class="member-photo"><img src="img/team/member1.jpg" alt="" /></figure>
            <div class="team-detail">
              <h4>Vicky Tan</h4>
              <span>Web designer</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team-member">
            <figure class="member-photo"><img src="img/team/member1.jpg" alt="" /></figure>
            <div class="team-detail">
              <h4>Kevin Peterson</h4>
              <span>UI designer</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- /about -->
        
        
        
        
        
                
           
            </div>
        </div>
        
        <div class="row>">
             <div class="col-sm-12 col-lgl-12">
            
                 <footer class="text-center">
    <p>&copy; UCM-FEG</p>
    <div class="credits">
     
        <p> Beira-Moçambique. <a>www.ucm.ac.mz</a></p>
        
    </div>
  </footer>
            </div>
    </div>
        <?php
        // put your code here
        ?>
        
        
        
        
        
         <!-- javascript,jquery e typehead-->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/typeahead.min.js"></script>

  <script>
      
     
      $(Window).scroll(function(){
         
        
        if($(this).scrollTop()>100){
        
            
            $(".navbar-inverse").addClass("navbar-inverse1");
          
          
        }
        else{
            
           $(".navbar-inverse").removeClass("navbar-inverse1");
           
           
        }
          
          
      });
      
      
      
          
         
              
              
         
              
            
           
 
 
 
</script>
  
  
    </body>
</html>