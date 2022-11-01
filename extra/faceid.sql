DROP DATABASE IF EXISTS FACEID;
CREATE DATABASE  IF NOT EXISTS  FACEID;

use FACEID;


-- inserir nivel hierarquico
create table  Contas(
    id int not null primary key auto_increment,
    nome varchar(140) not null,
    usuario varchar(140) not null,
    senha varchar(160) not null
);

insert into Contas values(0,'admin', 'admin', '$2y$10$hxb5L22B/FJmZyLx.MM8JuJ8v7vXI1GjTMRva3LGgRdu5Ws8DtDo2');

create table CadastroAlunos(
    nome varchar(140) not null,
    rm int(5) not null primary key check (rm > 0 and rm <= 99999 ),
    email varchar(100) not null unique key,
    curso varchar(7) not null,
    periodo varchar(10) not null
);

create table CadastroFuncionarios(
    nome varchar(140) not null,
    CPF varchar(14) not null primary key,
    email varchar(100) not null unique key,
    funcao varchar(7) not null,
    telefone varchar(15) not null
);