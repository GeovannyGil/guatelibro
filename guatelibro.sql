create database if not exists guatelibro;
use guatelibro;
create table members(
  id_member int primary key auto_increment,
  name_member varchar(30),
  surname_member varchar(30),
  email varchar(150),
  phone int(8),
  direction varchar(75),
  photo text DEFAULT 'default.jpeg',
  institution varchar(50),
  state boolean DEFAULT 1,
  user_member varchar(50),
  password varchar(50),
  id_rol int DEFAULT 4
);
create table product(
  id_product int primary key auto_increment,
  name_product varchar(30),
  description_product TEXT,
  path_product TEXT,
  image_product TEXT,
  date_register date,
  id_category int,
  id_member int
);
create table category(
  id_category int primary key auto_increment,
  category varchar(50)
);

INSERT INTO
  category (category)
VALUES
  ("Libros");
  
INSERT INTO
  category (category)
VALUES
  ("Revistas");
  
INSERT INTO
  category (category)
VALUES
  ("Articulo");
  
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
INSERT INTO
  rol (rol, permits)
VALUES
  (
    "Administrador",
    '["categorias","rol","productos","miembros","libreria_personal","membresias","suscripciones","pagos","client"]'
  );
INSERT INTO
  rol (rol, permits)
VALUES
  ("Alumno", '["client"]');
INSERT INTO
  rol (rol, permits)
VALUES
  ("Profesor", '["client"]');
INSERT INTO
  rol (rol, permits)
VALUES
  ("Particular", '["client"]');
INSERT INTO
  members(name_member, email, password, id_rol)
VALUES
  ('Admin', "admin@guatelibro.com", "admin", 1);
create table membership(
    id_membership int primary key auto_increment,
    type_membership varchar(30),
    price decimal(12, 2),
    date_months int(11)
  );
INSERT INTO
  membership (type_membership, price, date_months)
VALUES
  ("Mensual", 80.00, 1);
INSERT INTO
  membership (type_membership, price, date_months)
VALUES
  ("Anual", 850.00, 12);
INSERT INTO
  membership (type_membership, price, date_months)
VALUES
  ("Semestral", 400.00, 6);
create table suscriptions(
    id_suscription int primary key auto_increment,
    id_payments int,
    subscription_start DATE,
    subscription_end DATE,
    date_cancel DATE NULL,
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
  
DELIMITER // 
CREATE TRIGGER add_suscription
AFTER
INSERT
  ON payments FOR EACH ROW BEGIN
INSERT INTO
  suscriptions(
    id_payments,
    subscription_start,
    subscription_end,
    state
  )
VALUES
  (
    new.id_payments,
    new.created_at,
    DATE(
      DATE_ADD(
        new.created_at,
        INTERVAL (
          select
            date_months
          from
            membership
          where
            id_membership = new.id_membership
        ) MONTH
      )
    ),
    true
  );
END //
DELIMITER //