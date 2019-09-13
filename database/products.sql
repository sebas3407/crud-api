CREATE TABLE platform (
    name varchar(40),
    PRIMARY key (name)
);

INSERT INTO platform VALUES ('Pc');
INSERT INTO platform VALUES ('Switch');
INSERT INTO platform VALUES ('Xbox');
INSERT INTO platform VALUES ('Playstation');

CREATE TABLE game (
    ID integer NOT NULL AUTO_INCREMENT,
    name varchar(40),
    platform varchar (40),
    description varchar(400),
    points decimal(6,2),
    price decimal(4,2),
    path_image varchar(250),
    PRIMARY key(id)
);

INSERT INTO game VALUES (
    1, 
    'RED DEAD REDEMPTION 2', 
    'Playstation', 
    'Red Dead Redemption 2 es un videojuego de acción-aventura western, en un mundo abierto y en perspectiva de primera y tercera persona, ​ con componentes para un jugador y multijugador.​ Fue desarrollado por Rockstar Studios, para las consolas PlayStation 4 y Xbox One.​', 
    1050.00,
    59.99,  
    'img/games/1.jpg');

INSERT INTO game VALUES (
    2, 
    'HORIZON ZERO DAWN', 
    'Playstation', 
    'Horizon Zero Dawn es un videojuego de acción, aventura y de mundo abierto desarrollado por Guerrilla Games y distribuido por Sony Interactive Entertainment, únicamente para PlayStation 4.', 
    1050.00,
    59.99, 
    'img/games/2.jpg');

INSERT INTO game VALUES (
    3, 
    'SPIDERMAN', 
    'Playstation', 
    'Spider-Man es un superhéroe ficticio creado por los escritores y editores Stan Lee y Steve Ditko. Apareció por primera vez en el cómic de antología Amazing Fantasy # 15 en la Edad de Plata de los cómics.', 
    1050.00,
    59.99, 
    'img/games/3.jpg');

INSERT INTO game VALUES (
    4, 
    'ROCKET LEAGUE', 
    'Playstation', 
    'Rocket League es un videojuego que combina el fútbol con los vehículos. Fue desarrollado por Psyonix y lanzado el 7 de julio del 2015. Se encuentra disponible en español, tiene modos de juego cooperativo, de un jugador y en línea.', 
    525.00,
    29.99, 
    'img/games/4.jpg');
    
INSERT INTO game VALUES (
    5,
    'Mario Kart 8',
    'Switch', 
    'Mario Kart 8 es un videojuego de carreras desarrollado y publicado por Nintendo para la consola Wii U. Es la undécima entrega de la serie Mario Kart, octava en consolas de Nintendo.',
    1050.00,
    59.99, 
    'img/games/5.jpg');

INSERT INTO game VALUES (
    6,
    'The Legend of Zelda',
    'Switch', 
    'The Legend of Zelda: Breath of the Wild es el título oficial del videojuego de acción-aventura de la serie The Legend of Zelda, desarrollado por Nintendo EPD, en colaboración con Monolith Soft para Wii U y Nintendo Switch.​ Es la décimo octava entrega de la serie y la tercera en utilizar gráficos en alta definición.',
    1050.00,
    59.99, 
    'img/games/6.jpg');

INSERT INTO game VALUES (
    7,
    'Pokmon: Lets Go, Pikachu!',
    'Switch', 
    'Pokémon Lets Go, Pikachu! y Lets Go, Eevee! son dos videojuegos RPG pertenecientes a la franquicia Pokémon desarrollados por Game Freak y publicados por Nintendo y The Pokémon Company para Nintendo Switch. Los juegos están basados en Pokémon Amarillo y cuentan con ciertas mecánicas tomadas de Pokémon GO.',
    1050.00,
    59.99, 
    'img/games/7.jpg');

INSERT INTO game VALUES (
    8,
    'SUPER SMASH BROS',
    'Switch', 
    'Super Smash Bros. es una saga de juegos de lucha distribuida por Nintendo, la cual presenta personajes de franquicias establecidas en Nintendo y otras compañías de videojuegos y ha vendido en total más de 23 millones de unidades. La saga tuvo un exitoso comienzo en 1999 con Super Smash Bros. para la Nintendo 64.',
    1050.00,
    59.99, 
    'img/games/8.jpg');

INSERT INTO game VALUES (
    9, 
    'FORZA HORIZON 4', 
    'Xbox', 
    'Forza Horizon 4 es un videojuego de carreras de mundo abierto, jugable en línea, desarrollado por Playground Games para Xbox One y Windows 10.​ Fue revelado en el E3 2018 y su lanzamiento se produjo el 2 de octubre de 2018.', 
    1050.00,
    59.99, 
    'img/games/9.jpg');

INSERT INTO game VALUES (
    10, 
    'FARCRY5', 
    'Xbox', 
    'Far Cry 5 es un videojuego de acción-aventura en primera persona desarrollado por Ubisoft Montreal y publicado por Ubisoft para PlayStation 4, Xbox One y Microsoft Windows. Es la undécima entrega de la serie Far Cry. Su lanzamiento se produjo el 27 de marzo de 2018.​', 
    1050.00,
    59.99, 
    'img/games/10.jpg');

INSERT INTO game VALUES (
    11, 
    'PLAYERUNKNOWNS', 
    'Xbox', 
    'PlayerUnknowns Battlegrounds es un videojuego de batalla en línea multijugador masivo desarrollado por Brendan Greene y publicado por Bluehole para Microsoft Windows, Xbox One, PlayStation 4, Android e iOS.', 
    525.00,
    29.99,  
    'img/games/11.jpg');

INSERT INTO game VALUES (
    12, 
    'CRACKDOWN3', 
    'Xbox', 
    'Crackdown 3 es un videojuego de acción-aventura y mundo abierto para Microsoft Windows y Xbox One con desarrollo dirigido por el desarrollador británico Reagent Games, un estudio liderado por David Jones, director de Realtime Worlds, y publicado por Microsoft Studios.', 
    1050.00,
    59.99, 
    'img/games/12.jpg');

CREATE TABLE user (
    email varchar(100),
    password varchar(100),
    name varchar (100),
    surname varchar(100),
    points decimal(6,2),
    PRIMARY key(email)
);

INSERT INTO user VALUES ('davidespier@gmail.com', '12345678', 'David', 'Espier',1000);
INSERT INTO user VALUES ('sebasortiz2000@gmail.com', '12345678', 'Sebastian', 'Ortiz',0);
INSERT INTO user VALUES ('cristianserrate@gmail.com', '12345678', 'Cristian', 'Garcia',0);
INSERT INTO user VALUES ('davidcascos@gmail.com', '12345678', 'David', 'Cascos',0);