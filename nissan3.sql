/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     11/11/2014 16:32:42                          */
/*==============================================================*/


drop table if exists catalog;

drop table if exists category;

drop table if exists characteristic;

drop table if exists city;

drop table if exists client;

drop table if exists client_catalog;

drop table if exists color;

drop table if exists concessioner;

drop table if exists email;

drop table if exists phone;

drop table if exists picture;

drop table if exists quotation;

drop table if exists replacement;

drop table if exists review;

drop table if exists service;

drop table if exists technical_date;

drop table if exists type;

drop table if exists vehicle;

drop table if exists vehicle_client;

drop table if exists vehicle_version;

/*==============================================================*/
/* Table: catalog                                               */
/*==============================================================*/
create table catalog
(
   id                   int not null auto_increment,
   vehicle_id           int,
   file                 varchar(100) not null,
   status               enum('ACTIVE','INACTIVE') not null,
   description          varchar(150) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: category                                              */
/*==============================================================*/
create table category
(
   id                   int not null auto_increment,
   name                 varchar(30) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: characteristic                                        */
/*==============================================================*/
create table characteristic
(
   id                   int not null auto_increment,
   vehicle_id           int not null,
   category_id          int not null,
   title                varchar(30) not null,
   description          varchar(50) not null,
   status               enum('ACTIVE','INACTIVE') not null,
   primary key (id)
);

/*==============================================================*/
/* Table: city                                                  */
/*==============================================================*/
create table city
(
   id                   int not null,
   name                 varchar(255) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: client                                                */
/*==============================================================*/
create table client
(
   id                   int not null auto_increment,
   identity             varchar(10) not null,
   name                 varchar(100) not null,
   lastname             varchar(100) not null,
   email                varchar(255) not null,
   phone                varchar(9) not null,
   cellphone            varchar(10) not null,
   preference_contact   text not null,
   primary key (id)
);

/*==============================================================*/
/* Table: client_catalog                                        */
/*==============================================================*/
create table client_catalog
(
   client_id            int not null,
   catalog_id           int not null,
   date                 datetime not null,
   primary key (client_id, catalog_id)
);

/*==============================================================*/
/* Table: color                                                 */
/*==============================================================*/
create table color
(
   id                   int not null auto_increment,
   vehicle_id           int not null,
   picture_id           int,
   name                 varchar(20) not null,
   rgb                  varchar(7),
   primary key (id)
);

/*==============================================================*/
/* Table: concessioner                                          */
/*==============================================================*/
create table concessioner
(
   id                   int not null auto_increment,
   city_id              int,
   name                 varchar(255),
   address              varchar(255),
   technical_contact    varchar(255),
   phone                varchar(255),
   primary key (id)
);

/*==============================================================*/
/* Table: email                                                 */
/*==============================================================*/
create table email
(
   id                   int not null auto_increment,
   concessioner_id      int,
   type                 enum('TECHNICAL_DATE','QUOTATION') not null,
   description          varchar(255) not null,
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
/* Table: picture                                               */
/*==============================================================*/
create table picture
(
   id                   int not null auto_increment,
   vehicle_id           int,
   description          varchar(255) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: quotation                                             */
/*==============================================================*/
create table quotation
(
   id                   int not null auto_increment,
   concessioner_id      int,
   client_id            int not null,
   vehicle_version_id2  int,
   vehicle_version_id   int not null,
   time                 varchar(128) not null,
   registation_date     timestamp not null,
   review               enum('YES','NO') not null,
   primary key (id)
);

/*==============================================================*/
/* Table: replacement                                           */
/*==============================================================*/
create table replacement
(
   id                   int not null,
   concessioner_id      int not null,
   client_id            int not null,
   vehicle_id           int not null,
   part                 varchar(255) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: review                                                */
/*==============================================================*/
create table review
(
   id                   int not null,
   quotation_id         int,
   contact              enum('YES','NO') not null,
   score                varchar(2) not null,
   reason               text,
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
/* Table: technical_date                                        */
/*==============================================================*/
create table technical_date
(
   id                   int not null auto_increment,
   client_id            int not null,
   vehicle_id           int not null,
   concessioner_id      int,
   creation_date        timestamp not null,
   work                 text not null,
   preference_date      date not null,
   hour                 varchar(10) not null,
   taxi                 enum('YES','NO') not null,
   primary key (id)
);

/*==============================================================*/
/* Table: type                                                  */
/*==============================================================*/
create table type
(
   id                   int not null auto_increment,
   description          varchar(255) not null,
   icon                 varchar(255) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: vehicle                                               */
/*==============================================================*/
create table vehicle
(
   id                   int not null auto_increment,
   name                 varchar(255) not null,
   status               enum('ACTIVE','INACTIVE') not null,
   shortname            varchar(10),
   primary key (id)
);

/*==============================================================*/
/* Table: vehicle_client                                        */
/*==============================================================*/
create table vehicle_client
(
   id                   int not null auto_increment,
   model                varchar(100) not null,
   year                 varchar(4) not null,
   license_plate        varchar(7) not null,
   kilometer            numeric(8,0) not null,
   chasis               varchar(12),
   primary key (id)
);

/*==============================================================*/
/* Table: vehicle_version                                       */
/*==============================================================*/
create table vehicle_version
(
   id                   int not null auto_increment,
   vehicle_id           int,
   status               enum('ACTIVE','INACTIVE') not null,
   reference            varchar(255) not null,
   motor                varchar(255) not null,
   type                 varchar(255) not null,
   transmission         varchar(255) not null,
   combustion           varchar(20) not null,
   ac                   enum('YES','NO') not null,
   airbag               enum('0','1','2','3','4','5','6') not null,
   abs                  enum('YES','NO') not null,
   others               text not null,
   normal_price         float not null,
   final_price          float not null,
   accesories_price     float not null,
   primary key (id)
);

alter table catalog add constraint fk_catalogo foreign key (vehicle_id)
      references vehicle (id) on delete restrict on update restrict;

alter table characteristic add constraint fk_carcteristicas foreign key (vehicle_id)
      references vehicle_version (id) on delete restrict on update restrict;

alter table characteristic add constraint fk_categoria foreign key (category_id)
      references category (id) on delete restrict on update restrict;

alter table client_catalog add constraint fk_client_catalog foreign key (catalog_id)
      references catalog (id) on delete restrict on update restrict;

alter table client_catalog add constraint fk_client_catalog foreign key (client_id)
      references client (id) on delete restrict on update restrict;

alter table color add constraint fk_imagen_color foreign key (picture_id)
      references picture (id) on delete restrict on update restrict;

alter table color add constraint fk_relationship_21 foreign key (vehicle_id)
      references vehicle (id) on delete restrict on update restrict;

alter table concessioner add constraint fk_muchos_concesionarios foreign key (city_id)
      references city (id) on delete restrict on update restrict;

alter table email add constraint fk_concesionario_emails foreign key (concessioner_id)
      references concessioner (id) on delete restrict on update restrict;

alter table phone add constraint fk_muchos_telefonos foreign key (service_id)
      references service (id) on delete restrict on update restrict;

alter table picture add constraint fk_muchas_imagenes foreign key (vehicle_id)
      references vehicle (id) on delete restrict on update restrict;

alter table quotation add constraint fk_segundo_vehiculo_2 foreign key (vehicle_version_id2)
      references vehicle_version (id) on delete restrict on update restrict;

alter table quotation add constraint fk_un_cliente_2 foreign key (client_id)
      references client (id) on delete restrict on update restrict;

alter table quotation add constraint fk_un_concesionario foreign key (concessioner_id)
      references concessioner (id) on delete restrict on update restrict;

alter table quotation add constraint fk_un_vehiculo_2 foreign key (vehicle_version_id)
      references vehicle_version (id) on delete restrict on update restrict;

alter table replacement add constraint fk_client_replacement foreign key (client_id)
      references client (id) on delete restrict on update restrict;

alter table replacement add constraint fk_concessioner_replacement foreign key (concessioner_id)
      references concessioner (id) on delete restrict on update restrict;

alter table replacement add constraint fk_vehicle_replacement foreign key (vehicle_id)
      references vehicle_client (id) on delete restrict on update restrict;

alter table review add constraint fk_quotation_review foreign key (quotation_id)
      references quotation (id) on delete restrict on update restrict;

alter table service add constraint fk_muchos_servicios foreign key (concessioner_id)
      references concessioner (id) on delete restrict on update restrict;

alter table service add constraint fk_muchos_servicios foreign key (type_id)
      references type (id) on delete restrict on update restrict;

alter table technical_date add constraint fk_un_cliente foreign key (client_id)
      references client (id) on delete restrict on update restrict;

alter table technical_date add constraint fk_un_concesionario foreign key (concessioner_id)
      references concessioner (id) on delete restrict on update restrict;

alter table technical_date add constraint fk_un_vehiculo foreign key (vehicle_id)
      references vehicle_client (id) on delete restrict on update restrict;

alter table vehicle_version add constraint fk_muchas_versiones foreign key (vehicle_id)
      references vehicle (id) on delete restrict on update restrict;

