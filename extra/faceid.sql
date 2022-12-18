DROP DATABASE IF EXISTS FACEID;
CREATE DATABASE  IF NOT EXISTS  FACEID;

use FACEID;

create table CadastroAluno(
    nome varchar(140) not null,
    rm int(5) not null primary key check (rm > 0 and rm <= 99999 or rm = 1 ),
    email varchar(100) not null unique key,
    curso varchar(50) not null,
    periodo varchar(50) not null,
    status varchar(10) not null default 'Ativo'
);

create table CadastroFuncionario(
    nome varchar(140) not null,
    cpf varchar(14) not null primary key,
    email varchar(100) not null unique key,
    funcao varchar(50) not null,
    telefone varchar(15) not null
);

create table niveisContas(
    id int not null primary key auto_increment,
    nome varchar(20) not null
);

create table  Contas(
    id int not null primary key auto_increment,
    nome varchar(140) not null,
    usuario varchar(140) not null unique key,
    senha varchar(250) not null,
    nivelConta int not null,
    email varchar(150) not null unique key,
    foreign key(nivelconta) references niveisContas(id)
);

create table codigoLink(
    id int not null primary key auto_increment,
    codigo varchar(250),
    data datetime,
    emailCriptografado varchar(250)
);

drop table if exists registro;

create table registro (
    rm int not null,
    entradaSaida datetime not null,
    foreign key(rm) references CadastroAluno(rm)
);

-- Cadstro Para Evitar Erro Quando Nao Há Ninguem Na Camera
-- CADASTROS PARA TESTE -> ACRESCENTEM MAIS
INSERT INTO CadastroAluno (nome, rm, email, curso, periodo) 
VALUES
('', 1, '', '', '');

-- Cadstro Para Evitar Erro Quando Nao Há Ninguem Na Camera
INSERT INTO CadastroFuncionario (nome, cpf, email, funcao, telefone) 
VALUES
('', 1, '', '', '');

insert into niveisContas values
(0, 'Administrador'), 
(0, 'Seguranca'),
(0, 'Secretaria');

--

-- CADASTROS PARA TESTE -> ACRESCENTEM MAIS
INSERT INTO CadastroAluno (nome, rm, email, curso, periodo) 
VALUES
('Arnold Schwarzenegger', 55555, 'Arnold@gmail.com', 'Desenvolvimento de Sistemas', '3º Módulo - Técnico'),
('Marcinho', 21577, 'Marcinho@gmail.com', 'Desenvolvimento de Sistemas', '3º Módulo - Técnico'),
('Wesley Michael', 21808, 'Wesley@gmail.com', 'Desenvolvimento de Sistemas', '3º Módulo - Técnico'),
('Victor Laguna Rodrigues', 21589, 'laguna@gmail.com', 'Desenvolvimento de Sistemas', '3º Módulo - Técnico');

insert into Contas values(0,'admin', 'admin', '$2y$10$hxb5L22B/FJmZyLx.MM8JuJ8v7vXI1GjTMRva3LGgRdu5Ws8DtDo2', 1, 'testandoophpmaile@gmail.com');
insert into Contas values(0,'seg', 'seg', '$2y$10$RgEB/nsG26qfUrDecEfdCudENT1pB0i.DqqgYGRM6jS2dHGsvPLte', 2, 'Email@teste');
insert into Contas values(0,'sec', 'sec', '$2y$10$aJuKpOP8ncGl1n9du8GJneTkhI7Ni35PBkgmLAdXCdCNm8kpt7fgm', 3, 'Email@teste2');

insert into registro values(21808, now());
insert into registro values(21808, DATE_ADD(NOW(), interval +1 HOUR));
insert into registro values(21808, DATE_SUB(NOW(), interval +1 HOUR));
insert into registro values(21589, DATE_SUB(NOW(), interval +3 HOUR));
