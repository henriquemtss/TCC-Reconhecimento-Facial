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
    email varchar(150) not null unique key,
    foreign key(nivelconta) references niveisContas(id)
);


create table CadastroAluno(
    nome varchar(140) not null,
    rm int(5) not null primary key check (rm > 0 and rm <= 99999 ),
    email varchar(100) not null unique key,
    curso varchar(7) not null,
    periodo varchar(10) not null,
    status varchar(10) not null default 'Ativo'
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

create table codigoLink(
    id int not null primary key auto_increment,
    codigo varchar(250),
    data datetime,
    emailCriptografado varchar(250)
);



insert into niveisContas values
(0, 'Administrador'), 
(0, 'Seguranca'),
(0, 'Secretaria');
-- (0, 'aluno');

insert into Contas values(0,'admin', 'admin', '$2y$10$hxb5L22B/FJmZyLx.MM8JuJ8v7vXI1GjTMRva3LGgRdu5Ws8DtDo2', 1, 'testandoophpmaile@gmail.com');
insert into Contas values(0,'seg', 'seg', '$2y$10$vsxlxcWN3TzqQXvfRvkgHuCKFiEam2pxtVfx4RWkFUPhOOXthId1u', 2, 'Email@teste');
insert into Contas values(0,'sec', 'sec', '$2y$10$wPsVn9xYdkpYlztGS8Dmc.Irfm6HdjE23MjziUxAioJnH/6ds2poy', 3, 'Email@teste2');

insert into cadastroaluno values('wes', 12345, 'wes@wes', 'nut', 'pr-modulo', default);
insert into cadastroaluno values('Victor Laguna Rodrigues', 21589, 'laguna.vitorc@gmail.com', 'ds', 'seg-modulo', default);

insert into registro values(12345, now());
insert into registro values(12345, DATE_ADD(NOW(), interval +1 HOUR));
insert into registro values(12345, DATE_SUB(NOW(), interval +1 HOUR));
insert into registro values(21589, DATE_SUB(NOW(), interval +3 HOUR));
