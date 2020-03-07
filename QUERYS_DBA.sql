CREATE DATABASE dbprueba1;

CREATE TABLE cliente ( cli_id INT NOT NULL, cli_rfc VARCHAR(30), cli_nombre VARCHAR(30), PRIMARY KEY (cli_id) );
CREATE TABLE Monedas ( mon_id INT NOT NULL, mon_rfc VARCHAR(30), mon_nombre VARCHAR(30), PRIMARY KEY (mon_id) );

CREATE TABLE facturas
(
 fac_id INT NOT NULL,
  cli_id INT NOT NULL,
  mon_id INT NOT NULL,
 fac_fec DATE,
  fac_sub FLOAT(30),
  fac_iva FLOAT(30),
 fac_tot  INT,
 fac_tc VARCHAR(30),
    PRIMARY KEY(fac_id),
    INDEX (cli_id),
    FOREIGN KEY (cli_id) REFERENCES cliente(cli_id)
)


CREATE TABLE facturas_detalle
(
 fac_id INT NOT NULL,
 fac_det_id INT NOT NULL,
  fac_det_can  INT NOT NULL,
 fac_det_pun FLOAT(30),
  fac_det_imp FLOAT(30),
  fac_det_con VARCHAR(30),
    PRIMARY KEY(fac_id),
    INDEX (fac_id),
    FOREIGN KEY (fac_det_id) REFERENCES facturas(fac_id)
);


INSERT INTO cliente VALUES (1, "5639pdf96","Gerardo");
INSERT INTO cliente VALUES (2, "5639fpd96","Ivan");
INSERT INTO cliente VALUES (3, "5639fMKMku","Lucrecia");
INSERT INTO monedas VALUES (1, "MXN","PESOS MEXICANOS")
INSERT INTO monedas VALUES (2, "USD","DOLARES AMERICANOS")
