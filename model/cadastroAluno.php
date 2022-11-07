<?php
   
   include('DAO/conexao.php');

    class CadastroAluno     {

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

            $_SESSION['msgRMAluno'] = "prencha o campo RM!";
           header("Location: ../View/cadastro.php");

          
           } else {
            
                if (intval($this->rm) < 0 || intval($this->rm) > 99999 ) {
            
                $_SESSION['msgRMAluno'] = "RM invalido!";
                header("Location: ../View/cadastro.php");
             }else {

                if (strlen($this->nome) == 0){
                    $_SESSION['msgNomeAluno'] = "prencha o campo Nome!";
                    header("Location: ../view/cadastro.php");
    
                }else{
    
                    if (strlen($this->email) == 0){
                    $_SESSION['msgEmailAluno'] = "prencha o campo Email!";
                        header("Location: ../View/cadastro.php");
    
                    }else {
    
                        if (strlen($this->curso) == 0){                        
                            $_SESSION['msgCursoAluno'] = "prencha o campo Curso!";
                            header("Location: ../View/cadastro.php");
    
                        }else {
    
                            if (strlen($this->periodo) == 0){
                                $_SESSION['msgPeriodoAluno'] = "prencha o campo Período!";
                                header("Location: ../View/cadastro.php");                        
                            
                            }else{
                                //verificação de campos concluida
                                return true;
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
                                    
                $sql = "Insert into CadastroAluno (rm, nome, email, curso, periodo) values (:rm, :nome, :email, :curso, :periodo);";
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

        function verificarRMeEmail(){
            $pdo = conectar();

            $sql = "select * from CadastroAluno where email = :email or rm = :rm limit 1;";
            $res = $pdo->prepare($sql);
            $res->bindValue(':email', $this->email);
            $res->bindValue(':rm', $this->rm);
            $res->execute();

            $cadastroExistente = $res->fetch(PDO::FETCH_ASSOC);

            if (!is_null($cadastroExistente['email'])) {
                $_SESSION['msgEmail'] = "Email ja utilizado!";
                header("Location: ../View/cadastro.php");  
            }
            if (!is_null($cadastroExistente['rm'])) {
                $_SESSION['msgRM'] = "RM ja utilizado!";
                header("Location: ../View/cadastro.php");  
            }

            return true;
        }

    }
    