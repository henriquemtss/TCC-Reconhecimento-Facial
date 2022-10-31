<?php
    session_start();

    
    include('DAO/conexao.php');
    
    $pdo = conectar();

    

    $formulario = [
        "nome" => $_GET['nome'],
        "rm" => intval($_GET['rm']),
        "email" => $_GET['email'],
        "curso" => $_GET['curso'],
        "periodo" => $_GET['periodo']];

    $_SESSION['rm'] = $_GET['rm'];
    $_SESSION['nome'] = $_GET['nome'];
    $_SESSION['email'] = $_GET['email'];
    $_SESSION['curso'] = $_GET['curso'];
    $_SESSION['periodo'] = $_GET['periodo'];



        if (strlen($_GET['rm']) == 0) {

            $_SESSION['msgRM'] = "prencha o campo RM!";
           header("Location: ../View/cadastro.php");

          
           } else {
            
                if (intval($_GET['rm']) < 0 || intval($_GET['rm']) > 99999 ) {
            
                $_SESSION['msgRM'] = "RM invalido!";
                header("Location: ../View/cadastro.php");
             }else {

                if (strlen($_GET['nome']) == 0){
                    $_SESSION['msgNome'] = "prencha o campo Nome!";
                    header("Location: ../view/cadastro.php");
    
                }else{
    
                    if (strlen($_GET['email']) == 0){
                    $_SESSION['msgEmail'] = "prencha o campo Email!";
                        header("Location: ../View/cadastro.php");
    
                    }else {
    
                        if (strlen($_GET['curso']) == 0){                        
                            $_SESSION['msgCurso'] = "prencha o campo Curso!";
                            header("Location: ../View/cadastro.php");
    
                        }else {
    
                            if (strlen($_GET['periodo']) == 0){
                                $_SESSION['msgPeriodo'] = "prencha o campo Período!";
                                header("Location: ../View/cadastro.php");                        
                            
                            }else{
                                //verificação de campos concluida
    
                                try {
                                    
                                    $sql = "Insert into Cadastro(rm, nome, email, curso, periodo) values (:rm, :nome, :email, :curso, :periodo);";
                                    $res = $pdo->prepare($sql);
                                    $res->bindValue(':rm',$formulario['rm']);
                                    $res->bindValue(':nome', $formulario['nome']);
                                    $res->bindValue(':email', $formulario['email']);
                                    $res->bindValue(':curso', $formulario['curso']);
                                    $res->bindValue(':periodo', $formulario['periodo']);
                                    $res->execute();
                                    $_SESSION['msg'] = "Cadastro concluido!";
                                    header("Location: ../view/cadastro.php");
    
    
                                } catch (\Throwable $th) {
                                    echo $th->getMessage();
                                }
                            }
                        }
                    }
    
                }
            }
           

        } 





        

        


?>
