<?php
   
   include('DAO/conexao.php');

    class Cadastro     {

        var $nome;
        var $rm;
        var $email;
        var $curso;
        var $periodo;

        function __construct($nome, $rm, $email, $curso, $periodo)
        {
            $this->nome = $nome;
            $this->rm = $rm;
            $this->email = $email;
            $this->curso = $curso;
            $this->periodo = $periodo;
        }


       function verificarCampos(){

        if (strlen($this->rm) == 0) {

            $_SESSION['msgRM'] = "prencha o campo RM!";
           header("Location: ../View/cadastro.php");

          
           } else {
            
                if (intval($this->rm) < 0 || intval($_GET['rm']) > 99999 ) {
            
                $_SESSION['msgRM'] = "RM invalido!";
                header("Location: ../View/cadastro.php");
             }else {

                if (strlen($this->nome) == 0){
                    $_SESSION['msgNome'] = "prencha o campo Nome!";
                    header("Location: ../view/cadastro.php");
    
                }else{
    
                    if (strlen($this->email) == 0){
                    $_SESSION['msgEmail'] = "prencha o campo Email!";
                        header("Location: ../View/cadastro.php");
    
                    }else {
    
                        if (strlen($this->curso) == 0){                        
                            $_SESSION['msgCurso'] = "prencha o campo Curso!";
                            header("Location: ../View/cadastro.php");
    
                        }else {
    
                            if (strlen($this->periodo) == 0){
                                $_SESSION['msgPeriodo'] = "prencha o campo Período!";
                                header("Location: ../View/cadastro.php");                        
                            
                            }else{
                                //verificação de campos concluida
                                $bool = true;
                                return $bool;
                            }

                        }
                    }
                }
             }
        }
    }




        function Cadastrar(){
            
            $pdo = conectar();

            try {
                                    
                $sql = "Insert into Cadastro(rm, nome, email, curso, periodo) values (:rm, :nome, :email, :curso, :periodo);";
                $res = $pdo->prepare($sql);
                $res->bindValue(':rm',$this->rm);
                $res->bindValue(':nome', $this->nome);
                $res->bindValue(':email', $this->email);
                $res->bindValue(':curso', $this->curso);
                $res->bindValue(':periodo', $this->periodo);
                $res->execute();
                $_SESSION['msgCadastro'] = "Cadastro concluido!";
                header("Location: ../view/cadastro.php");


            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        }

    }
    