<?php  require_once 'conexao.php'; session_start();  $turma1;  
    

      if(!isset($_SESSION["uid"])){
    
           echo  "<script>"
                 . "window.location.assign('index.php');"
                 . ""
                 . "</script>";
          
       } 
       
       
         if(isset($_GET["alterar"])){
         
           
           if($_GET["pass"]==$_GET["pass1"]){
            
              alterarPass($conexao,"docente", $_SESSION["user_id"], md5($_GET["pass"]));
              
           } else {
               
               echo '<script>  alert("Erro! As palavras passe nao sao iguais");   </script>';
               
               
           }
         
       }
       
       
       
       ?>

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
        
       <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
       <link href="css/animate.css" rel="stylesheet" type="text/css"/> 
       <link href="css/navbar_transparente.css" rel="stylesheet" type="text/css"/>
    
       
       
       
       
    
        <title>Docente</title>
        
     
      
        
    </head>
    <body data-spy="scroll" data-target=".navbar">
        
        <div class="col-sm-12 col-lg-12 navbar-container">
            <p class="lead text-muted">Fixed Top</p>

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
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Marcar Faltas<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <form method="GET" >
                      <?php  
                      
                       @getCursosIndiv($conexao); 
                             
                      
                      ?>
                        </form>
                    </ul>
                  </li>
                  <li><a href="#justificar">Minhas listas de Presença</a></li>
                  <li><a href="#cadeiras">Minhas Cadeiras</a></li>
                  
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Conta<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                          <li><a><Button type="button"  data-toggle="modal" data-target="#alterar_pass" style="background: rgba(0,0,0,0); border:rgba(0,0,0,0); margin-left: -5px;">Alterar Palavra passe</button></a></li>
                     
                        <li><a href="#">Apagar Conta</a></li>
                     <li><a href="#"><form method="GET"><button name="logout" type="submit" style="background: rgba(0,0,0,0); border:rgba(0,0,0,0); margin-left: -5px;"> Terminar Sessao </button></form></a></li>
                    </ul>
                  </li>
                </ul>
                  <div class="navbar-inverse navbar-right" style="margin-right:50px; margin-top: 10px; background: rgba(0,0,0,0);">
                      <p class="text-primary" style=" background: rgba(0,0,0,0);"><i class="branca azul"> <?php  echo $_SESSION["uid"]   ?> </i>  <img class="navbar-inverse" style ='height:50px; width:50px;border-radius:100%;  background: rgba(0,0,0,0);' src="img/user.png"></p>
                  </div>
              </div>
              <!-- /.navbar-collapse -->
            </nav>

            
            
                                         <!--                    Modal -->
  <div class="modal" id="alterar_pass" role="dialog">
    <div class="modal-dialog">
    
       Modal content
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alterar Palavra-Passe</h4>
        </div>
        <div class="modal-body">
          
         
            <form class="form-horizontal" action="Pagina_inicial_docente.php" method="GET">
              <div class="form-group">
              
                  <p>Insira a palavra passe:</p>
                   <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password"  name="pass" class="form-control" placeholder="palavra passe" >
                </div>
                  <br/>
                  <br/>
                      
                <p>Repita a palavra passe:</p>
                <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password"  name="pass1" class="form-control" placeholder="palavra passe" >
                </div>
                  
              </div>  
                        
                   <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" name="alterar" class="btn btn-default">Salvar</button> 
                </div>
              </div>
            </form>
                                
                                
                                
                                
                      
                      
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
            
            
            
            
            
            
            <section id="marcar_faltas">
            
                <?php
                
                if(isset($_GET["logout"])){
                    
                    
                    logout(); 
                }
                
                
                
                ?>
                 <form method='GET'>
                
            <table class="table table-striped" data-effect="fade" style="margin-top: 100px; margin-bottom: 55px; text-align: center;">
              <thead>
                <tr>
                    <th class="align-center">#</th>
                    <th class="align-center">Nome completo</th>
                    <th class="align-center">Falta</th>
                  
                  </tr>
              </thead>
              <tbody>
                    
                  
                              
                              
                       <?php 
                       
                       $submetido;
                       $total_turmas = getNrTurma($conexao);
                       
                       for($i=0;$i<=$total_turmas;$i++){
                           
                           if(isset($_GET["escolheu_turma".$i])){
                               
                               $submetido = $i;
                              
                           }
                           
                       }
                                       
                       
                       
                       if(isset($_GET["escolheu_turma".@$submetido])){
                           
                           $turma = $_GET["escolheu_turma".$submetido];
                           $_SESSION["turma"] = $turma;
                           $turma1 = $turma;
                           $_SESSION["cadeira"] = $turma;
                           getEstudantesPresenca($conexao, getCursoCadeira($conexao, $turma),$turma);
                           
                           
                       }else     {
                           
                           
                           
                         echo  '<div class="alert alert-warning" style="width:50%; margin:auto;">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Por Favor escolha uma Turma antes de marcar as faltas!</strong> 
        </div>';
                       
                       
                       
                       }
                       
                       
                       
                       
                       
                       
                       if(isset($_GET["submeter_faltas"])){
                           
                           $max = getMaxID($conexao, "estudante");
                           $selecionados = array(); 
                           $i_sel=0;
                           
                           
                           for($i=0;$i<$max+1;$i++){
                            
                            if(isset($_GET["item".$i.""])){
                                
                              
                                $selecionados[$i_sel] = $_GET["item".$i]; 
                                $i_sel++;
                              
                              
                            }
                             
                             
                         }

                           
                              
                               
                         marcarFaltas($conexao, $selecionados);     
                               
                       
                           
                       }
                       
                       
                      
                       ?>       
                              
                              
                              
                              
                              
                              
               
               
              </tbody>
            </table>
                
               
                
                <button type="submit" name="submeter_faltas" class="btn btn-lg btn-default" style="margin-left: 40%; margin-bottom: 100px;">Submeter Faltas</button>
        </form>
            </section>
            
             <section id="parallax2" class="section parallax" data-stellar-background-ratio="0.5">
                    <div class="" style="padding-top: 40px; padding-bottom: 40px; text-align: center;">
      <blockquote class="bigquote branca color-white"><i class="branca">"Quem ensina aprende ao ensinar e quem aprende ensina ao aprender".</i></blockquote>
                        <p class="color-white branca"><i class="branca">≈Paulo Freire</i></p>
    </div>
  </section>
            
            
            <section id="lista_faltas"  >
            
                 <h1 class="align-center">Listas de Presença</h1>
              
                 
        <div class="accordion" id="accordion2">
       
              
              
             
             <?php @getListasdocente($conexao);  ?>
                
          
          
            
                
              
              
        </div>
            
            </section>
            
            
            
                 <section id="parallax2" class="section parallax" data-stellar-background-ratio="0.5">
                    <div class="" style="padding-top: 40px; padding-bottom: 40px; text-align: center;">
      <blockquote class="bigquote branca color-white"><i class="branca">"Quem ensina aprende ao ensinar e quem aprende ensina ao aprender".</i></blockquote>
                        <p class="color-white branca"><i class="branca">≈Paulo Freire</i></p>
    </div>
  </section>
                
                
                
                
                     
                     <section id="cadeiras" class="align-center">    
                     
            
                         
                         
                         
                         
                         
                         
            <table class="table table-striped align-center" data-effect="fade" style="margin-top: 100px; margin-bottom: 55px;">
              <thead class="align-center">
                <tr>
                  <th class="align-center">#</th>
                  <th>Cadeira</th>
                  <th>Curso</th>
                 
                 
                  </tr>
              </thead>
              <tbody>
               
                    
                  <?php
                  
                  
                  @getCadeirasDoc($conexao, $_SESSION["user_id"]);  ?>
               
              </tbody>
            </table>
            
                     </section> 
                
                
            
            
            
            
          </div>
        
        
        
        
           
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
         
                
      <div class="container" style="margin-top: 30px;"> 
              <div class="row">  
                
            <div class="col-sm-12 col-lgl-12">
            
                 <footer class="text-center">
    <p>&copy; UCM-FEG</p>
    <div class="credits">
     
        <p> Beira-Moçambique. <a style="color:#083377;">www.ucm.ac.mz</a></p>
        
    </div>
  </footer>
            </div>
    </div>
          </div>
        
        
        
          
        <?php
        // put your code here
        ?>
        
        
        
        
        
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
            $(".azul").removeClass("branca");
          
        }
        else{
            
           $(".navbar-inverse").removeClass("navbar-inverse1");
           $(".azul").addClass("branca");
           
        }
          
          
      });
      
      
      
          
         
              
              
         
              
            
           
 
 
 
</script>
  
  
    </body>
</html>

        
        