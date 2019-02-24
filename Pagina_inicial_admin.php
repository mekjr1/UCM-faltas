<!--<!DOCTYPE html>-->
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
 <?php
           @session_start();
        require 'conexao.php';
    
        
        
        
        
       if(isset($_GET["alterar"])){
         
           
           if($_GET["pass"]==$_GET["pass1"]){
            
              alterarPass($conexao,"admin", $_SESSION["user_id"], md5($_GET["pass"]));
              
           } else {
               
               echo '<script>  alert("Erro! As palavras passe na sao iguais");   </script>';
               
               
           }
         
       }
        
        
       if(isset($_GET["logout"])){
                    
                    
                    @logout(); 
                }
                
                
                
        
            
       
       
       ?>
        
       

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

    
       
       
       
       
    
        <title>admin</title>
        
     
      
        
    </head>
    <body data-spy="scroll" data-target=".navbar">
        
        <div class="col-sm-12 col-lg-12 navbar-container">
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
                    <a href="#cadastrar" class="dropdown-toggle" data-toggle="dropdown">Cadastrar<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       <li><a href="#cadastrar_admin" data-toggle="tab">Administrador</a></li>
                       <li><a href="#">Curso</a></li>
                       <li><a href="tab23" data-toggle="tab">Estudante</a></li>
                       <li><a href="#tab22" data-toggle="tab">Docente</a></li>
                       <li><a href="#">Turma</a></li>
                       <li><a href="#">Cadeira</a></li>
                    </ul>
                  </li>
                   <li class="dropdown">
                    <a href="#gerir" class="dropdown-toggle" data-toggle="dropdown">Gerir<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       <li><a href="#">Administrador</a></li>
                       <li><a href="#">Curso</a></li>
                       <li><a href="#">Estudante</a></li>
                       <li><a href="#tab22" data-toggle="tab">Docente</a></li>
                       <li><a href="#">Turma</a></li>
                       <li><a href="#">Cadeira</a></li>
                    </ul>
                  </li>
                  
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Conta<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a><Button type="button"  data-toggle="modal" data-target="#alterar_pass" style="background: rgba(0,0,0,0); border:rgba(0,0,0,0); margin-left: -5px;">Alterar Palavra passe</button></a></li>
                      
                      
                       <li><a href="#"><form method="GET"><button name="logout" type="submit" style="background: rgba(0,0,0,0); border:rgba(0,0,0,0); margin-left: -5px;"> Terminar Sessao </button></form></a></li>
                    </ul>
                  </li>
                </ul>
                <div class="navbar-inverse navbar-right" style="margin-right:50px; margin-top: 10px; background: rgba(0,0,0,0);">
                    <p class="text-primary" style=" background: rgba(0,0,0,0);"> <i class=" branca azul"><?php echo @$_SESSION["uid"]   ?></i> <img class="navbar-inverse" style ='height:50px; width:50px;border-radius:100%;  background: rgba(0,0,0,0);' src="img/user.png"></p>
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
          
         
            <form class="form-horizontal" action="Pagina_inicial_admin.php" method="GET">
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
            
            <section id="faltas" style="margin-bottom: 100px; margin-top: 100px;">
            
             <div class="row">
        
         
           
            <div class="tabbable tabs-left">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#cadastrar_admin" data-toggle="tab">Cadastrar Administrador</a></li>
                <li><a href="#tab22" data-toggle="tab">Cadastrar Docente</a></li>
                <li ><a href="#tab23" data-toggle="tab">Cadastrar estudante</a></li>
                <li ><a href="#tab55" data-toggle="tab">Cadastrar Cordenador</a></li>
                <li><a href="#tab24" data-toggle="tab">Cadastrar curso</a></li>
                 <li><a href="#tab25" data-toggle="tab">Cadastrar cadeira</a></li>
                 <li><a href="#tab26" data-toggle="tab">Cadastrar Turma</a></li>
              </ul>
              <div class="tab-content">
                  
                                   
                    <?php
                        
                        if(isset($_GET["sub_admin"])){
            
           $email = @$_GET["email"];
           $password =  @$_GET["password"];
           $nome = @$_GET["nome"];
           $apelido =  @$_GET["apelido"];
            
           cadastrarAdmin($conexao, $nome, $apelido, $email, $password);
           
           
           
            
        }
        
        
         if(isset($_GET["sub_curso"])){
                          
                          @$nome = $_GET["nome"];
                          
                          cadastrarCurso($conexao, $nome);
                          
                          
                      }
                        
                        
                      if(isset($_GET["sub_docente"])){
                          
                          
           $email = @$_GET["email"];
           $password =  @$_GET["password"];
           $nome = @$_GET["nome"];
           $apelido =  @$_GET["apelido"];
           
           cadastrarDocente($conexao, $nome, $apelido, $email, $password);
                          
                          
                      }
                      
                      
                      if(isset($_GET["sub_turma"])){
                      
                      
                       $curso = @$_GET["curso"];
                       $ano_frequencia = @$_GET["ano_frequencia"];
                       $turno =  @$_GET["turno"];
                       $result =  getIDCurso($conexao, $curso);
                        
                        
                        cadastrarTurma($conexao, $result, $turno, $ano_frequencia);
                        
                       
                      }
                      
                      
                      if(isset($_GET["submeteu_cadeira"])){
                          
                          $curso =  @$_GET["curso"];
                          $nome = @$_GET["nome"];
                          $docente = @$_GET["docente"];
                          $turma = @$_GET["turma"];
                          $max = $_GET["max_faltas"];
                          
//                          echo '<script>  alert("'.getIDCurso($conexao, $curso).'");   </script>';
//                          echo '<script>  alert("'.getIDDocente($conexao, $docente).'");   </script>';
//                          echo '<script>  alert("'.$turma.'");   </script>';
//                          echo '<script>  alert("'.$max.'");   </script>';
//                          echo '<script>  alert("'.$nome.'");   </script>';
//                          
                          $idcurso = getIDCurso($conexao, $curso);
                          $iddoc = getIDDocente($conexao, $docente);
                          $idturm = $turma;
                          
                          cadastrarCadeira($conexao, $nome, $iddoc, $idcurso,$idturm,$max);
                      }
                      
                      
                     if(isset($_GET["sub_estudante"])){
                         
           $email = @$_GET["email"];
           $password =  @$_GET["password"];
           $nome = @$_GET["nome"];
           $apelido =  @$_GET["apelido"];
           $turma = @$_GET["turma"];
           
           
          
           
           
           cadastrarEstudante($conexao, $nome, $apelido, $email, $password, $turma);
                         
                         
                         
                         
                     }
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                      if(isset($_GET["sub_coordenador"])){
                         
          $email = @$_GET["email"];
          $password =  @$_GET["password"];
           $nome = @$_GET["nome"];
           $apelido =  @$_GET["apelido"];
           $curso = @$_GET["curso"];
           
           
           cadastrarCoord($conexao, $nome, $apelido, $email, $password, getIDCurso($conexao, $curso));
                         
                         
                         
                         
                     }
                     
                     
                     
                     
                     
                     
                     if(isset($_GET["remover_turmas"])){
                          $selecionados = array(); 
                         $i_sel=0;
                      
                         
                      
                       $maximo =  getMaxID($conexao,"turma");
                         
                         
                         for($i=0;$i<$maximo+1;$i++){
                            
                            if(isset($_GET["item".$i.""])){
                                
                              $selecionados[$i_sel] = $_GET["item".$i]; 
                              
                              
                               $i_sel++;
                            }
                             
                             
                         }
                         
//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         
                         
                    Remover($conexao, $selecionados,"turma");
                         
                         
                         
                     }
                     
                    
                     
                           if(isset($_GET["remover_cadeiras"])){
                          $selecionados = array(); 
                         $i_sel=0;
                      
                         
                      
                       $maximo =  getMaxID($conexao,"cadeira");
                         
                         
                         for($i=0;$i<$maximo+1;$i++){
                            
                            if(isset($_GET["item".$i.""])){
                                
                              $selecionados[$i_sel] = $_GET["item".$i]; 
                              
                              
                               $i_sel++;
                            }
                             
                             
                         }
                         
//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         
                         
                    Remover($conexao, $selecionados,"cadeira");
                         
                         
                         
                     }
                     
                     
                     
                     
                     
                     
                     
                     
                      if(isset($_GET["remover_cadeiras"])){
                          $selecionados = array(); 
                         $i_sel=0;
                      
                         
                      
                       $maximo =  getMaxID($conexao,"cadeira");
                         
                         
                         for($i=0;$i<$maximo+1;$i++){
                            
                            if(isset($_GET["item".$i.""])){
                                
                              $selecionados[$i_sel] = $_GET["item".$i]; 
                              
                              
                               $i_sel++;
                            }
                             
                             
                         }
                         
//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         
                         
                    Remover($conexao, $selecionados,"cadeira");
                         
                         
                         
                     }
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                      if(isset($_GET["remover_coord"])){
                          
                          
                         
                          
                          $selecionados = array(); 
                          $i_sel=0;
                       
                         
                      
                       $maximo =  getMaxID($conexao,"coordenador");
                         
                         
                         for($i=0;$i<$maximo+1;$i++){
                            
                            if(isset($_GET["item".$i.""])){
                                
                              $selecionados[$i_sel] = $_GET["item".$i]; 
                              
                              
                               $i_sel++;
                            }
                             
                             
                         }
                         
//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         
                         
                    @Remover($conexao, $selecionados,"coordenador");
                         
                         
                         
                     }
                     
                     
                     if(isset($_GET["remover_estudantes"])){
                          
                          
                         
                          
                          $selecionados = array(); 
                          $i_sel=0;
                       
                         
                      
                       $maximo =  getMaxID($conexao,"estudante");
                         
                         
                         for($i=0;$i<$maximo+1;$i++){
                            
                            if(isset($_GET["item".$i.""])){
                                
                              $selecionados[$i_sel] = $_GET["item".$i]; 
                              
                              
                               $i_sel++;
                            }
                             
                             
                         }
                         
//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         
                         
                    Remover($conexao, $selecionados,"estudante");
                         
                         
                         
                     }
                      
                     
                     
                      if(isset($_GET["remover_docentes"])){
                          
                          
                         
                          
                          $selecionados = array(); 
                          $i_sel=0;
                       
                         
                      
                       $maximo =  getMaxID($conexao,"docente");
                         
                         
                         for($i=0;$i<$maximo+1;$i++){
                            
                            if(isset($_GET["item".$i.""])){
                                
                              $selecionados[$i_sel] = $_GET["item".$i]; 
                              
                              
                               $i_sel++;
                            }
                             
                             
                         }
                         
//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         
                         
                    Remover($conexao, $selecionados,"docente");
                         
                         
                         
                     }
                     
                     
                     
                     
                     
                     
                      if(isset($_GET["remover_admin"])){
                          
                          
                         
                          
                          $selecionados = array(); 
                          $i_sel=0;
                       
                         
                      
                       $maximo =  getMaxID($conexao,"admin");
                         
                         
                         for($i=0;$i<$maximo+1;$i++){
                            
                            if(isset($_GET["item".$i.""])){
                                
                              $selecionados[$i_sel] = $_GET["item".$i]; 
                              
                              
                               $i_sel++;
                            }
                             
                             
                         }
                         
//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         
                         
                    Remover($conexao, $selecionados,"admin");
                         
                         
                         
                     }
                     
                     
                     
                     
                     if(isset($_GET["repor_pass_est"])){
                          
                          
                         
                          
                          $selecionados = array(); 
                          $i_sel=0;
                       
                         
                      
                       $maximo =  getMaxID($conexao,"estudante");
                         
                         
                         for($i=0;$i<$maximo+1;$i++){
                            
                            if(isset($_GET["item".$i.""])){
                                
                              $selecionados[$i_sel] = $_GET["item".$i]; 
                              
                              
                               $i_sel++;
                            }
                             
                             
                         }
                         
//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         
                         
                  ReporPass($conexao, $selecionados,"estudante");
                         
                         
                         
                     }
                      
                     
                     
                     
                      if(isset($_GET["repor_pass_doc"])){
                          
                          
                         
                          
                          $selecionados = array(); 
                          $i_sel=0;
                       
                         
                      
                       $maximo =  getMaxID($conexao,"docente");
                         
                         
                         for($i=0;$i<$maximo+1;$i++){
                            
                            if(isset($_GET["item".$i.""])){
                                
                              $selecionados[$i_sel] = $_GET["item".$i]; 
                              
                              
                               $i_sel++;
                            }
                             
                             
                         }
                         
//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         
                         
                  ReporPass($conexao, $selecionados,"docente");
                         
                         
                         
                     }
                     
                     
                     
                     
                     
                     
                     
                      if(isset($_GET["repor_pass_adm"])){
                          
                          
                         
                          
                          $selecionados = array(); 
                          $i_sel=0;
                       
                         
                      
                       $maximo =  getMaxID($conexao,"admin");
                         
                         
                         for($i=0;$i<$maximo+1;$i++){
                            
                            if(isset($_GET["item".$i.""])){
                                
                              $selecionados[$i_sel] = $_GET["item".$i]; 
                              
                              
                               $i_sel++;
                            }
                             
                             
                         }
                         
//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         
                         
                  ReporPass($conexao, $selecionados,"admin");
                         
                         
                         
                     }
                      
                     
                       if(isset($_GET["repor_pass_coord"])){
                          
                          
                         
                          
                          $selecionados = array(); 
                          $i_sel=0;
                       
                         
                      
                       $maximo =  getMaxID($conexao,"coordenador");
                         
                         
                         for($i=0;$i<$maximo+1;$i++){
                            
                            if(isset($_GET["item".$i.""])){
                                
                              $selecionados[$i_sel] = $_GET["item".$i]; 
                              
                              
                               $i_sel++;
                            }
                             
                             
                         }
                         
//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         
                         
                  ReporPass($conexao, $selecionados,"coordenador");
                         
                         
                         
                     }
                      
                     
                     
                     
                     
                  
                     
                     
                     
                     
                     
                     
                     if(isset($_GET["adicionar"])){
                          
                          
                         
                          
                          $selecionados = array(); 
                          $i_sel=0;
                       
                         
                      
                       $maximo =  getMaxID($conexao,"estudante");
                         
                         
                         for($i=0;$i<$maximo+1;$i++){
                            
                            if(isset($_GET["item".$i.""])){
                                
                              $selecionados[$i_sel] = $_GET["item".$i]; 
                              
                              
                               $i_sel++;
                            }
                             
                             
                         }
                         
//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
                         
                  echo '<script>  alert("'.$_SESSION["curso"].'");   </script>';
                  AdicionarAlista($conexao, getIDCurso($conexao, $_SESSION["curso"]),$_SESSION["cadeira"], getTurmaCadeira($conexao,$_SESSION["cadeira"]), $selecionados, 2019);
                         
                         
                    
                         
                         
                         
                     }
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     if(isset($_GET["remover"])){
                          
                          
                         
                          
                          $selecionados = array(); 
                          $i_sel=0;
                       
                         
                      
                       $maximo =  getMaxID($conexao,"estudante");
                         
                         
                         for($i=0;$i<$maximo+1;$i++){
                            
                            if(isset($_GET["item".$i.""])){
                                
                              $selecionados[$i_sel] = $_GET["item".$i]; 
                              
                              
                               $i_sel++;
                            }
                             
                             
                         }
                         
//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
                         
                   
                         
                  
                         
                  RemoverDaLista($conexao,getIDCurso($conexao, $_GET["curso_rem"]),$_SESSION["cadeira"], getTurmaCadeira($conexao,$_SESSION["cadeira"]), $selecionados, 2019);
                         
                         
                    
                         
                         
                         
                     }
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                      
                       
                        ?>
                  
                  
                  
                  <div class="tab-pane active" id="cadastrar_admin" style="margin-top:100px; ">

                    
                    
                    <h3 class="align-center">Cadastrar administrador</h3>
                    
                    <form class="form-horizontal" method="GET">
              <div class="form-group">
              
                   <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name ="nome" class="form-control" placeholder="Nome" required>
                </div>
                  
                   <div class="col-lg-10 input-group" style="margin-top:15px; margin-bottom: 15px;">
                       <span class="input-group-addon"><i class="fa fa-user" ></i></span>
                       <input type="text" name ="apelido" class="form-control" placeholder="Apelido" required>
                </div>
                  
                  
                  <div class=" col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" name ="email" class="form-control" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group">
                
                <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="password" required>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" name="sub_admin" class="btn btn-default">Cadastrar</button> 
                </div>
              </div>
                        
                        
            </form>
                    
                    
                </div>
                <div class="tab-pane" id="tab22">
                  
                    
                    
                     <h3 class="align-center">Cadastrar docente</h3>
                    
                    <form class="form-horizontal" method="GET">
              <div class="form-group">
              
                   <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" name ="nome" class="form-control" placeholder="Nome" required>
                </div>
                  
                   <div class="col-lg-10 input-group" style="margin-top:15px; margin-bottom: 15px;">
                       <span class="input-group-addon"><i class="fa fa-user" ></i></span>
              <input type="text" name ="apelido" class="form-control" placeholder="Apelido" required>
                </div>
                  
                  
                  <div class=" col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" name ="email" class="form-control" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group">
                
                <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="password" required>
                </div>
              </div>
                        
                          <div class="col-sm-6 col-lg-10">
            
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" name="sub_docente" class="btn btn-default">Cadastrar</button> 
                </div>
              </div>
            </form>
                    
                    
                    
                    
                </div>
                </div>
                  
                  
                  
                  
                  
                  
                  <div class="tab-pane" id="tab55">
                
                      
                                <h3 class="align-center">Cadastrar Cordenador</h3>
                    
                    <form class="form-horizontal" method="GET">
              <div class="form-group">
              
                   <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name ="nome" class="form-control" placeholder="Nome" required>
                </div>
                  
                   <div class="col-lg-10 input-group" style="margin-top:15px; margin-bottom: 15px;">
                       <span class="input-group-addon"><i class="fa fa-user" ></i></span>
              <input type="text" name ="apelido" class="form-control" placeholder="Apelido" required>
                </div>
                  
                  
                  <div class=" col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" name ="email" class="form-control" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group">
                
                <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="password" required>
                </div>
              </div>
                      <div class="col-sm-6 col-lg-2">
            <p class="text-muted">Escolher Curso:</p>
            <select name="curso" class="form-control">
              <?php getCursos($conexao,3);  ?>
            </select>
          </div>
                        
                        
                   <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" name="sub_coordenador" class="btn btn-default">Cadastrar</button> 
                </div>
              </div>
            </form>
                                
                                
                                
                                
                      
                      
                </div>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  <div class="tab-pane" id="tab23">
                
                      
                                <h3 class="align-center">Cadastrar Estudante</h3>
                    
                    <form class="form-horizontal" method="GET">
              <div class="form-group">
              
                   <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name ="nome" class="form-control" placeholder="Nome" required>
                </div>
                  
                   <div class="col-lg-10 input-group" style="margin-top:15px; margin-bottom: 15px;">
                       <span class="input-group-addon"><i class="fa fa-user" ></i></span>
              <input type="text" name ="apelido" class="form-control" placeholder="Apelido" required>
                </div>
                  
                  
                  <div class=" col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" name ="email" class="form-control" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group">
                
                <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="password" required>
                </div>
              </div>
                      <div class="col-sm-6 col-lg-2">
            <p class="text-muted">Escolher Curso:</p>
            <select name="turma" class="form-control">
              <?php getCursos($conexao,1);  ?>
            </select>
          </div>
                        
                        
                   <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" name="sub_estudante" class="btn btn-default">Cadastrar</button> 
                </div>
              </div>
            </form>
                                
                                
                                
                                
                      
                      
                </div>
                  <div class="tab-pane" id="tab24">
                  
                      
                      
                      
                       <form class="form-horizontal" method="GET">
              <div class="form-group">
              
                   <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
              <input type="text" name ="nome" class="form-control" placeholder="Nome do curso" required>
                </div>
                  
                     
                   <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" name="sub_curso" class="btn btn-default">Cadastrar</button> 
                </div>
              </div>
                  
                  
            </form>
                      
