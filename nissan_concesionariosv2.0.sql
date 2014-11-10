/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     10/12/2013 10:58:36                          */
/*==============================================================*/


drop table if exists client;

drop table if exists concessioner;

drop table if exists phone;

drop table if exists service;

drop table if exists technical_date;

drop table if exists type;

drop table if exists vehicule;

/*==============================================================*/
/* Table: client                                                */
/*==============================================================*/
create table client
(
   id                   int not null,
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


/*==============================================================*/
/* Table: phone                                                 */
/*==============================================================*/


/*==============================================================*/
/* Table: service                                               */
/*==============================================================*/


/*==============================================================*/
/* Table: technical_date                                        */
/*==============================================================*/
create table technical_date
(
   id                   int not null,
   client_id            int not null,
   vehicule_id          int not null,
   concessioner_id      int,
   creation_date        timestamp not null,
   work                 text not null,
   preference_date      date not null,
   hour                 varchar(10) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: type                                                  */
/*==============================================================*/


/*==============================================================*/
/* Table: vehicule                                              */
/*==============================================================*/
create table vehicule
(
   id                   int not null,
   model                varchar(100) not null,
   year                 varchar(4) not null,
   license_plate_____   varchar(7) not null,
   kilometer            numeric(8,0) not null,
   primary key (id)
);







alter table technical_date add constraint fk_un_cliente foreign key (client_id)
      references client (id) on delete restrict on update restrict;

alter table technical_date add constraint fk_un_concesionario foreign key (concessioner_id)
      references concessioner (id) on delete restrict on update restrict;

alter table technical_date add constraint fk_un_vehiculo foreign key (vehicule_id)
      references vehicule (id) on delete restrict on update restrict;

