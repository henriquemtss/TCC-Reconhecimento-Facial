<?php

include('DAO/conexao.php');

class CadastroFuncionario     {

    var $nome;
    var $cpf;
    var $email;
    var $telefone;
    var $funcao;

    function __construct($nome, $cpf, $email, $telefone, $funcao)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->funcao = $funcao;
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
                                //verificação de campos concluida
                                return true;
                            }

                        }
                    }
                }
             }
        }


        // 

        function Cadastrar(){
            
            $pdo = conectar();

            try {
                                    
                $sql = "Insert into CadastroFuncionario (nome, cpf, email, telefone, funcao) values (:nome, :cpf, :email, :telefone, :funcao);";
                $res = $pdo->prepare($sql);
                $res->bindValue(':nome',$this->nome);
                $res->bindValue(':cpf', $this->cpf);
                $res->bindValue(':email', $this->email);
                $res->bindValue(':telefone', $this->telefone);
                $res->bindValue(':funcao', $this->funcao);
                $res->execute();
                $_SESSION['msgCadastro'] = "Cadastro concluido!";
                header("Location: ../view/cadastro.php");


            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        }

        function verificarRMeEmail(){
            $pdo = conectar();

            $sql = "select * from CadastroFuncionario where cpf = :cpf or email = :email limit 1;";
            $res = $pdo->prepare($sql);
            $res->bindValue(':email', $this->email);
            $res->bindValue(':cpf', $this->cpf);
            $res->execute();

            $cadastroExistente = $res->fetch(PDO::FETCH_ASSOC);

            if (!is_null($cadastroExistente['email'])) {
                $_SESSION['msgEmail'] = "Email ja utilizado!";
                header("Location: ../View/cadastro.php");  
            }
            if (!is_null($cadastroExistente['cpf'])) {
                $_SESSION['msgRM'] = "CPF ja utilizado!";
                header("Location: ../View/cadastro.php");  
            }

            return true;
        }



// 
}