<?php
 
$conexao = mysqli_connect("den1.mysql4.gear.host", "faltas","Xy9y_VfjQw?k");
 
 mysqli_select_db($conexao, "faltas");

 function login($conexao,$email,$pass){
   
   
     
     $check = (mysqli_query($conexao, "select * from Coordenador where email='".$email."' and password='".md5($pass)."' LIMIT 1"));
         
     $num = mysqli_num_rows($check);
    
      if($num>0){
          
         
      $row = mysqli_fetch_assoc($check);
          
        if( $_SESSION["user_id"]=$row["ID"] and $_SESSION["uid"] = $row["nome"]." ".$row["apelido"]){
            
            
        }
        
        
        
        
        
        
         echo "<script>"
        . ""
                 . "window.location.assign('Pagina_inicial_coordenador.php');"
                 . ""
                 . "</script>";
        
          
          
          
          
      }else{
      
          
          
          
     $check = (mysqli_query($conexao, "select * from Admin where email='".$email."' and password='".md5($pass)."' LIMIT 1"));
         
     $num = mysqli_num_rows($check);
   
      if($num>0){
           
        $row = mysqli_fetch_assoc($check);
          
        if( $_SESSION["user_id"]=$row["ID"] and $_SESSION["uid"] = $row["nome"]." ".$row["apelido"]){
            
            
        }
        
         echo "<script>"
        . ""
                 . "window.location.assign('Pagina_inicial_admin.php')"
                 . ""
                 . "</script>";
          
          
          
          
          
          
      }else{
          
          
          
          $check = (mysqli_query($conexao, "select * from Estudante where email='".$email."' and password='".md5($pass)."' LIMIT 1"));
         
     $num = mysqli_num_rows($check);
    
      if($num>0){
          
        $row = mysqli_fetch_assoc($check);
          
        if( $_SESSION["user_id"]=$row["ID"] and $_SESSION["uid"] = $row["nome"]." ".$row["apelido"]){
            
            
        }
      
         echo "<script>"
        . ""
                 . "window.location.assign('Pagina_inicial_estudante.php')"
                 . ""
                 . "</script>";
          
          
          
          
          
      } else {
      
          
         
               $check = (mysqli_query($conexao, "select * from Docente where email='".$email."' and password='".md5($pass)."' LIMIT 1"));
         
     $num = mysqli_num_rows($check);
    
      if($num>0){
          
          
         
          while($row = mysqli_fetch_assoc($check)){
        if( $_SESSION["user_id"]=$row["ID"] and $_SESSION["uid"] = $row["nome"]." ".$row["apelido"]){
            
            
        }
          
         
     
         echo "<script>"
        . ""
                 . "window.location.assign('Pagina_inicial_docente.php');"
                 . ""
                 . "</script>";
        
          
          
          }
          
          
          
          
      }else{
          
          
          
          echo '<div class="col-lg-7 alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Usuario Nao encontrado!</strong>
        </div>'; 
      
          
          
      }
      }
      }   
      
      
     
     
     
 }
     
 
     
     
     
 }
 
 
 
 function cadastrarAdmin($conexao,$nome,$apelido,$email,$password){
     
     $res = (mysqli_query($conexao,"select * from admin where email='".$email."'"));
     
     
     if(mysqli_num_rows($res)==0){
     
     
     if(mysqli_query($conexao,"Insert into Admin values(null,'".$nome."','".$apelido."','".$email."','".md5($password)."')")){
         echo '<div class="col-lg-7 alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Administrador cadastrado com Sucesso!</strong>
        </div>';
         return true;
     }else{
         
         echo '<div class="col-lg-7 alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>erro ao guardar!</strong>
        </div style="margin-bottom:50px;"> <br>';
     }
     
 } else {
     
 
     echo '<div class="col-lg-7 alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>erro ao guardar!Usuario Ja existe na base de dados!!</strong>
        </div style="margin-bottom:50px;"> <br>';
     
     
 }
 }
 
 
 function cadastrarCurso($conexao,$nome){

            
     $res = (mysqli_query($conexao,"select * from curso where nome='".$nome."'"));
     
     
     if(mysqli_num_rows($res)==0){
         
    
     if(mysqli_query($conexao,"Insert into Curso values(null,'".$nome."')")){
         
         echo '<div class="col-lg-7 alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Curso cadastrado com Sucesso!</strong>
        </div style="margin-bottom:50px;"> <br>';
         return true;
         
         
     }else{
         
         echo '<div class="col-lg-7 alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>erro ao guardar!</strong>
        </div style="margin-bottom:50px;"> <br>';
     }
         
         
        

     
     
     
 } else {
     
 
      echo '<div class="col-lg-7 alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>erro ao guardar!O curso Ja existe na base de dados!!</strong>
        </div style="margin-bottom:50px;"> <br>';
     
     
 }
 
 
 }
 
 
 
 
 
 function cadastrarCadeira($conexao,$nome,$docente,$curso,$turma,$max){
     
       
     $res = (mysqli_query($conexao,"select * from cadeira where nome='".$nome."'"));
     
     
     if(mysqli_num_rows($res)==0){
     
     
     
     if(mysqli_query($conexao, "insert into cadeira values(null,'".$nome."',".$docente.",$curso,".$turma.",".$max.")")){
         
         echo '<div class="col-lg-7 alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Cadeira cadastrada com Sucesso!</strong>
        </div style="margin-bottom:50px;"> <br>';
         
     } else {
         
          echo '<div class="col-lg-7 alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>erro ao guardar!</strong>
        </div style="margin-bottom:50px;"> <br>'; 
         
     }
     
     
     
 }else{
     
     
     
     
      echo '<div class="col-lg-7 alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>erro ao guardar!A cadeira Ja existe na base de dados!!</strong>
        </div style="margin-bottom:50px;"> <br>';
     
     
     
     
 }
 
 
 
 
 
 }
    


 function cadastrarDocente($conexao,$nome,$apelido,$email,$password){
     
    
      $res = (mysqli_query($conexao,"select * from docente where email='".$email."'"));
     
     
     if(mysqli_num_rows($res)==0){ 
     
     
         
         if(mysqli_query($conexao, "insert into Docente values(null,'".$nome."','".$email."','".md5($password)."','".$apelido."')")){
             
             
             echo '<div class="col-lg-7 alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Docente cadastrado com Sucesso!</strong>
        </div style="margin-bottom:50px;"> <br>';
         
     }
     
     
 }else{
     
     
        echo '<div class="col-lg-7 alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>erro ao guardar!O docente Ja existe na base de dados!!</strong>
        </div style="margin-bottom:50px;"> <br>';
     
     
     
     
 }
 
 
 
 
 }
 
 
 function cadastrarTurma($conexao,$curso,$turno,$ano){
     
      $res = (mysqli_query($conexao,"select * from turma where turno='".$turno."' and ano = '".$ano."' and fk_id_curso= '".$curso."' "));
     
     
     if(mysqli_num_rows($res)==0){ 
    
     
     if(mysqli_query($conexao, "insert into Turma values(null,'".$turno."','".$ano."','".$curso."' )")){
        
        echo '<div class="col-lg-7 alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Turma cadastrada com Sucesso!</strong>
        </div style="margin-bottom:50px;"> <br>';
        
    } else {
    
        echo '<div class="col-lg-7 alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>erro ao guardar!</strong>
        </div style="margin-bottom:50px;"> <br>';
    }
     
     
 }else{
  
     
     
    echo '<div class="col-lg-7 alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>erro ao guardar!A turma Ja existe na base de dados!!</strong>
        </div style="margin-bottom:50px;"> <br>'; 
     
     
     
 }
 }


    function cadastrarEstudante($conexao,$nome,$apelido,$email,$password,$curso){
     
            
        $res = (mysqli_query($conexao,"select * from estudante where email='".$email."'"));
     
     
        
        
        
        
        if(mysqli_num_rows($res)==0){
        
        
         
         if(mysqli_query($conexao, "insert into Estudante values(null,'".$nome."','".$email."','".md5($password)."','".$apelido."','". getIDCurso($conexao, $curso)."')")){
             
             
        echo '<div class="col-lg-7 alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Estudante cadastrado com Sucesso!</strong>
        </div style="margin-bottom:50px;"> <br>';
         
     } else {
         
         echo '<div class="col-lg-7 alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>erro ao guardar!</strong>
        </div style="margin-bottom:50px;"> <br>';
         
     }
     
     
 }else{
     
      echo '<div class="col-lg-7 alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>erro ao guardar!O estudante existe na base de dados!!</strong>
        </div style="margin-bottom:50px;"> <br>'; 
     
     
 }
 
    
    }  
    

 
 
 
 
 function cadastrarCoord($conexao,$nome,$apelido,$email,$password,$curso){
     
     
        $res = (mysqli_query($conexao,"select * from coordenador where email='".$email."'"));
     
     
        if(mysqli_num_rows($res)==0){ 
    
         
         if(mysqli_query($conexao, "insert into coordenador values(null,'".$nome."','".$apelido."','".$email."','".md5($password)."','".$curso."')")){
             
             
             echo '<div class="col-lg-7 alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Coordenador cadastrado com Sucesso!</strong>
        </div style="margin-bottom:50px;"> <br>';
         
     } else {
         
       echo '<div class="col-lg-7 alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>erro ao guardar!</strong>
        </div style="margin-bottom:50px;"> <br>';
         
     }
     
     
 } else {
     
 
     echo '<div class="col-lg-7 alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>erro ao guardar!O Cordebador existe na base de dados!!</strong>
        </div style="margin-bottom:50px;"> <br>';
 }
 
 }





 /** ========== GETS ===============**/ 
     function getCursos($conexao,$mode){
         
         
        $res = mysqli_query($conexao, "select * from curso") ;
        
       echo mysqli_num_rows($res);
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
        if($mode>0){
        echo  "<option>".$row["nome"]."</option>";
       
    } else {
        return $row["nome"];
    }
    }
    
} else{
    echo"<option> Nenhum Curso Cadastrado</option>";
}
         
         
         
     }
     
     
     function getDocentes($conexao){
         
         
        $res = mysqli_query($conexao, "select * from Docente") ;
        
       echo mysqli_num_rows($res);
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        echo  "<option>".$row["nome"]."</option>";
    }
} else{
    echo"<option> Nenhum Docente Cadastrado</option>";
}
         
         
         
     }
     
     
     function getTurmas($conexao){
         
         
        $res = mysqli_query($conexao, "select turma.ano,turma.turno,curso.nome as curso, turma.ID as ID, curso.ID as curso_id from turma inner join curso on turma.fk_id_curso=curso.ID") ;
        
    
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        echo  "<option value='".$row["ID"]."'>".$row["curso"]." ".$row["ano"]." ano -  ".$row["turno"]."</option>";        
    }
} else{
    echo"<option> Nenhuma turma Cadastrada</option>";
}
         
         
         
     }
     
     
     
     /** ================  Get ID's   ====================== **/
     
     
    function getIDCurso($conexao,$nome){
         
         
        $res = mysqli_query($conexao, "select * from curso where nome ='".$nome."' LIMIT 1") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
        return $row["ID"];
    }
} else{
    echo "Id do curso nao encontrado";
}
         
         
         
     }
     
      function getIDCadeira($conexao,$nome){
         
         
        $res = mysqli_query($conexao, "select * from cadeira where nome ='".$nome."' LIMIT 1") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
        return $row["ID"];
    }
} else{
    echo 0;
}
         
         
         
     }
     
     
      function getIDDocente($conexao,$nome){
         
         
        $res = mysqli_query($conexao, "select * from docente where nome ='".$nome."' LIMIT 1") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
        return $row["ID"];
    }
} else{
    echo 0;
}
         
         
         
     }
     
     
     
     
     
     
     
     function getIDTurma($conexao,$nome){
         
         
        $res = mysqli_query($conexao, "select * from turma where nome ='".$nome."' LIMIT 1") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
        return $row["ID"];
    }
} else{
    echo 0;
}
         
         
         
     }
     
     
     
     
     
     
     
     
     function getNomeCurso($conexao,$id){
         
                
        $res = mysqli_query($conexao, "select * from curso where ID ='".$id."' LIMIT 1") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
        return $row["nome"];
    }
} else{
    
    
  
    echo 0;
    
}
         
        
         
     }
     
     
     function getNomeDocente($conexao,$id){
         
                
        $res = mysqli_query($conexao, "select * from docente where ID ='".$id."' LIMIT 1") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
        return "".$row["nome"]." ".$row["apelido"];
    }
} else{
    echo 0;
    
}
         
        
         
     }
     
     
     
     
     function getMaxID($conexao,$tabela){
         
         $res = mysqli_query($conexao, "select Max(ID) from ".$tabela );
         
         if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
         
        return $row["Max(ID)"];
       
        
    }
} else{
    echo 0;
}
         
         
         
         
     }
     
     
     
     
     
     /** ========== TABELAS =========== **/
     
     
     function tabelaAdmin($conexao){
         
         
         
         
         
         
         
         
         echo '<table class="table table-striped" data-effect="fade" style="margin-top: 100px; margin-bottom: 55px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Apelido</th>
                  <th>E-mail</th>
                  

                  </tr>
              </thead>
              <tbody>
              <form method="GET">';
         
         
                
         $res = mysqli_query($conexao, "select * from admin") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
            $i=0;
    while($row = mysqli_fetch_assoc($res)) {
        
        echo  '<tr>
                  <td>'.$row["ID"].'</td>
                  <td>'.$row["nome"].'</td>
                  <td>'.$row["apelido"].'</td>
                  <td>'.$row["email"].'</td>
                  <td>    <div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$i.'" value='.$row["ID"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>
                </tr>';
        
        
        
        $i++;
    }
         
         
         
         
         
         
         
         
         
         echo '</tbody>
            </table>';
         
     }else{
         
         echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Nenhum Administrador na base de dados!Por favor efetue o cadastro.</strong> 
        </div>
        
     </tbody>
     </table>';
         
         
     }
     }
 
 
 
 
 function tabelaDocente($conexao){
         
         
         
         
         
         
         
         
         echo '<table class="table table-striped" data-effect="fade" style="margin-top: 100px; margin-bottom: 55px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Apelido</th>
                  <th>E-mail</th>
                  

                  </tr>
              </thead>
              <tbody>
              <form method="GET">';
         
         
                
         $res = mysqli_query($conexao, "select * from Docente") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
            $i=0;
    while($row = mysqli_fetch_assoc($res)) {
        
        echo  '<tr>
                  <td>'.$row["ID"].'</td>
                  <td>'.$row["nome"].'</td>
                  <td>'.$row["apelido"].'</td>
                  <td>'.$row["email"].'</td>
                  <td>    <div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$i.'" value='.$row["ID"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>
                </tr>';
        
        
        
        $i++;
    }
         
         
         
         
         
         
         
         
         
         echo '</tbody>
            </table>';
         
     }else{
         
         echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Nenhum Docente na base de dados!Por favor efetue o cadastro.</strong> 
        </div>
         </tbody>
     </table>';
         
         
     }
     }
     
     
     
 
 
 function tabelaEstudante($conexao){
         
         
         
         
         
         
         
         
         echo '<table class="table align-center table-striped" data-effect="fade" style="margin-top: 100px; margin-bottom: 55px;">
              <thead>
                <tr>
                  <th class="align-center">ID</th>
                  <th class="align-center">Nome</th>
                  <th class="align-center">Apelido</th>
                  <th class="align-center">E-mail</th>
                  <th class="align-center">Curso</th>
                  <th class="align-center"></th>

                  </tr>
              </thead>
              <tbody>
              <form method ="GET">';
         
         
                
         $res = mysqli_query($conexao, "select * from Estudante") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
            $i=0;
    while($row = mysqli_fetch_assoc($res)) {
        
        echo  '<tr>
                  <td>'.$row["ID"].'</td>
                  <td>'.$row["nome"].'</td>
                  <td>'.$row["apelido"].'</td>
                  <td>'.$row["email"].'</td>
                  <td>'.getNomeCurso($conexao,$row["fk_id_curso"]).'</td>
                                                   
                  <td>    <div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$i.'" value='.$row["ID"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>
                </tr>';
        
        $i++;
    }
         
         
         
         
         
         
         
         
         
         echo '</tbody>
            </table>';
         
     }else{
         
         echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Nenhum Estudante na base de dados!Por favor efetue o cadastro.</strong> 
        </div> </tbody>
     </table>';
         
         
     }
     }
     
     
     
     
     function tabelaCurso($conexao){
         
         
         
         
         
         
         
         
         echo '<table class="table table-striped" data-effect="fade" style="margin-top: 100px; margin-bottom: 55px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                 </tr>
              </thead>
              <tbody>
              <form Method="GET">';
         
         
                
         $res = mysqli_query($conexao, "select * from curso") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
            $i=0;
    while($row = mysqli_fetch_assoc($res)) {
        
        echo  '<tr>
                  <td>'.$row["ID"].'</td>
                  <td>'.$row["nome"].'</td>
                  <td>    <div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$i.'" value='.$row["ID"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>
                  
                </tr>';
        
        
        $i++;
    }
         
         
         
         
         
         
         
         
         
         echo '</tbody>
            </table>';
         
     }else{
         
         echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Nenhum Curso na base de dados!Por favor efetue o cadastro.</strong> 
        </div>   </tbody>
     </table>';
         
         
     }
     }
  
     
     
     
     
       function tabelaCadeira($conexao){
         
         
         
         
         
         
         
         
         echo '<table class="table table-striped" data-effect="fade" style="margin-top: 100px; margin-bottom: 55px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome da Cadeira</th>
                  <th>Docente</th>
                  <th>Curso</th>
                 </tr>
              </thead>
              <form method="GET">
              <tbody>';
         
         
                
         $res = mysqli_query($conexao, "select * from cadeira") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
            $i=0;
    while($row = mysqli_fetch_assoc($res)) {
        
        echo  '<tr>
                  <td>'.$row["ID"].'</td>
                  <td>'.$row["nome"].'</td>
                  <td>'. getNomeDocente($conexao, $row["fk_id_docente"]).'</td>
                  <td>'. getNomeCurso($conexao, $row["fk_id_curso"]).'</td>
                      
                  <td>    <div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$i.'"  value='.$row["ID"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>
                  
                </tr>';
    }
         
         
         
         
         
         
         
         
         
         echo '</tbody>
            </table>';
         
     }else{
         
         echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Nenhuma Cadeira na base de dados!Por favor efetue o cadastro.</strong> 
        </div>  </tbody>
     </table>';
         
         
     }
     }
      
   
     
     
      function tabelaTurma($conexao){
         
         
         
         
         
         
         
         
         echo '<table class="table table-striped" data-effect="fade" style="margin-top: 100px; margin-bottom: 55px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Turno</th>
                  <th>Ano</th>
                  <th>Curso</th>
                 </tr>
              </thead>
              <tbody>
              <form method ="GET">
';
         
         
                
         $res = mysqli_query($conexao, "select * from turma") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
            $i =0;
    while($row = mysqli_fetch_assoc($res)) {
        
        
        echo  '<tr>
                  <td>'.$row["ID"].'</td>
                  <td>'.$row["turno"].'</td>
                  <td>'.$row["ano"].'</td>
                  <td>'. getNomeCurso($conexao, $row["fk_id_curso"]).'</td>
                  <td>    <div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$i.'" value='.$row["ID"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>
                  
                  
                </tr>';
        $i++;
       
    }
         
         
         
         
         
         
         
         
         
         echo '
            
            </tbody>
            </table>';
         
     }else{
         
         echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Nenhuma Turma na base de dados!Por favor efetue o cadastro.</strong> 
        </div>  </tbody>
     </table>';
         
         
     }
     }
     
 




     /** ========== REMOVER TURMAS ============== **/
     
     function Remover($conexao,$selecionados,$tabela){
       
         $lenght = count($selecionados);
         $erro=0;
         for($i=0;$i<$lenght;$i++){
           
         if(mysqli_query($conexao, "delete from ".$tabela." where id=".$selecionados[$i]."")){
             
             
             echo '<div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Remoção feita com Sucesso!</strong> 
        </div>';
             
             
             
             
             
         } else if($erro<1){
             
             
             
              echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Ocorreu um erro durante a Remoção, por favor tente denovo ou contacte o Administrador!</strong> 
        </div>';
         }
         
         
         
         
         
         
         
     }
     }
     
     
     
     function logout(){
         
         
         session_destroy();
         
         echo  "<script>"
                 . "window.location.assign('index.php');"
                 . ""
                 . "</script>";
         
     }
     
     
     function getCursosIndiv($conexao){
         
         
        $res = mysqli_query($conexao, "select docente.id as ID,docente.nome, cadeira.nome as cadeira,turma.ano,turma.id as id_turma, turma.turno,curso.ID as id_curso from (((cadeira  inner join docente on cadeira.fk_id_docente=docente.id) inner join turma on cadeira.fk_id_turma = turma.id)inner join curso on curso.ID=cadeira.fk_id_curso)") ;
        
       
       
        if (mysqli_num_rows($res) > 0) {
        // output data of each row
            $i=0;
            $j=0;
            $ids = array();
           $_SESSION["ids"] = $ids;
               
              $res = mysqli_query($conexao, "select docente.id as ID,docente.nome, cadeira.nome as cadeira, cadeira.id as id_cadeira, turma.ano,turma.id as id_turma, turma.turno,curso.ID as id_curso from (((cadeira  inner join docente on cadeira.fk_id_docente=docente.id) inner join turma on cadeira.fk_id_turma = turma.id)inner join curso on curso.ID=cadeira.fk_id_curso)") ;
      
            
     while($row = mysqli_fetch_assoc($res)) {
        
        
                
                
        if($row["ID"]==$_SESSION["user_id"]){
            
            
                $def = $_SESSION["ids"];
            if(!Contains($row["id_cadeira"], $def)){
            echo  "<li><a  id ='batata' href='#' style='text-decoration: none;'><button type='submit' value='".$row["id_cadeira"]."' name='escolheu_turma".$i."' style='  background:rgba(0,0,0,0);border:rgba(0,0,0,0); text-decoration: none;'>". getNomeCurso($conexao, $row["id_curso"])." ".$row["ano"]." ano ".$row["turno"]."--".$row["cadeira"]."</button></a></li>";
       
                $ids[$i]= $row["id_cadeira"];
            
                $_SESSION["ids"] = $ids;
            $i++;
    } 
    
        }
     
    
}

     }
     }
     
     
 function getCadeirasIndiv($conexao,$turma){
         
         
        $res = mysqli_query($conexao, "select docente.id as ID,docente.nome,cadeira.ID as id_cadeira, cadeira.nome as cadeira,turma.ano,turma.turno,curso.ID as id_curso,turma.ID as id_turma,cadeira.fk_id_turma  from (((cadeira  inner join docente on cadeira.fk_id_docente=docente.id) inner join turma on cadeira.fk_id_turma = turma.id)inner join curso on curso.ID=cadeira.fk_id_curso)") ;
        
       
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
        if($row["ID"]==$_SESSION["user_id"]){
            
            if($turma==$row["id_turma"]){
      
            echo  "<option value ='".$row["id_cadeira"]."' >".$row['cadeira']."</option>";
       
    } 
    }
    
        } }
    
}


