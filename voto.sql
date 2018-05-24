/*==============================================================*/
/* dbms name:      mysql 5.0                                    */
/* created on:     18/06/2017 20:20:26                          */
/*==============================================================*/


drop table if exists estudiante;

drop table if exists grado;

drop table if exists listados;

drop table if exists listauno;

drop table if exists profesor;

drop table if exists voto;

/*==============================================================*/
/* table: estudiante                                            */
/*==============================================================*/
create table estudiante
(
   cedulaestudiante     char(10) not null,
   idgrado              int,
   nomestudiante        varchar(100),
   primary key (cedulaestudiante)
);

/*==============================================================*/
/* table: grado                                                 */
/*==============================================================*/
create table grado
(
   idgrado              int not null auto_increment,
   cedulaprofesor       int,
   nivel                int,
   paralelo             enum('A','B','C','D'),
   nalumnos             int,
   bod                  varchar(2),
   primary key (idgrado)
);

/*==============================================================*/
/* table: listados                                              */
/*==============================================================*/
create table listados
(
   idlistad             int not null auto_increment,
   nombrelistad         varchar(100),
   presidented          varchar(100),
   vicepresidented      varchar(100),
   secretariod          varchar(100),
   tesorerod            varchar(100),
   pvocald              varchar(100),
   svocald              varchar(100),
   tvocald              varchar(100),
   cvocald              varchar(100),
   qvocald              varchar(100),
   sxvocald             varchar(100),
   jcampd               varchar(100),
   primary key (idlistad)
);

/*==============================================================*/
/* table: listauno                                              */
/*==============================================================*/
create table listauno
(
   idlistau             int not null auto_increment,
   nombrelistau         varchar(100),
   presidenteu          varchar(100),
   vicepresidenteu      varchar(100),
   secretariou          varchar(100),
   tesorerou            varchar(100),
   pvocalu              varchar(100),
   svocalu              varchar(100),
   tvocalu              varchar(100),
   cvocalu              varchar(100),
   qvocalu              varchar(100),
   sxvocalu             varchar(100),
   jcampu               varchar(100),
   primary key (idlistau)
);

/*==============================================================*/
/* table: profesor                                              */
/*==============================================================*/
create table profesor
(
   cedulaprofesor       int not null auto_increment,
   nombreprofesor       varchar(100) not null,
   primary key (cedulaprofesor)
);

/*==============================================================*/
/* table: voto                                                  */
/*==============================================================*/
create table voto
(
   idvoto               int not null auto_increment,
   cedulaestudiante     char(10) unique,
   eleccion             enum('Lista Uno','Lista Dos','Blanco','Nulo'),
   primary key (idvoto)
);

alter table estudiante add constraint fk_reference_1 foreign key (idgrado)
      references grado (idgrado) on delete restrict on update restrict;

alter table grado add constraint fk_reference_5 foreign key (cedulaprofesor)
      references profesor (cedulaprofesor) on delete restrict on update restrict;

alter table voto add constraint fk_reference_2 foreign key (cedulaestudiante)
      references estudiante (cedulaestudiante) on delete restrict on update restrict;

alter table voto add constraint fk_reference_3 foreign key (idlistau)
      references listauno (idlistau) on delete restrict on update restrict;

alter table voto add constraint fk_reference_4 foreign key (idlistad)
      references listados (idlistad) on delete restrict on update restrict;

