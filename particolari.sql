drop database particolari;
CREATE DATABASE PARTICOLARI;
USE PARTICOLARI;

CREATE TABLE users(
    id integer primary key AUTO_INCREMENT,
    username varchar(255),
	email varchar(255),
    pwd varchar(255),
    nome varchar(255),
    cognome varchar(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

create table products(
    id integer primary key AUTO_INCREMENT,
    descrizione varchar(255),
    marca varchar(20),
    prezzo float not null,
    image varchar(255),
    num_recensioni integer,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
  	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   );

create table available_products(
    id integer primary key AUTO_INCREMENT,
    codice integer,
    misura varchar(10),
    quantita integer,
    unique(codice,misura),
    FOREIGN key (codice) REFERENCES products(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

   create table carts(
       id integer primary key AUTO_INCREMENT,
       user integer,
       codice integer,
       descrizione varchar(255),
       marca varchar(20),
       prezzo float not null,
       image varchar(255),
       misura varchar(10),
       quantita integer,
       unique(user,codice,misura),
       FOREIGN key (codice) REFERENCES products(id),
       FOREIGN key (user) REFERENCES users(id),
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
       updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   );

create table orders(
    id integer primary key AUTO_INCREMENT,
    user integer,
    num_spedizione integer,
    indirizzo varchar(255),
    costo float,
    FOREIGN key (user) REFERENCES users(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

  create table purchased_products (
      order_id integer,
      product_id integer,
      misura varchar(20),
      quantita integer,
      costo float,
      PRIMARY key(order_id,product_id),
      FOREIGN key (order_id) REFERENCES orders(id),
      FOREIGN key(product_id) REFERENCES products(id),
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
      updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      );

    create table reviews(
    id integer primary key AUTO_INCREMENT,    
    ordine integer,
    articolo integer,
    user integer,
    recensione varchar(255),
    unique(ordine,articolo,user),
    FOREIGN key(ordine) REFERENCES orders(id),
    FOREIGN key (articolo) REFERENCES products(id),
    FOREIGN key (user) REFERENCES users(id) , 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

DELIMITER //
CREATE TRIGGER AGGIORNA_RECENSIONI 
after INSERT ON reviews
FOR EACH ROW 
BEGIN
 UPDATE products
 SET num_recensioni=num_recensioni+1 
 WHERE id=new.articolo; 
END//
DELIMITER ;

DELIMITER //
CREATE TRIGGER ELIMINA_RECENSIONI 
after DELETE ON reviews 
FOR EACH ROW 
BEGIN
 UPDATE products
 SET num_recensioni=num_recensioni-1 
 WHERE id= old.articolo;
END//

DELIMITER //
CREATE TRIGGER AGGIORNA_DISPONIBILITA
after INSERT ON purchased_products
FOR EACH ROW 
BEGIN
    IF EXISTS (SELECT * FROM available_products where available_products.codice=new.product_id and available_products.misura=new.misura and available_products.quantita>0)
    THEN
        UPDATE available_products
        SET quantita=quantita-NEW.quantita
        WHERE codice= new.product_id and available_products.misura=new.misura;
    END IF;
    IF EXISTS(SELECT * FROM available_products where available_products.codice=new.product_id and available_products.misura=new.misura and available_products.quantita=0)
    THEN
        DELETE FROM available_products
        WHERE codice= new.product_id and available_products.misura=new.misura;
    END IF;
END//

DELIMITER //
CREATE TRIGGER UPDATE_CARRELLO
BEFORE UPDATE ON carts
FOR EACH ROW 
BEGIN
    IF EXISTS (SELECT * FROM available_products where available_products.codice=new.codice and available_products.misura=new.misura and available_products.quantita<NEW.quantita)
    THEN
        SIGNAL SQLSTATE '45000' set MESSAGE_TEXT= 'Quantità non disponibile!';
    END IF;
END//

CREATE TRIGGER INSERT_CARRELLO
BEFORE INSERT ON carts
FOR EACH ROW 
BEGIN
    IF EXISTS (SELECT * FROM available_products where available_products.codice=new.codice and available_products.misura=new.misura and available_products.quantita<NEW.quantita)
    THEN
        SIGNAL SQLSTATE '45000' set MESSAGE_TEXT= 'Quantità non disponibile!';
    END IF;
END//

DELIMITER ;      
    INSERT INTO users(username,email,pwd,nome,cognome) values ("hello01","hello01@gmail.com","1234","Mario","Rossi");
    INSERT INTO users(username,email,pwd,nome,cognome) values ("peach","peach@gmail.com","0987","Bianca","Verdi");
    INSERT INTO users(username,email,pwd,nome,cognome) values ("mario","mario01@gmail.com","6543","Luca","Bianchi");

    insert into products(descrizione,marca,prezzo,image,num_recensioni) values("Abito neonata","IDo","49.90","css/immagini/0_1.jpg",0);
    insert into products(descrizione,marca,prezzo,image,num_recensioni) values("Bermuda bimbo","IDo","29.90","css/immagini/bermuda.png",0);
    insert into products(descrizione,marca,prezzo,image,num_recensioni) values("Tuta neonato","IDo","39.90","css/immagini/tuta_neonato.png",0);
    insert into products(descrizione,marca,prezzo,image,num_recensioni) values("Abito ragazza","IDo","59.90","css/immagini/abito_ragazza.png",0);
    insert into products(descrizione,marca,prezzo,image,num_recensioni) values("Tuta bimba","IDo","25.90","css/immagini/tuta_bimba.png",0);

    insert into available_products(codice,misura,quantita) values("1","9 mesi",1);  
    insert into available_products(codice,misura,quantita) values("1","12 mesi",1);
    insert into available_products(codice,misura,quantita) values("1","18 mesi",1);
    insert into available_products(codice,misura,quantita) values("1","24 mesi",1);
    insert into available_products(codice,misura,quantita) values("2","9 mesi",1);
    insert into available_products(codice,misura,quantita) values("2","12 mesi",1);
    insert into available_products(codice,misura,quantita) values("2","18 mesi",1);
    insert into available_products(codice,misura,quantita) values("2","24 mesi",1);
    insert into available_products(codice,misura,quantita) values("3","24 mesi",1);
    insert into available_products(codice,misura,quantita) values("3","12 mesi",1);
    insert into available_products(codice,misura,quantita) values("3","18 mesi",1);
    insert into available_products(codice,misura,quantita) values("3","36 mesi",1);
    insert into available_products(codice,misura,quantita) values("4","12 anni",1);
    insert into available_products(codice,misura,quantita) values("4","10 anni",1);
    insert into available_products(codice,misura,quantita) values("4","14 anni",1);
    insert into available_products(codice,misura,quantita) values("4","16 anni",1);
    insert into available_products(codice,misura,quantita) values("4","8 anni",1);
    insert into available_products(codice,misura,quantita) values("4","7 anni",1);
    insert into available_products(codice,misura,quantita) values("5","5 anni",1);
    insert into available_products(codice,misura,quantita) values("5","7 anni",1);
    insert into available_products(codice,misura,quantita) values("5","6 anni",1);
    insert into available_products(codice,misura,quantita) values("5","4 anni",2);
      
      
    insert into orders(user,num_spedizione,indirizzo,costo) values("2","1020300","Via verdi 20, Catania",73.8);
    insert into orders(user,num_spedizione,indirizzo,costo) values("3","1020301","Via garibaldi 20, Catania",13.90);
      
    INSERT into purchased_products(order_id,product_id,misura,quantita,costo) values ("1","5","7 anni",1,"25.90");
    INSERT into purchased_products(order_id,product_id,misura,quantita,costo) values ("1","4","12 anni",1,"59.90");
    INSERT into purchased_products(order_id,product_id,misura,quantita,costo) values ("2","5","5 anni",1,"25.90");
      
    INSERT into reviews(ordine,articolo,user,recensione) values ("1","4","2","Taglia perfetta per la mia bambina!");
    INSERT into reviews(ordine,articolo,user,recensione) values ("2","5","3","Mia figlia l'ha adorata fin dall'inizio!
 Cotone di buona qualità.");

    insert into carts(user,codice,descrizione,marca,prezzo,image,misura,quantita) values("2","1","Abito neonata","IDo","49.90","css/immagini/0_1.jpg","12 mesi","1");
    insert into carts(user,codice,descrizione,marca,prezzo,image,misura,quantita) values("2","2","Bermuda bimbo","IDo","29.90","css/immagini/bermuda.png","12 mesi","1");