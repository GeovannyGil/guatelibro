create database if not exists guatelibro;
use guatelibro;
create table members(
  id_member int primary key auto_increment,
  name_member varchar(30),
  surname_member varchar(30),
  email varchar(30),
  phone int(8),
  direction varchar(75),
  photo varchar(75),
  institution varchar(50),
  state boolean,
  user_member varchar(50),
  password varchar(50),
  id_rol int
);
create table product(
  id_product int primary key auto_increment,
  name_product varchar(30),
  description_product varchar(100),
  path_product varchar(50),
  image_product varchar(75),
  date_register date,
  id_category int,
  id_member int
);
create table category(
  id_category int primary key auto_increment,
  category varchar(50)
);
create table library_user(
  id_user int primary key auto_increment,
  id_member int,
  id_product int
);
create table rol(
  id_rol int primary key auto_increment,
  rol varchar(50),
  permits json
);
create table membership(
  id_membership int primary key auto_increment,
  type_membership varchar(30),
  price decimal(12, 2),
  date_months int(11)
);
create table suscriptions(
  id_suscription int primary key auto_increment,
  id_payments int,
  subscription_start dateTime,
  subscription_end dateTime,
  date_cancel dateTime,
  state boolean,
  created_at timestamp
);
create table payments(
  id_payments int primary key auto_increment,
  id_member int,
  id_membership int,
  payment_type varchar(100),
  payment decimal(12, 2),
  created_at timestamp
);
alter table
  members
ADD
  foreign key (id_rol) references rol(id_rol);
alter table
  library_user
ADD
  foreign key (id_member) references members(id_member);
alter table
  library_user
ADD
  foreign key (id_product) references product(id_product);
alter table
  product
ADD
  foreign key (id_member) references members(id_member);
alter table
  product
ADD
  foreign key (id_category) references category(id_category);
alter table
  suscriptions
ADD
  foreign key (id_payments) references payments(id_payments);
alter table
  payments
ADD
  foreign key (id_member) references members(id_member);
alter table
  payments
ADD
  foreign key (id_membership) references membership(id_membership);