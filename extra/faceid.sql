DROP DATABASE IF EXISTS FACEID;
CREATE DATABASE  IF NOT EXISTS  FACEID;

use FACEID;

create table niveisContas(
    id int not null primary key auto_increment,
    nome varchar(20) not null
);

create table  Contas(
    id int not null primary key auto_increment,
    nome varchar(140) not null,
    usuario varchar(140) not null,
    senha varchar(160) not null,
    nivelConta int not null,
    foreign key(nivelconta) references niveisContas(id)
);


create table CadastroAluno(
    nome varchar(140) not null,
    rm int(5) not null primary key check (rm > 0 and rm <= 99999 ),
    email varchar(100) not null unique key,
    curso varchar(7) not null,
    periodo varchar(10) not null
);

create table CadastroFuncionario(
    nome varchar(140) not null,
    cpf varchar(14) not null primary key,
    email varchar(100) not null unique key,
    funcao varchar(7) not null,
    telefone varchar(15) not null
);

create table registro (
    rm int not null,
    entradaSaida datetime not null,
    foreign key(rm) references CadastroAluno(rm)
);



insert into niveisContas values
(0, 'Administrador'), 
(0, 'Seguranca'),
(0, 'Secretaria');
-- (0, 'aluno');

insert into Contas values(0,'admin', 'admin', '$2y$10$hxb5L22B/FJmZyLx.MM8JuJ8v7vXI1GjTMRva3LGgRdu5Ws8DtDo2', 1);

insert into cadastroaluno values('wes', 12345, 'wes@wes', 'nut', 'pr-modulo');

insert into registro values(12345, now());
insert into registro values(12345, DATE_ADD(NOW(), interval +1 HOUR));
insert into registro values(12345, DATE_SUB(NOW(), interval +1 HOUR));


-- select cadastroaluno.nome, cadastroaluno.rm, cadastroaluno.curso, cadastroaluno.periodo, registro.entradaSaida 
-- from CadastroAluno inner join registro on cadastroaluno.rm = registro.rm
-- order by registro.entradaSaida Desc;
