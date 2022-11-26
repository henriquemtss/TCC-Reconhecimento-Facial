<?php

include('DAO/CadastroFuncionarioDAO.php');

class CadastroFuncionario     {

    var $nome;
    var $cpf;
    var $email;
    var $telefone;
    var $funcao;
    var $cadastroFuncionarioDAO;

    function __construct($nome, $cpf, $email, $telefone, $funcao)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->funcao = $funcao;
        $this->cadastroFuncionarioDAO = new CadastroFuncionarioDAO();
    }


    function verificarCampos(){

        if (strlen($this->cpf) == 0) {

            $_SESSION['msgCPFFuncionario'] = "prencha o campo CPF!";
           header("Location: ../View/cadastro.php");
            
            }else {

                if (strlen($this->nome) == 0){
                    $_SESSION['msgNomeFuncionario'] = "prencha o campo Nome!";
                    header("Location: ../view/cadastro.php");
    
                }else{
    
                    if (strlen($this->email) == 0){
                    $_SESSION['msgEmailFuncionario'] = "prencha o campo Email!";
                        header("Location: ../View/cadastro.php");
    
                    }else {
    
                        if (strlen($this->telefone) == 0){                        
                            $_SESSION['msgTelefoneFuncionario'] = "prencha o campo Telefone!";
                            header("Location: ../View/cadastro.php");
    
                        }else {
    
                            if (strlen($this->funcao) == 0){
                                $_SESSION['msgFuncaoFuncionario'] = "prencha o campo Função!";
                                header("Location: ../View/cadastro.php");                        
                            
                            }else{

                                if (ValidadorCPF($this->cpf)) {
                                    
                                    return true;
                                        
                                    }else{

                                        $_SESSION['msgCPFFuncionario'] = "CPF invalido!";
                                        header("Location: ../View/cadastro.php");
                                    }
                                }
                                
                                
                            }

                        }
                    }
                }
             }


        // 

        function Cadastrar(){
            $this->cadastroFuncionarioDAO->cadastrar($this->nome, $this->cpf, $this->email, $this->telefone, $this->funcao);
        }

        function verificarEmailECPF(){
            
            if($this->cadastroFuncionarioDAO->verificarEmailECPF($this->email, $this->cpf)){
                return true;
            }
            
        }



// 

}