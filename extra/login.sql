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