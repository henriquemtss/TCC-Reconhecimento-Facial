<?php
   
   include('DAO/cadastroAlunoDAO.php');

    class CadastroAluno     {

        var $nome;
        var $rm;
        var $email;
        var $curso;
        var $periodo;
        var $cadastroAlunoDAO;

        function __construct($nome, $rm, $email, $curso, $periodo)
        {
            $this->nome = $nome;
            $this->rm = $rm;
            $this->email = $email;
            $this->curso = $curso;
            $this->periodo = $periodo;
            $this->cadastroAlunoDAO = new CadastroAlunoDAO();
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
            $this->cadastroAlunoDAO->Cadastrar($this->rm, $this->nome, $this->email, $this->curso, $this->periodo);
        }

        function verificarRMeEmail(){
            
            if ($this->cadastroAlunoDAO->verificarRMeEmail($this->rm, $this->email)) {
                return true;
            }
            
            
        }

    }
    