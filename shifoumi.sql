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
        idGame  int (11) Auto_increment  NOT NULL ,
        pointsL Int NOT NULL ,
        pointsR Int NOT NULL ,
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
# Table: bets
#------------------------------------------------------------

CREATE TABLE bets(
        idBet        int (11) Auto_increment  NOT NULL ,
        amountBet    Int NOT NULL ,
        choiceHand   Char (1) NOT NULL ,
        choiceSymbol Char (1) NOT NULL ,
        idUser       Int NOT NULL ,
        idDraw       Int NOT NULL ,
        PRIMARY KEY (idBet )
)ENGINE=InnoDB;

ALTER TABLE draws ADD CONSTRAINT FK_draws_idGame FOREIGN KEY (idGame) REFERENCES games(idGame);
ALTER TABLE comments ADD CONSTRAINT FK_comments_idUser FOREIGN KEY (idUser) REFERENCES users(idUser);
ALTER TABLE bets ADD CONSTRAINT FK_bets_idUser FOREIGN KEY (idUser) REFERENCES users(idUser);
ALTER TABLE bets ADD CONSTRAINT FK_bets_idDraw FOREIGN KEY (idDraw) REFERENCES draws(idDraw);
