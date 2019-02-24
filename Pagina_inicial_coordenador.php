<?php
session_start();
require_once 'conexao.php';

if (isset($_GET["logout"])) {


    logout();
}

//                 if(!isset($_SESSION["uid"])){
//    
//           echo  "<script>"
//                 . "window.location.assign('index.php');"
//                 . ""
//                 . "</script>";
//          
//       } 




if (isset($_GET["alterar"])) {


    alterarPass($conexao, "coordenador", $_SESSION["user_id"], md5($_GET["pass"]));
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
        <link href="css/navbar_transparente.css" rel="stylesheet" type="text/css"/> 
        <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
        <link href="css/animate.css" rel="stylesheet" type="text/css"/> 







        <title>Coordenador</title>




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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastrar<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Estudante</a></li>
                                <li><a href="#">Docente</a></li>
                                <li><a href="#">Turma</a></li>
                                <li><a href="#">Cadeira</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerir<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Estudante</a></li>
                                <li><a href="#">Docente</a></li>
                                <li><a href="#">Turma</a></li>
                                <li><a href="#">Cadeira</a></li>
                            </ul>
                        </li>
                        <li><a href="#cadeiras">Listas de Presença</a></li>
                        <li><a href="#justificar">Justificações</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Conta<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a><Button type="button"  data-toggle="modal" data-target="#alterar_pass" style="background: rgba(0,0,0,0); border:rgba(0,0,0,0); margin-left: -5px;">Alterar Palavra passe</button></a></li>




                                <li><a href="#"><form method="GET"><button name="logout" type="submit" style="margin-left: -5px;background: rgba(0,0,0,0); border:rgba(0,0,0,0);"> Terminar Sessao </button></form></a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="navbar-inverse navbar-right" style="margin-right:50px; margin-top: 10px; background: rgba(0,0,0,0);">
                        <p class="text-primary" style=" background: rgba(0,0,0,0);"><i class="branca azul"> <?php echo $_SESSION["uid"] ?> </i><img class="navbar-inverse" style ='height:50px; width:50px;border-radius:100%;  background: rgba(0,0,0,0);' src="img/user.png"></p>
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



                                    <div class="col-lg-10 input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" name="pass" class="form-control" placeholder="palavra passe" >
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

                        <?php



















if (isset($_GET["remover_estudantes"])) {




    $selecionados = array();
    $i_sel = 0;



    $maximo = getMaxID($conexao, "estudante");


    for ($i = 0; $i < $maximo + 1; $i++) {

        if (isset($_GET["item" . $i . ""])) {

            $selecionados[$i_sel] = $_GET["item" . $i];


            $i_sel++;
        }
    }

//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         

    Remover($conexao, $selecionados, "estudante");
}





if (isset($_GET["remover_turmas"])) {
    $selecionados = array();
    $i_sel = 0;



    $maximo = getMaxID($conexao, "turma");


    for ($i = 0; $i < $maximo + 1; $i++) {

        if (isset($_GET["item" . $i . ""])) {

            $selecionados[$i_sel] = $_GET["item" . $i];


            $i_sel++;
        }
    }

//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         

    Remover($conexao, $selecionados, "turma");
}



if (isset($_GET["remover_cadeiras"])) {
    $selecionados = array();
    $i_sel = 0;



    $maximo = getMaxID($conexao, "cadeira");


    for ($i = 0; $i < $maximo + 1; $i++) {

        if (isset($_GET["item" . $i . ""])) {

            $selecionados[$i_sel] = $_GET["item" . $i];


            $i_sel++;
        }
    }

//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         

    Remover($conexao, $selecionados, "cadeira");
}







?>

                    <div class="tabbable tabs-left">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab21" data-toggle="tab">Cadastrar Estudante</a></li>
                            <li><a href="#tab22" data-toggle="tab">Cadastrar Docente</a></li>
                            <li ><a href="#tab23" data-toggle="tab">Cadastrar Turma</a></li>
                            <li><a href="#tab24" data-toggle="tab">Cadastrar cadeiras</a></li>
                        </ul>
                        <div class="tab-content">


                            <div class="tab-pane active" id="tab21">





                                <h3 class="align-center">Cadastrar Estudante</h3>

                                <form class="form-horizontal" method="GET">
                                    
                                    <?php  if (isset($_GET["sub_estudante"])) {

                                    $email = @$_GET["email"];
                                    $password = @$_GET["password"];
                                    $nome = @$_GET["nome"];
                                    $apelido = @$_GET["apelido"];
                                    $curso = getNomeCurso($conexao, getCursoCoord($conexao,$_SESSION["user_id"]));
   




                                    cadastrarEstudante($conexao, $nome, $apelido, $email, $password, $curso);
                                     }  ?>
                                    
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
                                            <input type="text" name ="email" class="form-control" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-lg-10 input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control" placeholder="password" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-2">
                                        
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button type="submit" name="sub_estudante" class="btn btn-default">Cadastrar</button> 
                                        </div>
                                    </div>
                                </form>






                            </div>





                            <div class="tab-pane" id="tab22">

                                 
                                <h3 class="align-center">Cadastrar docente</h3>

                                <form class="form-horizontal" method="GET">
                                    
                                    <?php if (isset($_GET["sub_docente"])) {


                                        $email = @$_GET["email"];
                                        $password = @$_GET["password"];
                                        $nome = @$_GET["nome"];
                                        $apelido = @$_GET["apelido"];

                                        cadastrarDocente($conexao, $nome, $apelido, $email, $password);
                                        }
                                     ?>
                                    
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
                                            <input type="text" name ="email" class="form-control" placeholder="Email" required>
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
                        <div class="tab-pane" id="tab23">



                            <h3 class="align-center">Cadastrar Turma</h3>





                            <form class="form-horizontal" method="GET">
                                <div class="form-group">

                                    <?php  if (isset($_GET["sub_turma"])) {


                                        $curso = getNomeCurso($conexao, getCursoCoord($conexao, $_SESSION["user_id"]));
                                        $ano_frequencia = @$_GET["ano_frequencia"];
                                        $turno = @$_GET["turno"];
                                        $result = getIDCurso($conexao, $curso);


                                        cadastrarTurma($conexao, $result, $turno, $ano_frequencia);
                                        }                                   
                                    ?>
                                    <div class="col-lg-10 input-group">



                                        <div class="col-sm-6 col-lg-10" style="padding-left: 150px;">



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
                        <div class="tab-pane" id="tab24">

                            <h3 class="align-center">Cadastrar Cadeira</h3>
                                        
                                
                            <?php  if (isset($_GET["submeteu_cadeira"])) {

                                    $curso = @$_GET["curso"];
                                    $nome = @$_GET["nome"];
                                    $docente = @$_GET["docente"];
                                    $turma = @$_GET["turma"];
                                    $max = $_GET["max_faltas"];
                                    $idcurso = $curso;
                                    $iddoc = getIDDocente($conexao, $docente);
                                    $idturm = $turma;

                                    cadastrarCadeira($conexao, $nome, $iddoc, $idcurso, $idturm, $max);
                                }  
                            ?>
                            

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
                                                <option value=<?php echo '"' . getCursoCoord($conexao, $_SESSION["user_id"]) . '"'; ?> selected> <?php echo getNomeCurso($conexao, getCursoCoord($conexao, $_SESSION["user_id"])); ?> </option>
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
                                                        getTurmasIndiv($conexao, getCursoCoord($conexao, $_SESSION["user_id"]));
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


<section class="" id="justificar" style="margin-bottom: 100px; margin-top: 100px;">

    <h1 class="align-center" ><i class=" align-center" style="margin-bottom: 70px;"></i>Gerir</h1>


    <div class="row">



        <div class="tabbable tabs-left">
            <ul class="nav nav-tabs">
                
                <li class="active"><a href="#tab51" data-toggle="tab">Gerir Estudante</a></li>
                <li class=""><a href="#tab53" data-toggle="tab">Gerir Turmas</a></li>
                <li><a href="#tab54" data-toggle="tab">Gerir cadeiras</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab51">




                                        <?php
                                        
                                        
                                        if (isset($_GET["repor_pass_est"])) {


 

                                                $selecionados = array();
                                                $i_sel = 0;
                                                        


                                                $maximo = getMaxID($conexao, "estudante");


                                                for ($i = 0; $i < $maximo + 1; $i++) {

                                                if (isset($_GET["item" . $i . ""])) {

                                                $selecionados[$i_sel] = $_GET["item" . $i];


                                                $i_sel++;
        }
    }

//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         

                                                ReporPass($conexao, $selecionados, "estudante");
                                            }
                                        
                                        
                                        
                                        
                                        tabelaEstudanteCoord($conexao, getCursoCoord($conexao, $_SESSION["user_id"])); ?>
                    
                    
                    
                    <button name="remover_estudantes" class="btn btn-danger" type="submit">Remover Seleccionados</button>
                    <button name="repor_pass_est" class="btn btn-warning" type="submit">Repor Palavra-passe</button>
                    </form>



                </div>

                <div class="tab-pane" id="tab53">

<?php tabelaTurmaCoorde($conexao, getCursoCoord($conexao, $_SESSION["user_id"])); ?>
                    <button name="remover_turmas" class="btn btn-danger" type="submit">Remover Seleccionados</button>
                    </form>
                </div>
                <div class="tab-pane" id="tab54">


<?php tabelaCadeiraCoord($conexao, getCursoCoord($conexao, $_SESSION["user_id"])) ?>
                    <button name="remover_cadeiras" class="btn btn-danger" type="submit">Remover Seleccionados</button>
                    </form>

                </div>
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





<section id="lista_faltas"  >

    <h1 class="align-center">Listas de Presença</h1>







<?php @getListasCurso($conexao, $id_curso); ?>


    
</section>

            
            
            
<section id="parallax2" class="section parallax" data-stellar-background-ratio="0.5">
    <div class="" style="padding-top: 40px; padding-bottom: 40px; text-align: center;">
        <blockquote class="bigquote branca color-white"><i class="branca">"Quem ensina aprende ao ensinar e quem aprende ensina ao aprender".</i></blockquote>
        <p class="color-white branca"><i class="branca">≈Paulo Freire</i></p>
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
                 
                          
                          <?php  
                          
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
                  AdicionarAlista($conexao, getCursoCoord($conexao,$_SESSION["user_id"]),$_SESSION["cadeira"], getTurmaCadeira($conexao,$_SESSION["cadeira"]), $selecionados, 2019);
                         
                         
                    
                         
                         
                         
                     }  ?>
                 <form method="GET">
                     
                      <div style="width: 40%; margin: auto;">
                   <p class="text-muted align-center"></p>
                  
                      </div>
                <p> </p>
                   
                     
                     <div style="width: 40%; <?php  if(isset($_GET["submeter1"])){          echo 'display:none;'; }  ?> margin: auto;"> <select name="cadeira" class="form-control">
                       <?php 
               
                       
                      
                           
                           
                           
                           echo ''.getCadeirasCurso($conexao, getCursoCoord($conexao,$_SESSION["user_id"])) .'';
                            
                       
                      
               ?>
                  </select>
                     </div>
                   
                   
                   <?php    
                   
                   if(isset($_GET["submeter1"])){
                   if(isset($_GET["cadeira"])){
                           
                           
                           getEstudantesIndiv($conexao, getCursoCoord($conexao,$_SESSION["user_id"]),$_GET["cadeira"]);
                           
                           
                   
                       
                   }
                   }
                       ?>
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   <div style="width: 10%; margin: auto;" >
                       <br/>
                       
                       <button type="submit" name="submeter1" style=" <?php   if(isset($_GET["submeter"])){          echo 'display:inline;';        }      ?>    <?php  if(isset($_GET["submeter1"])){          echo 'display:none;'; }  ?>" class=" btn btn-default align-center">Submeter</button>
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
                    
                    
                    <?php
                    
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
                         
                   
                         
                  
                         
                  RemoverDaLista($conexao,getCursoCoord($conexao,$_SESSION["user_id"]),$_SESSION["cadeira"], getTurmaCadeira($conexao,$_SESSION["cadeira"]), $selecionados, 2019);
                         
                         
                    
                         
                         
                         
                     }
                     
                     
                     
                     
                     
                     
                     
                     
                       ?>
                    
                    
                    
                     <form method="GET">
                     
                      <div style="width: 40%; margin: auto;">
                   <p class="text-muted align-center"></p>
                   
                      </div>
                <p> </p>
                   
                     
                     <div style="width: 40%; <?php  if(isset($_GET["submeter1_rem"])){          echo 'display:none;'; }  ?> margin: auto;"> <select name="cadeira_rem" class="form-control">
                       <?php 
               
                       
                       
                           
                           
                           echo ''.getCadeirasCurso($conexao, getCursoCoord($conexao,$_SESSION["user_id"])) .'';
                           
                  
                      
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
                       
                       <button type="submit" name="submeter1_rem" style=" <?php   if(isset($_GET["submeter_rem"])){          echo 'display:inline;';        }      ?>    <?php  if(isset($_GET["submeter1_rem"])){          echo 'display:none;'; }  ?>" class=" btn btn-default align-center">Submeter</button>
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
                    
                    
                    <?php getListasPresençaCoord($conexao, getCursoCoord($conexao, $_SESSION["user_id"]));   ?>
                    
                </div>
                
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
            
            
            <section id="justificar">
                
                <h1 class="align-center">Justificacoes pendentes</h1>
                <br></br>
                
                <?php if (isset($_GET["aceitar"])) {




                            $selecionados = array();
                             $i_sel = 0;



                            $maximo = getMaxID($conexao, "justificacao");


                                for ($i = 0; $i < $maximo + 1; $i++) {

                                if (isset($_GET["item" . $i . ""])) {

                                    $selecionados[$i_sel] = $_GET["item" . $i];


                                    $i_sel++;
                                }
                            }

//                         for($i=0;$i<count($selecionados)+1;$i++){
//                             
//                             echo '<script> alert("'.$selecionados[$i].'"); </script>';
//                             
//                         }
//                         

     aceitar($conexao, $selecionados);
}
  ?>
                <form method="get">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            
                            <th>
                               #
                            </th>
                            <th>
                                Nome Estudante
                            </th>
                            <th>
                                Comprovativo
                            </th>
                            
                            <th>
                                Data_Falta
                            </th>
                            <th>
                                Cadeira
                            </th>
                            <th>
                                Data_justificacao
                            </th>
                            
                        </tr>
                   
                    </thead>
                    <?php TabelaJust($conexao, getCursoCoord($conexao, $_SESSION["user_id"])) ?>
                    
                   
                </table>
                
                
                <button  style=" width:10%;  margin-left:40%;" type="submit" name="aceitar" class="btn align-center btn-default">aceitar</button>
                <button style="width:10%; margin:auto;" type="submit" name="recusar" class="btn align-center btn-danger">Recusar</button>
                    
                
                
                
                </form>
            </section>
            
            
            
            
            
            
            
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


        $(Window).scroll(function () {


            if ($(this).scrollTop() > 100) {


                $(".navbar-inverse").addClass("navbar-inverse1");
                $(".azul").removeClass("branca");

            } else {

                $(".navbar-inverse").removeClass("navbar-inverse1");
                $(".azul").addClass("branca");

            }


        });
        
        
        
        
         function refresh(){
             
            
        window.location.assign('Pagina_inicial_coordenador.php?#lista_faltas');
            
         }














    </script>


</body>
</html>


