------------------------------------------------------------
#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        idUser   int (11) Auto_increment  NOT NULL ,
        username Varchar (25) NOT NULL ,
        email    Varchar (35) NOT NULL ,
        password Char (40) ,
        avatar   Blob ,
        balance  BigInt NOT NULL ,
        PRIMARY KEY (idUser )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: games
#------------------------------------------------------------

CREATE TABLE games(
        idGame   int (11) Auto_increment  NOT NULL ,
        typeGame Varchar (3) NOT NULL ,
        PRIMARY KEY (idGame )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: draws
#------------------------------------------------------------

CREATE TABLE draws(
        idDraw       int (11) Auto_increment  NOT NULL ,
        dateTimeDraw Datetime NOT NULL ,
        choiceLeft   Char (1) NOT NULL ,
        choiceRight  Char (1) NOT NULL ,
        idGame       Int NOT NULL ,
        idBet        Int NOT NULL ,
        PRIMARY KEY (idDraw )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comments
#------------------------------------------------------------

CREATE TABLE comments(
        idComment   int (11) Auto_increment  NOT NULL ,
        message     Varchar (200) NOT NULL ,
        dateComment Datetime NOT NULL ,
        idUser      Int NOT NULL ,
        PRIMARY KEY (idComment )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: betsOnVictory
#------------------------------------------------------------

CREATE TABLE betsOnVictory(
        idBet      int (11) Auto_increment  NOT NULL ,
        amountBet  Int NOT NULL ,
        choiceUser Char (1) NOT NULL ,
        PRIMARY KEY (idBet )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: betsOnChoice
#------------------------------------------------------------

CREATE TABLE betsOnChoice(
        idBet        int (11) Auto_increment  NOT NULL ,
        amountBet    Int NOT NULL ,
        choiceHand   Char (1) NOT NULL ,
        choiceSymbol Char (1) NOT NULL ,
        idDraw       Int NOT NULL ,
        PRIMARY KEY (idBet )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: place
#------------------------------------------------------------

CREATE TABLE place(
        idUser             Int NOT NULL ,
        idBet              Int NOT NULL ,
        idBet_betsOnChoice Int NOT NULL ,
        PRIMARY KEY (idUser ,idBet ,idBet_betsOnChoice )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: concern
#------------------------------------------------------------

CREATE TABLE concern(
        idBet  Int NOT NULL ,
        idDraw Int NOT NULL ,
        idGame Int NOT NULL ,
        PRIMARY KEY (idBet ,idDraw ,idGame )
)ENGINE=InnoDB;

ALTER TABLE draws ADD CONSTRAINT FK_draws_idGame FOREIGN KEY (idGame) REFERENCES games(idGame);
ALTER TABLE draws ADD CONSTRAINT FK_draws_idBet FOREIGN KEY (idBet) REFERENCES betsOnChoice(idBet);
ALTER TABLE comments ADD CONSTRAINT FK_comments_idUser FOREIGN KEY (idUser) REFERENCES users(idUser);
ALTER TABLE betsOnChoice ADD CONSTRAINT FK_betsOnChoice_idDraw FOREIGN KEY (idDraw) REFERENCES draws(idDraw);
ALTER TABLE place ADD CONSTRAINT FK_place_idUser FOREIGN KEY (idUser) REFERENCES users(idUser);
ALTER TABLE place ADD CONSTRAINT FK_place_idBet FOREIGN KEY (idBet) REFERENCES betsOnVictory(idBet);
ALTER TABLE place ADD CONSTRAINT FK_place_idBet_betsOnChoice FOREIGN KEY (idBet_betsOnChoice) REFERENCES betsOnChoice(idBet);
ALTER TABLE concern ADD CONSTRAINT FK_concern_idBet FOREIGN KEY (idBet) REFERENCES betsOnVictory(idBet);
ALTER TABLE concern ADD CONSTRAINT FK_concern_idDraw FOREIGN KEY (idDraw) REFERENCES draws(idDraw);
ALTER TABLE concern ADD CONSTRAINT FK_concern_idGame FOREIGN KEY (idGame) REFERENCES games(idGame);
