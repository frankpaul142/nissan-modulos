/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     09/12/2013 10:56:07                          */
/*==============================================================*/


drop table if exists client;

drop table if exists concessioner;

drop table if exists phone;

drop table if exists service;

drop table if exists type;

drop table if exists vehicule;

/*==============================================================*/
/* Table: client                                                */
/*==============================================================*/
create table client
(
   id                   int not null,
   vehicule_id          int,
   identity             varchar(10) not null,
   name                 varchar(100) not null,
   lastname             varchar(100) not null,
   email                varchar(255) not null,
   phone                varchar(9) not null,
   cellphone            varchar(10) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: concessioner                                          */
/*==============================================================*/
create table concessioner
(
   id                   int not null auto_increment,
   city_id              int not null,
   name                 varchar(255),
   address              varchar(255),
   technical_contact    varchar(255),
   phone                varchar(20),
   primary key (id)
);

/*==============================================================*/
/* Table: phone                                                 */
/*==============================================================*/
create table phone
(
   id                   int not null auto_increment,
   service_id           int,
   number               varchar(20) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: service                                               */
/*==============================================================*/
create table service
(
   id                   int not null auto_increment,
   concessioner_id      int,
   type_id              int,
   mail                 varchar(255) not null,
   schedule             varchar(255) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: type                                                  */
/*==============================================================*/
create table type
(
   id                   int not null auto_increment,
   description          varchar(255) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: vehicule                                              */
/*==============================================================*/
create table vehicule
(
   id                   int not null,
   client_id            int,
   model                varchar(100) not null,
   year                 varchar(4) not null,
   license_plate_____   varchar(7) not null,
   kilometer            numeric(8,0) not null,
   primary key (id)
);

alter table client add constraint fk_un_cliente_tiene_un_vehiculo foreign key (vehicule_id)
      references vehicule (id) on delete restrict on update restrict;

alter table phone add constraint fk_muchos_telefonos foreign key (service_id)
      references service (id) on delete restrict on update restrict;

alter table service add constraint fk_muchos_servicios foreign key (concessioner_id)
      references concessioner (id) on delete restrict on update restrict;

alter table service add constraint fk_muchos_servicios foreign key (type_id)
      references type (id) on delete restrict on update restrict;

alter table vehicule add constraint fk_un_cliente_tiene_un_vehiculo foreign key (client_id)
      references client (id) on delete restrict on update restrict;