</div>
                  </div>
                      
                       <div class="tab-pane" id="tab25">
                
                      
                                <h3 class="align-center">Cadastrar Cadeira</h3>
                                
                                
                                
                                       
                                
                                 <form class="form-horizontal" method="GET">
              <div class="form-group">
              
                   <div class="col-lg-10 input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" name ="nome" class="form-control" placeholder="Nome da Cadeira" required>
                </div>
                  
                  
                          <div class="col-sm-6 col-lg-10">
              <div class="col-sm-6 col-lg-2">
            <p class="text-muted">Escolher curso:</p>
            <select name="curso" class="form-control">
              <?php
              
                        getCursos($conexao,1);
              
              ?>
            </select>
              </div>
            
            <div class="col-sm-6 col-lg-2 pull-right">
             <p class="text-muted">Escolher Docente:</p>
            <select name="docente" class="form-control">
              <?php  
              
                            getDocentes($conexao);
              
              ?>
            </select>
          </div>
                              
                              <div class="col-sm-6 col-lg-2 " style="margin-left: 100px;">
             <p class="text-muted">Escolher Turma:</p>
            <select name="turma" class="form-control">
              <?php  
              
                            
                            getTurmas($conexao);
              
              ?>
            </select>
          </div>                
                <div class="col-sm-6 col-lg-2" style="margin-left: 100px;">
            <p class="text-muted">Limite de Faltas:</p>
            <select name ="max_faltas" class="form-control">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>              
              </div>
                              
              
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" name="submeteu_cadeira" class="btn btn-default" style="margin-top: 70px;">Cadastrar</button> 
                </div>
              </div>
            </form>
                       </div>
                      
                      
                      
                      
                      
                      
                      
                      
                      
               
            </div>
                    <div class="tab-pane" id="tab26">
                
                      
                                <h3 class="align-center">Cadastrar Turma</h3>
                                
                                
                                
                                
                                
                                 <form class="form-horizontal" method="GET">
              <div class="form-group">
              
                   <div class="col-lg-10 input-group">
                    
                  
                  
                          <div class="col-sm-6 col-lg-10" style="padding-left: 150px;">
              
            <p class="text-muted">Escolher curso:</p>
            <select name="curso" class="form-control">
              <?php
              
                                      getCursos($conexao,1);
              
              ?>
            </select>
            
                              
                              
    
            
                              
        
             <p class="text-muted">Escolher Ano de Frequencia:</p>
            <select name="ano_frequencia" class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
               
            </select>
         
              
                              
            
             <p class="text-muted">Escolher Turno:</p>
            <select name="turno" class="form-control">
                <option>Diurno</option>
                <option>Noturno</option>
               
            </select>
         
              </div>
                              
              
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" name="sub_turma" class="btn btn-default">Cadastrar</button> 
                </div>
              </div>
            </form>
                       </div>
                      
                      
                      
                      
                      
                      
                      
                      
                      
               
            </div>
          </div>
       

            
            </section>
            
             <section id="parallax2" class="section parallax" data-stellar-background-ratio="0.5">
                    <div class="" style="padding-top: 40px; padding-bottom: 40px; text-align: center;">
      <blockquote class="bigquote branca color-white"><i class="branca">"Quem ensina aprende ao ensinar e quem aprende ensina ao aprender".</i></blockquote>
                        <p class="color-white branca"><i class="branca">≈Paulo Freire</i></p>
    </div>
  </section>
            
            
            <section class="" id="gerir" style="margin-bottom: 100px; margin-top: 100px;">
                
                <h1 class="align-center" ><i class=" align-center" style="margin-bottom: 70px;"></i>Gerir</h1>
                
                
                  <div class="row">
        
         
           
            <div class="tabbable tabs-left">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab21" data-toggle="tab">Gerir Administradors</a></li>
                <li><a href="#tab27" data-toggle="tab">Gerir Docentes</a></li>
                <li ><a href="#tab28" data-toggle="tab">Gerir estudantes</a></li>
                <li ><a href="#tab58" data-toggle="tab">Gerir Coordenadores</a></li>
                <li><a href="#tab29" data-toggle="tab">Gerir cursos</a></li>
                 <li><a href="#tab30" data-toggle="tab">Gerir cadeiras</a></li>
                 <li><a href="#tab31" data-toggle="tab">Gerir Turmas</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab21">
                 
                    
                    <?php tabelaAdmin($conexao);   ?>
                     <button name="remover_admin" class="btn btn-danger" type="submit">Remover Seleccionados</button>
                     <button name="repor_pass_adm" class="btn btn-warning" type="submit">Repor Palavra-passe</button> 
                </form>
                    
                    
                </div>
                <div class="tab-pane" id="tab27">
                 
                    <?php tabelaDocente($conexao);   ?>
                    <button name="remover_docentes" class="btn btn-danger" type="submit">Remover Seleccionados</button>
                        <button name="repor_pass_doc" class="btn btn-warning" type="submit">Repor Palavra-passe</button>
                </form>
                    
                </div>
                  <div class="tab-pane" id="tab28">
                 
                      
                      
                     <?php tabelaEstudante($conexao);   ?> 
                      
                      <button name="remover_estudantes" class="btn btn-danger" type="submit">Remover Seleccionados</button>
                      <button name="repor_pass_est" class="btn btn-warning" type="submit">Repor Palavra-passe</button>
                        
                  </form>
                  
                  

            
                     

    </div>
  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
              
                  
                  
                  
                  
                  
                  
                  
                  <div class="tab-pane" id="tab58">
                 
                      
                      
                     <?php tabelaCoord($conexao);   ?> 
                      
                      <button name="remover_coord" class="btn btn-danger" type="submit">Remover Seleccionados</button>
                      <button name="repor_pass_coord" class="btn btn-warning" type="submit">Repor Palavra-passe</button>
                      
                      
                       </form>
                     
  
 
  


                      
                 
                      
                </div>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  <div class="tab-pane" id="tab29">
                  
                      
                     <?php tabelaCurso($conexao);       ?> 
                      
                      <button name="remover_cursos" class="btn btn-danger" type="submit">Remover Seleccionados</button>
                      </form>
                      
                </div>
                  
                  <div class="tab-pane" id="tab30">
                  
                      
                     <?php tabelaCadeira($conexao);       ?> 
                      
                      <button name="remover_cadeiras" class="btn btn-danger" type="submit">Remover Seleccionados</button>
                      </form>
                </div>
                  
                  
                  <div class="tab-pane" id="tab31">
                  
                      
                     <?php tabelaTurma($conexao);       ?> 
                      
                      <button name="remover_turmas" class="btn btn-danger" type="submit">Remover Seleccionados</button>
                      </form>
                      
                </div>
                  
              </div>
            </div>
          </div>
            </section>
            
            
            
                 <section id="parallax2" class="section parallax" data-stellar-background-ratio="0.5">
                    <div class="" style="padding-top: 40px; padding-bottom: 40px; text-align: center;">
      <blockquote class="bigquote color-white">Indoctum accusamus comprehensam</blockquote>
      <p class="color-white">Bootstraptaste</p>
    </div>
  </section>
                
            
            
            
            
            
            
            
            
            
            
            
                
                
                
                     
                     <section id="lista_faltas">
            
                         
             <h1 class="align-center" ><i class=" align-center" style="margin-bottom: 70px;"></i>Lista de Chamada</h1>
                
                
                  <div class="row">
        
         
           
            <div class="tabbable tabs-left">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab71" data-toggle="tab">Adicionar Estudante</a></li>
                <li><a href="#tab72" data-toggle="tab">Remover Estudante</a></li>
                <li ><a href="#tab73" data-toggle="tab">Visualizar Listas</a></li>
              </ul>
               
                
                 <div class="tab-content">
                 
                      <div class="tab-pane active" id="tab71">
                 
                 <form method="GET">
                     
                      <div style="width: 40%; margin: auto;">
                   <p class="text-muted align-center"></p>
                   <select style="<?php   if(isset($_GET["submeter"])){      $_SESSION["curso"] = $_GET["curso"];    echo 'display:inline;';        }      ?>    <?php  if(isset($_GET["submeter1"])){          echo 'display:none;'; }  ?>"  name="curso" class="form-control">
              <?php
              
                                      getCursos($conexao,1);
              
              ?>
                  </select>
                      </div>
                <p> </p>
                   
                     
                     <div style="width: 40%; <?php  if(isset($_GET["submeter1"])){          echo 'display:none;'; }  ?> margin: auto;"> <select name="cadeira" class="form-control">
                       <?php 
               
                       
                       if(isset($_GET["curso"])){
                           
                           
                           
                           echo ''.getCadeirasCurso($conexao, getIDCurso($conexao, $_GET["curso"])) .'';
                            
                       }
                      
               ?>
                  </select>
                     </div>
                   
                   
                   <?php    
                   
                   if(isset($_GET["submeter1"])){
                   if(isset($_GET["cadeira"])){
                           
                           
                           getEstudantesIndiv($conexao, getCursoCadeira($conexao, $_GET["cadeira"]),$_GET["cadeira"]);
                           
                           
                   
                       
                   }
                   }
                       ?>
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   <div style="width: 10%; margin: auto;" >
                       <br/>
                       <button type="submit" name="submeter" style=" <?php   if(isset($_GET["submeter"])){          echo 'display:none;';        }  ?>  <?php  if(isset($_GET["submeter1"])){          echo 'display:none;'; }  ?>" class="btn btn-default align-center">Submeter</button>  
                       
                       <button type="submit" name="submeter1" style="display:none; <?php   if(isset($_GET["submeter"])){          echo 'display:inline;';        }      ?>    <?php  if(isset($_GET["submeter1"])){          echo 'display:none;'; }  ?>" class=" btn btn-default align-center">Submeter</button>
                       <br/>
                       <br/>
                       
                       <button type="reset"  onclick="refresh()"  class="btn btn-lg btn-warning align-center">Repor</button>
                       <br/>
                       <br/>
                       
                       <?php if(isset($_GET["submeter1"])){  if(isset($_GET["cadeira"])){           echo '<button type="submit" name="adicionar"  class="btn btn-lg btn-default align-center">Adicionar a lista</button>';        }}  ?>
                       
                        
                   </div>
                 </form>
                 
                          
                      </div>
                
                
                
                
                <div class="tab-pane" id="tab72">
                    
                    
                    
                    
                     <form method="GET">
                     
                      <div style="width: 40%; margin: auto;">
                   <p class="text-muted align-center"></p>
                   <select style="<?php   if(isset($_GET["submeter_rem"])){          echo 'display:inline;';        }      ?>    <?php  if(isset($_GET["submeter1_rem"])){          echo 'display:none;'; }  ?>"  name="curso_rem" class="form-control">
              <?php
              
                                      getCursos($conexao,1);
              
              ?>
                  </select>
                      </div>
                <p> </p>
                   
                     
                     <div style="width: 40%; <?php  if(isset($_GET["submeter1_rem"])){          echo 'display:none;'; }  ?> margin: auto;"> <select name="cadeira_rem" class="form-control">
                       <?php 
               
                       
                       if(isset($_GET["curso_rem"])){
                           
                           
                           echo ''.getCadeirasCurso($conexao, getIDCurso($conexao, $_GET["curso_rem"])) .'';
                           
                       }
                      
               ?>
                  </select>
                     </div>
                   
                   
                   <?php    
                   
                   if(isset($_GET["submeter1_rem"])){
                   if(isset($_GET["cadeira_rem"])){
                           
                           
                       getEstudantesIndivRem($conexao, getCursoCadeira($conexao, $_GET["cadeira_rem"]),$_GET["cadeira_rem"]);
                           
                           
                   
                       
                   }
                   }
                       ?>
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   <div style="width: 10%; margin: auto;" >
                       <br/>
                       <button type="submit" name="submeter_rem" style=" <?php   if(isset($_GET["submeter_rem"])){          echo 'display:none;';        }  ?>  <?php  if(isset($_GET["submeter1_rem"])){          echo 'display:none;'; }  ?>" class="btn btn-default align-center">Submeter</button>  
                       
                       <button type="submit" name="submeter1_rem" style="display:none; <?php   if(isset($_GET["submeter_rem"])){          echo 'display:inline;';        }      ?>    <?php  if(isset($_GET["submeter1_rem"])){          echo 'display:none;'; }  ?>" class=" btn btn-default align-center">Submeter</button>
                       <br/>
                       <br/>
                       
                       <button type="reset"  onclick="refresh()"  class="btn btn-lg btn-warning align-center">Repor</button>
                       <br/>
                       <br/>
                       
                       <?php if(isset($_GET["submeter1_rem"])){  if(isset($_GET["cadeira_rem"])){           echo '<button type="submit" name="remover"  class="btn btn-lg btn-danger align-center">Remover da lista</button>';        }}  ?>
                       
                        
                   </div>
                 </form>
                 
                          
                      </div>
                
                
                
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
            
                
                
                
                
                
                <div class="tab-pane" id="tab73">
                    
                    
                    <?php getListasPresença($conexao);   ?>
                    
                </div>
                
            </div>
            </div> 
                
                
                  </div> 
            </section>
            
                
                
            
            
            
            
          </div>
        
        
        
        
           
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
         
                
      <div class="container" style="margin-top: 30px;"> 
              <div class="row">  
                
            <div class="col-sm-12 col-lgl-12">
            
                 <footer class="text-center">
    <p>&copy; UCM-FEG</p>
    <div class="credits">
     
        <p> Beira-Moçambique. <a class="azul">www.ucm.ac.mz</a></p>
        
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
            $(".azul").removeClass("branca");
          
        }
        else{
            
           $(".navbar-inverse").removeClass("navbar-inverse1");
           $(".azul").addClass("branca");
           
        }
          
          
      });
      
      
      
          
         
              
              
         function refresh(){
             
            
        window.location.assign('Pagina_inicial_admin.php?#lista_faltas');
            
         }
              
            
           
 
 
 
</script>
  
  
    </body>
</html>

        
        