function getCadeirasL($conexao,$turma){
         
         
        $res = mysqli_query($conexao, "select docente.id as ID,docente.nome,cadeira.ID as id_cadeira, cadeira.nome as cadeira,turma.ano,turma.turno,curso.ID as id_curso,turma.ID as id_turma,cadeira.fk_id_turma  from (((cadeira  inner join docente on cadeira.fk_id_docente=docente.id) inner join turma on cadeira.fk_id_turma = turma.id)inner join curso on curso.ID=cadeira.fk_id_curso)") ;
        
       
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
        if($row["ID"]==$_SESSION["user_id"]){
            
            if($turma==$row["id_turma"]){
      
            echo  $row['cadeira'];
       
    } 
    }
    
        } }
    
}
         
         
                                                                                                                    
    function getEstudantesIndiv($conexao,$curso,$cadeira){
         
        
        
        $res = mysqli_query($conexao, "select * from estudante where fk_id_curso = ".$curso."") ;
        
       $i=0;
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
            
        
           
    echo '<table class="table table-striped">'
            . '<thead>'
            . '<tr>'
            . ''
            . '<th>ID</th> '
            . '<th>Nome</td>'
            . '</tr>'
            . '</thead>'
            . '<tbody>';
    
    
            
    while($row = mysqli_fetch_assoc($res)) {
        
       
      
            echo  "<tr>
                  <td>".$row["ID"]."</td>
                  <td>".$row["nome"]." ".$row["apelido"]."</td>
";                 
            
            if(!isEstudantesCadeira($conexao, $row["ID"],$cadeira)){
            echo '<td><div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$row["ID"].'" value='.$row["ID"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>';
            
            
            } else {
              
                echo '<td>O estudante ja exixte na Lista</td>';
                
            }
                  
       echo  "</tr>";
      $i++; 
    } 
    
    
    echo '</tbody>'
    . '</table>';
    
    }
    
    $_SESSION["cadeira"] = $_GET["cadeira"];
   
    
    
    
        }
 
    
    
    
    
    function getNrTurma($conexao){
        
        $res = mysqli_query($conexao, "select Count(ID) as count from turma");
        
        if(mysqli_num_rows($res)>0){
            
            
            while($row= mysqli_fetch_assoc($res)){
                
                return $row["count"];
                
            }
            
        }
        
    }
    
    
    
    
    function Contains($nr, $array){
        
                $i=0;
                
                while ($i <= count($array)){
                   
                    
                    if($nr == $array[$i]){
                        
                        return true;
                    }
                     $i++;
                    }
                    
                   
                  return false;  
                }
                
                
                
                
                
                
                
                /**  ================ FALTAS  =================== **/
                
                
                function marcarFaltas($conexao,$selecionados){
                   
                   
          $turma = $_SESSION["turma"]; 
         
          
          $curso = getCursocadeira($conexao, $turma);
                
         if(mysqli_query($conexao, "insert into lista_presenca values(null,".$curso.",".$turma." ,null,".$_SESSION["user_id"].")")){          
       
             
          $lenght = count($selecionados);
         
       
          
          $erro=0;
          
          
         for($i=0;$i<$lenght;$i++){
         
        
         if(mysqli_query($conexao, "insert into falta values(null,null,".$_SESSION["user_id"].",". getCursoCadeira($conexao, $turma).",". getTurmaCadeira($conexao, $turma).",".$selecionados[$i].",".$turma.",".checkLastLista($conexao).", 'Não justificada')")){
             
             
             
             
             
             
             
             
         } else{
             
             
             
              echo  '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Ocorreu um erro durante a Marcação de Faltas, por favor tente denovo ou contacte o Administrador!</strong> 
        </div>';
         }
         
         
         
         
         
                  
                    
                }
                
                
                echo '<div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Lista Guardada com Sucesso!</strong> 
        </div>';
                }
        
                }
    
    
                
                
              function  getTurmaCadeira($conexao,$id){
                    
              
                $res =  mysqli_query($conexao, "select * from cadeira where id='".$id."' LIMIT 1");
                    
                    if(mysqli_num_rows($res)>0){
                        
                        
                        while($row = mysqli_fetch_assoc($res)){
                            
                            
                            
                           return $row["fk_id_turma"];
                            
                            
                        }
                        
                        
                        
                        
                    }
                    
                }
              
                
                
                 function  getCursoTurma($conexao,$id){
                    
              
                $res =  mysqli_query($conexao, "select * from turma where id='".$id."' LIMIT 1");
                    
                    if(mysqli_num_rows($res)>0){
                        
                        
                        while($row = mysqli_fetch_assoc($res)){
                            
                            
                            
                           return $row["fk_id_curso"];
                            
                            
                        }
                        
                        
                        
                        
                    }
                    
                }
                
                
                function checkLastLista($conexao){
                    
                    
                    $res =  mysqli_query($conexao, "select Max(ID) as max from lista_presenca");
                    
                    if(mysqli_num_rows($res)>0){
                        
                        
                        while($row = mysqli_fetch_assoc($res)){
                            
                            
                            
                           return $row["max"];
                            
                            
                        }
                        
                        
                        
                        
                    }else{
                        
                        return 0;
                    }
                    
                    
                }
                
              
                
                
                
               function  tas($conexao){
                     $e=0;
                   
                   $res = mysqli_query($conexao, "select * from lista_presenca where fk_id_docente=".$_SESSION["user_id"]."");
                   $listas = mysqli_num_rows($res);
                   $ids = array();
                   $i=0;
                   $c=0;
                   
                   if(mysqli_num_rows($res)>0){
                       
                       
                       while ($row = mysqli_fetch_assoc($res)){
                           
                          if(!Contains($row["ID"], $ids)){
                              
                              $ids[$i]=$row["ID"];
                              $i++;
                              $_SESSION["ids"]=$ids;
                          }
                           
                           
                       } 
                       $novos = array();
                       while($c<=count($ids)){
                           
                           $res = mysqli_query($conexao, "select * from falta where fk_id_lista=".$ids[$c].";");
                           $d=0;
                         
                           while($row = mysqli_fetch_assoc($res)){
                               
                               
                                if(!Contains($ids[$c], $novos)){
                                   $novos[$d]=$ids[$c];
                                    echo '<div class="accordion-group">
            <div class="accordion-heading">

              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$e.'">
                <em class="fa fa-plus fa-fw"></em>'. getNomeCurso($conexao, $row["fk_id_curso"]).' - '. getTurma($conexao, $row["fk_id_turma"])."--- ". getNomeCadeira($conexao, $row["fk_id_cadeira"])."---".$row["Data"].' 
              </a>
            </div>'; 
                               
                                    echo '<div id="collapse'.$e.'" class="accordion-body collapse">
              <div class="accordion-inner"><table class="table table-striped align-center" data-effect="fade" style="margin-top: 30px; margin-bottom: 55px;">
              <thead class="align-center"><tr>
                  <th class="align-center">#</th>
                  <th>Nome do Estudante</th>
                  <th>Estado</th>
                  </tr>
              </thead>
              <tbody>'; $e++;
                                    $res2 = $res = mysqli_query($conexao, "select * from falta where fk_id_lista=".$ids[$c].";");
                                    while($row2 = mysqli_fetch_assoc($res2)){
                                        
                                        echo '
                
                <tr>
                  <td>'.$row2["fk_id_estudante"].'</td>
                  
                  <td>'. getNomeEstudante($conexao, $row2["fk_id_estudante"]).'</td>
                   <td>'.$row['estado'].'</td>
                </tr>
                
             ';
                                        
                                        
                                        
                                    }
                                    
                                    echo ' </tbody>
            </table>
              </div>
            </div>
          </div>
           ';
                                  $d++;  
                                }
                             
                               
                               
                           }
                          
                           
                           
                           $c++;
                       }
                  
                       
                  
                        }
                   else{
                       
                       
                       
                       
                       
                       
                       
                   }
                      
              }
              
              
              
              function  getTurma($conexao,$id){
                    
              
                $res =  mysqli_query($conexao, "select * from turma where id='".$id."' LIMIT 1");
                    
                    if(mysqli_num_rows($res)>0){
                        
                        
                        while($row = mysqli_fetch_assoc($res)){
                            
                            
                            
                           return " ".$row["ano"]."o Ano - ".$row["turno"];
                            
                            
                        }
                        
                        
                        
                        
                    }
                    
                }
                
                
                function getNomeEstudante($conexao,$id){
         
                
        $res = mysqli_query($conexao, "select * from estudante where ID ='".$id."' LIMIT 1") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
        return "".$row["nome"]." ".$row["apelido"];
    }
} else{
    echo 0;
}
         
        
         
     }
     
     
     function getNomeCadeira($conexao,$id){
         
                
        $res = mysqli_query($conexao, "select * from cadeira where ID ='".$id."' LIMIT 1") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
        return $row["nome"];
    }
} else{
    echo 0;
}
         
        
         
     }
     
     
    function getCadeirasDoc($conexao, $id){
         
         
           
                
        $res = mysqli_query($conexao, "select * from cadeira where fk_id_docente= '".$id."'") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    
    
            while($row = mysqli_fetch_assoc($res)){
        
        echo '<tr>
                  <td>'.$row["ID"].'</td>
                  <td>'.$row["nome"].'</td>
                  <td>'.getNomeCurso($conexao,$row["fk_id_curso"]).'</td>
                 
                </tr>'
                ;
    }
} else{
    echo 0;
}
         
        
         
     }
     
     
     
     function getFaltasEst($conexao, $id){
       
         
         
                
        $res = mysqli_query($conexao, "select * from falta where fk_id_estudante='".$id."'") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    
    
            while($row = mysqli_fetch_assoc($res)){
        
        echo '<tr>
                  <td>'.$row["ID"].'</td>
                  <td>'.$row["Data"].'</td>
                  <td>'.getNomeCadeira($conexao,$row["fk_id_cadeira"]).'</td>
                   <td>'.$row["estado"].'</td>   
                  <td>'. getNrFaltasEst($id, $row["fk_id_cadeira"], $conexao).'</td>
                  <td>'. getLimiteFaltas($conexao,$row["fk_id_cadeira"]).'</td>
                </tr>'
                ;
    }
} else{
    echo 0;
}
         
        
         
     }
     
     
     
     
     function getNrFaltasEst($estudante,$cadeira,$conexao){
         
         $res = mysqli_query($conexao, "select * from falta where fk_id_estudante='".$estudante."' and fk_id_cadeira = ".$cadeira."") ;
        
     
         
        return mysqli_num_rows($res);
    
    
          
         
     }
       
     
     
     
       function tabelaCoord($conexao){
         
         
         
         
         
         
         
         
         echo '<table class="table table-striped" data-effect="fade" style="margin-top: 100px; margin-bottom: 55px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Apelido</th>
                  <th>E-mail</th>
                  <th>Curso</th>
                  

                  </tr>
              </thead>
              <tbody>
              <form method ="GET">';
         
         
                
         $res = mysqli_query($conexao, "select * from coordenador") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
            $i=0;
    while($row = mysqli_fetch_assoc($res)) {
        
        echo  '<tr>
                  <td>'.$row["ID"].'</td>
                  <td>'.$row["nome"].'</td>
                  <td>'.$row["apelido"].'</td>
                  <td>'.$row["email"].'</td>
                      <td>'. getNomeCurso($conexao, $row["fk_id_curso"]).'</td>
                  <td>    <div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$i.'" value='.$row["ID"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>
                </tr>';
        
        $i++;
    }
         
         
         
         
         
         
         
         
         
         echo '</tbody>
            </table>';
         
     }else{
         
         echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Nenhum Coordenador na base de dados!Por favor efetue o cadastro.</strong> 
        </div> </tbody>
     </table>';
         
         
     }
     }
     
     
    function getLimiteFaltas($conexao,$cadeira){
        
        
                  
        $res = mysqli_query($conexao, "select * from cadeira where ID ='".$cadeira."' LIMIT 1") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
        return $row["max_faltas"];
    }
} else{
    
    
  
    echo 0;
    
}
         
        
         
         
         
         
     }
     
       
         
     function getFaltas($conexao,$estudante){
         
          $res = mysqli_query($conexao, "select * from falta where fk_id_estudante='".$estudante."'") ;
        
    
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        if($row["estado"]=="Não justificada"){
        
        echo  "<option value='".$row["ID"]."'>".$row["ID"]."</option>";        
    }
    
        }
    
} else{
    echo"<option> Nenhuma falta na Base de Dados</option>";
}
         
         
         
         
         
         
     }
     
     
     function  getTurmasIndiv($conexao,$curso){
         
         
       
         
         
        $res = mysqli_query($conexao, "select * from Turma where fk_id_curso='".$curso."' ") ;
        
    
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        echo  "<option value='".$row["ID"]."'>". getNomeCurso($conexao, $curso)." ".$row["ano"]." ano -  ".$row["turno"]."</option>";        
    }
} else{
    
    echo"<option> Nenhuma turma Cadastrada</option>";
}
         
         
         
     
     
         
         
     }
     
     
     
     function getCursoCoord($conexao,$id){
         
         
          $res = mysqli_query($conexao, "select fk_id_curso as curso from coordenador where ID='".$id."' ") ;
        
    
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
        
         return $row["curso"] ;
        
    }
} else{
   
}
         
         
         
         
         
         
         
         
     }
     
     
     
     
     
     
     
      function tabelaEstudanteCoord($conexao,$curso){
         
         
         
         echo '<table class="table table-striped" data-effect="fade" style="margin-top: 100px; margin-bottom: 55px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Apelido</th>
                  <th>E-mail</th>
                  

                  </tr>
              </thead>
              <tbody>
              <form method ="GET">';
         
         
                
         $res = mysqli_query($conexao, "select estudante.ID, estudante.nome, estudante.email,estudante.apelido,curso.id as id_curso from (estudante inner join curso on estudante.fk_id_curso=curso.id)") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
            $i=0;
    while($row = mysqli_fetch_assoc($res)) {
        
        if($row['id_curso']==$curso){
        
        echo  '<tr>
                  <td>'.$row["ID"].'</td>
                  <td>'.$row["nome"].'</td>
                  <td>'.$row["apelido"].'</td>
                  <td>'.$row["email"].'</td>
                  <td>    <div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$i.'" value='.$row["ID"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>
                </tr>';
        
        $i++;
    }
         
         
         
         
         
    } 
         
         
         
         echo '</tbody>
            </table>';
         
     }else{
         
         echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Nenhum Estudante na base de dados!Por favor efetue o cadastro.</strong> 
        </div> </tbody>
     </table>';
         
         
     }
     }
     
     
     
     
     
     
     
      function tabelaDocenteCoord($conexao,$curso){
         
         
         
         echo '<table class="table table-striped" data-effect="fade" style="margin-top: 100px; margin-bottom: 55px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Apelido</th>
                  <th>E-mail</th>
                  

                  </tr>
              </thead>
              <tbody>
              <form method ="GET">';
         
         
                
         $res = mysqli_query($conexao, "select estudante.ID, estudante.nome, estudante.email,estudante.apelido,curso.id as id_curso,turma.ID as id_turma from ((Estudante inner join turma on estudante.fk_id_turma = turma.id) inner join curso on curso.id=turma.fk_id_curso)") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
            $i=0;
    while($row = mysqli_fetch_assoc($res)) {
        
        if($row['id_curso']==$curso){
        
        echo  '<tr>
                  <td>'.$row["ID"].'</td>
                  <td>'.$row["nome"].'</td>
                  <td>'.$row["apelido"].'</td>
                  <td>'.$row["email"].'</td>
                  <td>    <div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$i.'" value='.$row["ID"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>
                </tr>';
        
        $i++;
    }
         
         
         
         
         
    } 
         
         
         
         echo '</tbody>
            </table>';
         
     }else{
         
         echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Nenhum Estudante na base de dados!Por favor efetue o cadastro.</strong> 
        </div> </tbody>
     </table>';
         
         
     }
     }
     
     
     
      function tabelaTurmaCoorde($conexao,$id_curso){
         
         
         
         
        
         
         
         
         echo '<table class="table table-striped" data-effect="fade" style="margin-top: 100px; margin-bottom: 55px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Turno</th>
                  <th>Ano</th>
                  <th>Curso</th>
                 </tr>
              </thead>
              <tbody>
              <form method ="GET">
';
         
         
                
         $res = mysqli_query($conexao, "select * from turma where fk_id_curso=".$id_curso."") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
            $i =0;
    while($row = mysqli_fetch_assoc($res)) {
        
        
        echo  '<tr>
                  <td>'. $row["ID"].'</td>
                  <td>'.$row["turno"].'</td>
                  <td>'.$row["ano"].'</td>
                  <td>'. getNomeCurso($conexao, $row["fk_id_curso"]).'</td>
                  <td>    <div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$i.'" value='.$row["ID"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>
                  
                  
                </tr>';
        $i++;
       
    }
         
         
         
         
         
         
         
         
         
         echo '
            
            </tbody>
            </table>';
         
     }else{
         
         echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Nenhuma Turma na base de dados!Por favor efetue o cadastro.</strong> 
        </div>  </tbody>
     </table>';
         
         
     }
     }
     
     
     
     
     function tabelaCadeiraCoord($conexao,$id_curso){
         
         
         
         
         
         
         
         
         echo '<table class="table table-striped" data-effect="fade" style="margin-top: 100px; margin-bottom: 55px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome da Cadeira</th>
                  <th>Docente</th>
                  <th>Curso</th>
                 </tr>
              </thead>
              <form method="GET">
              <tbody>';
         
         
                
         $res = mysqli_query($conexao, "select * from cadeira where fk_id_curso=".$id_curso."") ;
        
     
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
            $i=0;
    while($row = mysqli_fetch_assoc($res)) {
        
        echo  '<tr>
                  <td>'.$row["ID"].'</td>
                  <td>'.$row["nome"].'</td>
                  <td>'. getNomeDocente($conexao, $row["fk_id_docente"]).'</td>
                  <td>'. getNomeCurso($conexao, $row["fk_id_curso"]).'</td>
                      
                  <td>    <div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$i.'"  value='.$row["ID"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>
                  
                </tr>';
    }
         
         
         
         
         
         
         
         
         
         echo '</tbody>
            </table>';
         
     }else{
         
         echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Nenhuma Cadeira na base de dados!Por favor efetue o cadastro.</strong> 
        </div>  </tbody>
     </table>';
         
         
     }
     }
     
     
     
     
        function getListasCurso($conexao,$id_curso){
                     $e=30;
                   
                   $res = mysqli_query($conexao, "select * from lista_presenca where fk_id_curso=".getCursoCoord($conexao,$_SESSION["user_id"].""));
                   $listas = mysqli_num_rows($res);
                   $ids = array();
                   $i=0;
                   $c=0;
                   
                   if(mysqli_num_rows($res)>0){
                       
                       
                       while ($row = mysqli_fetch_assoc($res)){
                           
                          if(!Contains($row["ID"], $ids)){
                              
                              $ids[$i]=$row["ID"];
                              $i++;
                              $_SESSION["ids"]=$ids;
                          }
                           
                           
                       } 
                       $novos = array();
                       while($c<count($ids)){
                           
                           $res = mysqli_query($conexao, "select * from falta where fk_id_lista=".$ids[$c].";");
                           $d=0;
                         
                           while($row = mysqli_fetch_assoc($res)){
                               
                               
                                if(!Contains($ids[$c], $novos)){
                                   $novos[$d]=$ids[$c];
                                    echo '<div class="accordion-group">
            <div class="accordion-heading">

              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$e.'">
                <em class="fa fa-plus fa-fw"></em>'. getNomeCurso($conexao, $row["fk_id_curso"]).' - '. getTurma($conexao, $row["fk_id_turma"])."--- ". getNomeCadeira($conexao, $row["fk_id_cadeira"])."---".$row["Data"].' 
              </a>
            </div>'; 
                               
                                    echo '<div id="collapse'.$e.'" class="accordion-body collapse">
              <div class="accordion-inner"><table class="table table-striped align-center" data-effect="fade" style="margin-top: 30px; margin-bottom: 55px;">
              <thead class="align-center"><tr>
                  <th class="align-center">#</th>
                  <th>Nome do Estudante</th>
                  <th>Estado</th>
                  </tr>
              </thead>
              <tbody>'; $e++;
                                    $res2 = $res = mysqli_query($conexao, "select * from falta where fk_id_lista=".$ids[$c].";");
                                    while($row2 = mysqli_fetch_assoc($res2)){
                                        
                                        echo '
                
                <tr>
                  <td>'.$row2["fk_id_estudante"].'</td>
                  
                  <td>'. getNomeEstudante($conexao, $row2["fk_id_estudante"]).'</td>
                   <td>'.$row['estado'].'</td>
                </tr>
                
             ';
                                        
                                        
                                        
                                    }
                                    
                                    echo ' </tbody>
            </table>
              </div>
            </div>
          </div>
           ';
                                  $d++;  
                                }
                             
                               
                               
                           }
                          
                           
                           
                           $c++;
                       }
                  
                       
                  
                        }
                   else{
                       
                       
                       
                       
                       
                       
                       
                   }
                      
              }
            
      
   
              
              
               
               function getListasAdmin($conexao){
                     $e=0;
                   
                   $res = mysqli_query($conexao, "select * from lista_presenca");
                   $listas = mysqli_num_rows($res);
                   $ids = array();
                   $i=0;
                   $c=0;
                   
                   if(mysqli_num_rows($res)>0){
                       
                       
                       while ($row = mysqli_fetch_assoc($res)){
                           
                          if(!Contains($row["ID"], $ids)){
                              
                              $ids[$i]=$row["ID"];
                              $i++;
                              $_SESSION["ids"]=$ids;
                          }
                           
                           
                       } 
                       $novos = array();
                       while($c<=count($ids)){
                           
                           $res = mysqli_query($conexao, "select * from falta where fk_id_lista=".$ids[$c].";");
                           $d=0;
                         
                           while($row = mysqli_fetch_assoc($res)){
                               
                               
                                if(!Contains($ids[$c], $novos)){
                                   $novos[$d]=$ids[$c];
                                    echo '<div class="accordion-group">
            <div class="accordion-heading">

              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$e.'">
                <em class="fa fa-plus fa-fw"></em>'. getNomeCurso($conexao, $row["fk_id_curso"]).' - '. getTurma($conexao, $row["fk_id_turma"])."--- ". getNomeCadeira($conexao, $row["fk_id_cadeira"])."---".$row["Data"].' 
              </a>
            </div>'; 
                               
                                    echo '<div id="collapse'.$e.'" class="accordion-body collapse">
              <div class="accordion-inner"><table class="table table-striped align-center" data-effect="fade" style="margin-top: 30px; margin-bottom: 55px;">
              <thead class="align-center"><tr>
                  <th class="align-center">#</th>
                  <th>Nome do Estudante</th>
                  <th>Estado</th>
                  </tr>
              </thead>
              <tbody>'; $e++;
                                    $res2 = $res = mysqli_query($conexao, "select * from falta where fk_id_lista=".$ids[$c].";");
                                    while($row2 = mysqli_fetch_assoc($res2)){
                                        
                                        echo '
                
                <tr>
                  <td>'.$row2["fk_id_estudante"].'</td>
                  
                  <td>'. getNomeEstudante($conexao, $row2["fk_id_estudante"]).'</td>
                   <td>'.$row['estado'].'</td>
                </tr>
                
             ';
                                        
                                        
                                        
                                    }
                                    
                                    echo ' </tbody>
            </table>
              </div>
            </div>
          </div>
           ';
                                  $d++;  
                                }
                             
                               
                               
                           }
                          
                           
                           
                           $c++;
                       }
                  
                       
                  
                        }
                   else{
                       
                       
                       
                       
                       
                       
                       
                   }
                      
              }
              
              
              
              function ReporPass($conexao,$selecionados,$tabela){
       
         $lenght = count($selecionados);
         $erro=0;
         for($i=0;$i<$lenght;$i++){
           
         if(mysqli_query($conexao, "Update ".$tabela."   set password='". md5("12345")."' where id=".$selecionados[$i]."")){
             
              
             echo '<div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Reposição feita com Sucesso!</strong> 
        </div>';
             
             
             
             
             
         } else if($erro<1){
             
             
             
              echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Ocorreu um erro durante a Reposição de palavra passe, por favor tente denovo ou contacte o Administrador!</strong> 
        </div>';
         }
         
         
         
         // <===============  UPDATES =====================>
         
         
               function updatenome($conexao,$tabela,$id,$nome){
                    
                    
                    if(mysqli_query($conexao, "update ".$tabela." set nome ='".$nome."' where ID=".$id."")){
                        
                         echo '<script>  alert(" Alteracao feita com sucesso ");   </script>';
                    }
                    
                    
                }
         
         
     }
     }
     
     
     function alterarPass($conexao,$tabela,$id,$pass){
         
         
        
         if(mysqli_query($conexao,"UPDATE ".$tabela." SET password='".$pass."' WHERE ID=".$id."")){
             echo '<script>  alert("Alteração feita com sucesso");   </script>';
         }
             
         }
         
         
      function getCadeirasCurso($conexao,$curso){
         
         
        $res = mysqli_query($conexao, "select * from cadeira where fk_id_curso =".$curso." ") ;
        
       
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        
         echo "<option value ='".$row["ID"]."' ><button type='submit'>".$row['nome']."</button></option>";
       
    } 
    }
    
        } 
        
        
        function AdicionarAlista($conexao,$id_curso,$id_cadeira,$id_turma,$selecionados,$ano_lectivo){
            
               $lenght = count($selecionados);
         $erro=0;
         for($i=0;$i<$lenght;$i++){
          
             
             if(!isEstudantesCadeira($conexao, $selecionados[$i],$id_cadeira)){
                 
                 
         if(mysqli_query($conexao, "Insert into lista_estudantes_cadeira values(null,".$id_curso.",".$id_cadeira.",".$id_turma.",".$selecionados[$i].",".$ano_lectivo.")")){
             
             
             echo '<div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Alteracao feita com Sucesso!</strong> 
        </div>';
             
             
             
             
             
         } else if($erro<1){
             
             
             
              echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Ocorreu um erro durante a Adicão, por favor tente denovo ou contacte o Administrador!</strong> 
        </div>';
         }
         
             }else{
                 
                 echo '<script>  alert("Estudante ja existente nesta Lista");   </script>';
                 
             }
         
         
         
         
         
     }
            
             
            
        }
        
        
        
        function isEstudantesCadeira($conexao,$id_estudante,$cadeira){
            
         
            
           $res = mysqli_query($conexao, "select * from lista_estudantes_cadeira where fk_id_estudante=".$id_estudante." and fk_id_cadeira=".$cadeira);
            
           if(mysqli_num_rows($res)>0){
               
               return true;
               
           }else{
               
               
               return false;
           }
            
            
            
            
            
        }
        
        
        
        
        function  getCursoCadeira($conexao,$id){
                    
              
                $res =  mysqli_query($conexao, "select * from cadeira where id='".$id."' LIMIT 1");
                    
                    if(mysqli_num_rows($res)>0){
                        
                        
                        while($row = mysqli_fetch_assoc($res)){
                            
                            
                            
                           return $row["fk_id_curso"];
                            
                            
                        }
                        
                        
                        
                        
                    }
                    
                }
                
                
                
                
                 function getEstudantesIndivRem($conexao,$curso,$cadeira){
         
        
        
        $res = mysqli_query($conexao, "select * from estudante where fk_id_curso = ".$curso."") ;
        
       $i=0;
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
            
        
           
    echo '<table class="table table-striped">'
            . '<thead>'
            . '<tr>'
            . ''
            . '<th>ID</th> '
            . '<th>Nome</td>'
            . '</tr>'
            . '</thead>'
            . '<tbody>';
    
    
            
    while($row = mysqli_fetch_assoc($res)) {
        
       
      
            echo  "<tr>
                  <td>".$row["ID"]."</td>
                  <td>".$row["nome"]." ".$row["apelido"]."</td>
";                 
            
            if(isEstudantesCadeira($conexao, $row["ID"],$cadeira)){
            echo '<td><div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$row["ID"].'" value='.$row["ID"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>';
            
            
            } else {
              
                echo '<td>O estudante nao consta na Lista</td>';
                
            }
                  
       echo  "</tr>";
      $i++; 
    } 
    
    
    echo '</tbody>'
    . '</table>';
    
    }
    
    $_SESSION["cadeira"] = $_GET["cadeira_rem"];
  
    
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        function RemoverDaLista($conexao,$id_curso,$id_cadeira,$id_turma,$selecionados,$ano_lectivo){
            
               $lenght = count($selecionados);
         $erro=0;
         for($i=0;$i<$lenght;$i++){
          
             
             if(isEstudantesCadeira($conexao, $selecionados[$i],$id_cadeira)){
                 
                 
         if(mysqli_query($conexao, "Delete from lista_estudantes_cadeira where fk_id_estudante=".$selecionados[$i]." and fk_id_cadeira=".$id_cadeira."")){
             
             
             echo '<div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Remoção feita com Sucesso!</strong> 
        </div>';
             
             
             
             
             
         } else if($erro<1){
             
             
             
              echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Ocorreu um erro durante a Remoção, por favor tente denovo ou contacte o Administrador!</strong> 
        </div>';
         }
         
             }else{
                 
                 echo '<script>  alert("Estudante nao existente nesta Lista");   </script>';
                 
             }
         
         
         
         
         
     }
            
             
            
        }
        
        
        
        
        
        
        function getListasPresença($conexao){
            
            
            $res = mysqli_query($conexao,"select estudante.nome, estudante.apelido, lista_estudantes_cadeira.fk_id_cadeira from (estudante inner join lista_estudantes_cadeira on estudante.id=lista_estudantes_cadeira.fk_id_estudante) order by fk_id_cadeira asc");
            $listas = mysqli_num_rows($res);
                   $ids = array();
                   $i=0;
                   $c=0;
                   $e=10;
                   if(mysqli_num_rows($res)>0){
                       
                       
                       while ($row = mysqli_fetch_assoc($res)){
                           
                          if(!Contains($row["fk_id_cadeira"], $ids)){
                              
                              $ids[$i]=$row["fk_id_cadeira"];
                              $i++;
                              $_SESSION["ids"]=$ids;
                          }
                           
                           
                       } 
                       
                       $novos = array();
                       while($c<count($ids)){
                           
                           
                           
                           
                           $res = mysqli_query($conexao, "select * from cadeira where id=".$ids[$c].";");
                           $d=0;
                         
                           while($row = mysqli_fetch_assoc($res)){
                               
                               
                                if(!Contains($ids[$c], $novos)){
                                   $novos[$d]=$ids[$c];
                                    echo '<div class="accordion-group">
            <div class="accordion-heading">

              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$e.'">
                <em class="fa fa-plus fa-fw"></em>'. getNomeCurso($conexao, $row["fk_id_curso"]).' - '. getTurma($conexao, $row["fk_id_turma"])."--- ".$row["nome"].' 
              </a>
            </div>'; 
                               
                                    echo '<div id="collapse'.$e.'" class="accordion-body collapse">
              <div class="accordion-inner"><table class="table table-striped align-center" data-effect="fade" style="margin-top: 30px; margin-bottom: 55px;">
              <thead class="align-center"><tr>
                  <th class="align-center">#</th>
                  <th>Nome do Estudante</th>
                  
                  </tr>
              </thead>
              <tbody>';
                                    
                                    
                                    
                                    
                                    $e++;
                                    
                                    
                                    $res2 = $res = mysqli_query($conexao, "select * from lista_estudantes_cadeira where fk_id_cadeira=".$ids[$c].";");
                                    while($row2 = mysqli_fetch_assoc($res2)){
                                        
                                        echo '
                
                <tr>
                  <td>'.$row2["fk_id_estudante"].'</td>
                  
                  <td>'. getNomeEstudante($conexao, $row2["fk_id_estudante"]).'</td>
                   
                </tr>
                
             ';
                                        
                                        
                                        
                                    }
                                    
                                    echo ' </tbody>
            </table>
              </div>
            </div>
          </div>
           ';
                                  $d++;  
                                }
                             
                               
                               
                           }
                          
                           
                           
                           $c++;
                       }
                  
                       
                  
                        }
                   else{
                       
                       
                       
                       
                       
                       
                       
                   }
                      
            
            
            
            
            
            
        }
        
        
        
       function getEstudantesPresenca($conexao,$curso,$cadeira){
         
        
        
        $res = mysqli_query($conexao, "select estudante.id as ID ,estudante.nome, estudante.apelido, lista_estudantes_cadeira.fk_id_cadeira from (estudante inner join lista_estudantes_cadeira on estudante.id=lista_estudantes_cadeira.fk_id_estudante) order by fk_id_cadeira asc") ;
        
       $i=0;
       
        if (mysqli_num_rows($res) > 0) {
    // output data of each row
            
        
           
  
    
            
    while($row = mysqli_fetch_assoc($res)) {
        
       
        if($row["fk_id_cadeira"]==$cadeira){
            echo  "<tr>
                  <td class='align-center'>".$row["ID"]."</td>
                  <td class='align-center'>".$row["nome"]." ".$row["apelido"]."</td>
";                 
            
            
            echo '<td class="align-center"> <div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$row["ID"].'" value='.$row["ID"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>';
            
            echo  "</tr>";
            } 
                  
       
      $i++; 
    } 
    
    
    echo '</tbody>'
    . '</table>';
    
    }
    
    $_SESSION["cadeira"] = $_GET["cadeira"];
    
    
        }
        
        
        
        
        
        
        
        
        function getListasdocente($conexao){
                     $e=0;
                   
                   $res = mysqli_query($conexao, "select * from lista_presenca where fk_id_docente=".$_SESSION["user_id"]."");
                   $listas = mysqli_num_rows($res);
                   $ids = array();
                   $i=0;
                   $c=0;
                   
                   if(mysqli_num_rows($res)>0){
                       
                       
                       while ($row = mysqli_fetch_assoc($res)){
                           
                          if(!Contains($row["ID"], $ids)){
                              
                              $ids[$i]=$row["ID"];
                              $i++;
                              $_SESSION["ids"]=$ids;
                          }
                           
                           
                       } 
                       $novos = array();
                       while($c<count($ids)){
                           
                           $res = mysqli_query($conexao, "select * from falta where fk_id_lista=".$ids[$c].";");
                           $d=0;
                         
                           while($row = mysqli_fetch_assoc($res)){
                               
                               
                                if(!Contains($ids[$c], $novos)){
                                   $novos[$d]=$ids[$c];
                                    echo '<div class="accordion-group">
            <div class="accordion-heading">

              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$e.'">
                <em class="fa fa-plus fa-fw"></em>'. getNomeCurso($conexao, $row["fk_id_curso"]).' - '. getTurma($conexao, $row["fk_id_turma"])."--- ". getNomeCadeira($conexao, $row["fk_id_cadeira"])."---".$row["Data"].' 
              </a>
            </div>'; 
                               
                                    echo '<div id="collapse'.$e.'" class="accordion-body collapse">
              <div class="accordion-inner"><table class="table table-striped align-center" data-effect="fade" style="margin-top: 30px; margin-bottom: 55px;">
              <thead class="align-center"><tr>
                  <th class="align-center">#</th>
                  <th class="align-center">Nome do Estudante</th>
                  <th class="align-center">Estado</th>
                  </tr>
              </thead>
              <tbody>'; $e++;
                                    $res2 = $res = mysqli_query($conexao, "select * from falta where fk_id_lista=".$ids[$c].";");
                                    while($row2 = mysqli_fetch_assoc($res2)){
                                        
                                        echo '
                
                <tr>
                  <td>'.$row2["fk_id_estudante"].'</td>
                  
                  <td>'. getNomeEstudante($conexao, $row2["fk_id_estudante"]).'</td>
                   <td>'.$row['estado'].'</td>
                </tr>
                
             ';
                                        
                                        
                                        
                                    }
                                    
                                    echo ' </tbody>
            </table>
              </div>
            </div>
          </div>
           ';
                                  $d++;  
                                }
                             
                               
                               
                           }
                          
                           
                           
                           $c++;
                       }
                  
                       
                  
                        }
                   else{
                       
                       
                       
                      echo '<div class="alert alert-warning">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Nenhuma lista submetida!</strong> 
        </div>';  
                       
                       
                       
                   }
                      
              }
              
              
              
              
              
              
              
                      function getListasPresençaCoord($conexao,$curso){
            
            
            $res = mysqli_query($conexao,"select estudante.nome, estudante.apelido, lista_estudantes_cadeira.fk_id_cadeira, lista_estudantes_cadeira.fk_id_curso from (estudante inner join lista_estudantes_cadeira on estudante.id=lista_estudantes_cadeira.fk_id_estudante) order by fk_id_cadeira asc");
            $listas = mysqli_num_rows($res);
                   $ids = array();
                   $i=0;
                   $c=0;
                   $e=10;
                   if(mysqli_num_rows($res)>0){
                       
                      
                      
                       
                       while ($row = mysqli_fetch_assoc($res)){
                            
                           if($row["fk_id_curso"]==$curso){
                                
                                
                                
                          if(!Contains($row["fk_id_cadeira"], $ids)){
                              
                              $ids[$i]=$row["fk_id_cadeira"];
                              $i++;
                              $_SESSION["ids"]=$ids;
                           
                              
                          }
                          
                           
                           
                       }
                       }
                       
                       $novos = array();
                       while($c<count($ids)){
                           
                           
                           
                           
                           $res = mysqli_query($conexao, "select * from cadeira where id=".$ids[$c].";");
                           $d=0;
                         
                           while($row = mysqli_fetch_assoc($res)){
                               
                               
                                if(!Contains($ids[$c], $novos)){
                                   $novos[$d]=$ids[$c];
                                    echo '<div class="accordion-group">
            <div class="accordion-heading">

              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.$e.'">
                <em class="fa fa-plus fa-fw"></em>'. getNomeCurso($conexao, $row["fk_id_curso"]).' - '. getTurma($conexao, $row["fk_id_turma"])."--- ".$row["nome"].' 
              </a>
            </div>'; 
                               
                                    echo '<div id="collapse'.$e.'" class="accordion-body collapse">
              <div class="accordion-inner"><table class="table table-striped align-center" data-effect="fade" style="margin-top: 30px; margin-bottom: 55px;">
              <thead class="align-center"><tr>
                  <th class="align-center">#</th>
                  <th>Nome do Estudante</th>
                  
                  </tr>
              </thead>
              <tbody>';
                                    
                                    
                                    
                                    
                                    $e++;
                                    
                                    
                                    $res2 = $res = mysqli_query($conexao, "select * from lista_estudantes_cadeira where fk_id_cadeira=".$ids[$c].";");
                                    while($row2 = mysqli_fetch_assoc($res2)){
                                        
                                        echo '
                
                <tr>
                  <td>'.$row2["fk_id_estudante"].'</td>
                  
                  <td>'. getNomeEstudante($conexao, $row2["fk_id_estudante"]).'</td>
                   
                </tr>
                
             ';
                                        
                                        
                                        
                                    }
                                    
                                    echo ' </tbody>
            </table>
              </div>
            </div>
          </div>
           ';
                                  $d++;  
                                }
                             
                               
                               
                           }
                          
                           
                           
                           $c++;
                       }
                  
                       
                  
                       }
                   else{
                       
                       
                       
                       
                       
                       
                       
                   }
                   
            
            
            
            
            
            
        }
        
        
        
        function justificarFalta($conexao,$id_estudante,$id_falta){
            
            
           
             $target_dir = "comprovativos/";
                        $target_file = $target_dir . basename($_FILES["comprovativo"]["name"]);
                        $uploadOk = 1;
              
                    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        
                          
                            if($FileType != "docx" && $FileType != "pdf" && $FileType != "jpeg" && $FileType != "png" && $FileType != "jpg"
                             ) {
                                echo "Sorry, only, Docx , JPG, JPEG, PNG & GIF files are allowed.";
                                $uploadOk = 0;
                            }else{
                                
                                
                                
                                if (file_exists($target_file)) {
                                 echo "Sorry, file already exists.";
                                 $uploadOk = 0;
                                    }else{
                                     
                                        if(mysqli_query($conexao, "insert into justificacao values(null,null,'".$target_file."','pendente',".$id_estudante.",".$id_falta.")") and mysqli_query($conexao,"update falta set estado='pendente' where id=".$id_falta."")){
                                      
                                            
                                 if (move_uploaded_file($_FILES["comprovativo"]["tmp_name"], $target_file)) {
                                
                                     echo "<script> alert('O ficheiro ". basename( $_FILES["comprovativo"]["name"]). " foi submetido com Sucesso, aguarde a resposta do coordenador!'); </script>";
                                 } else {
                         
                                     echo "Sorry, there was an error uploading your file.";
                                }
                                
                                
                                
                                        
                            }
                            }
                            
                            
                            
                            
                                }

              
            
            
        }
        
        
        
        
       function TabelaJust($conexao,$id_curso){
           
           $i=0;
           
           
           $res = mysqli_query($conexao,"select Justificacao.id as id_just, Justificacao.data as data_just,Justificacao.estado as estado, Justificacao.comprovativo as comprovativo, Justificacao.fk_id_estudante as estudante, Justificacao.fk_id_falta as falta,falta.data as data_falta,falta.fk_id_cadeira as cadeira, falta.fk_id_docente as docente from (justificacao inner join falta on justificacao.fk_id_falta=falta.id)");
           
           while($row = mysqli_fetch_assoc($res)){
               
               
               if(getCursoCadeira($conexao, $row["cadeira"])==$id_curso and $row["estado"]=="pendente"){
                   
                   
                   
                   
                   echo '<tr>'
                   . '<td>'.$row["id_just"].'</td>'
                   . '<td>'. getNomeEstudante($conexao, $row["estudante"]).'</td>'
                   . '<td><a style="color:blue;" href="'.$row["comprovativo"].'">ver comprovativo</a></td>'
                           . '<td>'.$row["data_falta"].'</td>'
                           . '<td>'. getNomeCadeira($conexao, $row["cadeira"]).'</td>'
                           . '<td>'.$row["data_just"].'</td>'
                           
                           . ' <td>    <div class="btn-group" data-toggle="buttons" data-effect="fall">
                  
                             <label class="btn btn-primary">
                <input name="item'.$i.'" value='.$row["id_just"].' type="checkbox">Selecionar
                            </label>
              
                    </div></td>
                    
                </tr>'
                           
                           ;
                   
                   
                   $i++;
               }
               
               
               
               
               
           }
          
            
            
            
            
        }
        
        
        function aceitar($conexao,$selecionados){
       
         $lenght = count($selecionados);
         $erro=0;
         for($i=0;$i<$lenght;$i++){
           
         if(mysqli_query($conexao, "Update justificacao set  estado='justificada'  where    id=".$selecionados[$i]."")){
             
             
           
             
             
             $res = mysqli_query($conexao, "select * from justificacao where id = ".$selecionados[$i]."");
             
             while ($row = mysqli_fetch_assoc($res)){
                 
                if(mysqli_query($conexao,"update falta set estado ='Justificada' where id =".$row["fk_id_falta"]."" )){
                    
                      echo '<div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Aceite Sucesso!</strong> 
        </div>';
                    
                }
                 
             }
             
             
         } else if($erro<1){
             
             
             
              echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Ocorreu um erro, por favor tente denovo ou contacte o Administrador!</strong> 
        </div>';
         }
         
         
         
         
         
         
         
     }
     }
        
        
            
 
     
        
    

         
         
    
              
              
              
              
              
              
              
              
              
              
              
              
              
           