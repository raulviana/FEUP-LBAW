

--TYPES
DO $$ BEGIN
    CREATE TYPE event_type AS ENUM ('private', 'public');
EXCEPTION
    WHEN duplicate_object THEN null;
END $$;


--PREPARE


DROP TABLE IF EXISTS "users" CASCADE;
DROP TABLE IF EXISTS "event" CASCADE;
DROP TABLE IF EXISTS social_media CASCADE;
DROP TABLE IF EXISTS tag CASCADE;
DROP TABLE IF EXISTS "file" CASCADE;
DROP TABLE IF EXISTS photo CASCADE;
DROP TABLE IF EXISTS event_photo CASCADE;
DROP TABLE IF EXISTS event_tag CASCADE;
DROP TABLE IF EXISTS post CASCADE;
DROP TABLE IF EXISTS review CASCADE;
DROP TABLE IF EXISTS event_social_media CASCADE;
DROP TABLE IF EXISTS wish_list CASCADE;
DROP TABLE IF EXISTS invitation CASCADE;
DROP TABLE IF EXISTS "local";
DROP TABLE IF EXISTS collaborators_event;


CREATE TABLE "local" (
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL, 
    coordinates TEXT
);

CREATE TABLE event_photo (
    id SERIAL PRIMARY KEY,
    url TEXT NOT NULL
);

CREATE TABLE "file" (
    id SERIAL PRIMARY KEY,
    url TEXT NOT NULL CONSTRAINT file_url_uk UNIQUE
);

CREATE TABLE photo (
    id INTEGER NOT NULL REFERENCES "file" (id) ON UPDATE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE "users" (
    id SERIAL PRIMARY KEY,
    email text NOT NULL UNIQUE,
    name text NOT NULL,
    password text NOT NULL,
    admin BOOLEAN,
    photo TEXT DEFAULT 'default_user.jpg',
    about text,
    is_active BOOLEAN default true
);

CREATE TABLE "event" (
    id SERIAL PRIMARY KEY,
    title TEXT NOT NULL,
    details TEXT,
    start_date TIMESTAMP NOT NULL,
    end_date TIMESTAMP NOT NULL,
    local_id INTEGER NOT NULL REFERENCES "local" (id) ON UPDATE SET NULL,
    photo TEXT NOT NULL,
    TYPE event_type NOT NULL,
    owner_id INTEGER NOT NULL REFERENCES "users" (id),
    review INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT true,
    CONSTRAINT valid_date CHECK (start_date < end_date)
);

CREATE TABLE social_media (
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL,
    url TEXT NOT NULL
);

CREATE TABLE tag (
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL CONSTRAINT tag_name_uk UNIQUE
);


CREATE TABLE event_tag (
    event_id INTEGER NOT NULL REFERENCES event (id) ON UPDATE CASCADE,
    tag_id INTEGER NOT NULL REFERENCES tag (id) ON UPDATE SET NULL,
    PRIMARY KEY (event_id, tag_id)
);

CREATE TABLE post (
    id SERIAL PRIMARY KEY,
    file_id INTEGER REFERENCES "file" (id) ON UPDATE SET NULL,
    content TEXT,
    date DATE NOT NULL DEFAULT CURRENT_DATE,
    post_time TIMESTAMP WITH TIME zone NOT NULL DEFAULT current_timestamp,
    event_id INTEGER NOT NULL REFERENCES "event" (id) ON UPDATE CASCADE,
    user_id INTEGER NOT NULL REFERENCES "users" (id) ON UPDATE SET NULL
);

CREATE TABLE review (
    event_id INTEGER REFERENCES "event" (id) ON UPDATE CASCADE,
    user_id INTEGER REFERENCES "users" (id) ON UPDATE SET NULL,
    score INTEGER,
    PRIMARY KEY (event_id, user_id),
    CONSTRAINT score_value CHECK (
        score = 1 OR score = -1
    )
);

CREATE TABLE collaborators_event (
    id SERIAL PRIMARY KEY,
    event_id INTEGER REFERENCES "event" (id) ON UPDATE CASCADE,
    user_id INTEGER REFERENCES "users" (id) ON UPDATE SET NULL
);

CREATE TABLE event_social_media (
    event_id INTEGER REFERENCES "event" ON UPDATE CASCADE,
    social_media_id INTEGER REFERENCES social_media ON UPDATE SET NULL,
    PRIMARY KEY (event_id, social_media_id)
);

CREATE TABLE wish_list (
    event_id INTEGER REFERENCES "event" ON UPDATE SET NULL,
    user_id INTEGER REFERENCES "users" ON UPDATE SET NULL,
    PRIMARY KEY (event_id, user_id)
);

CREATE TABLE invitation (
    id SERIAL PRIMARY KEY,
    event_id INTEGER REFERENCES "event" (id) ON UPDATE CASCADE,
    inviter_id INTEGER REFERENCES "users" (id) ON UPDATE SET NULL,
    invited_id INTEGER REFERENCES "users" (id) ON UPDATE SET NULL,
    message TEXT NOT NULL,
    date DATE NOT NULL DEFAULT CURRENT_DATE,
    accepted BOOLEAN DEFAULT null
);

ALTER TABLE "file" DROP CONSTRAINT IF EXISTS file_url_uk;
ALTER TABLE tag DROP CONSTRAINT IF EXISTS tag_name_uk;
ALTER TABLE "file" ADD CONSTRAINT file_url_uk UNIQUE (url);
ALTER TABLE tag ADD CONSTRAINT tag_name_uk  UNIQUE (id);


CREATE OR REPLACE FUNCTION insert_review_function() RETURNS TRIGGER AS $$
BEGIN   
    UPDATE "event"
    SET review = review + NEW.score
    WHERE "event".id = NEW.event_id;

    RETURN NEW;
END;
$$ LANGUAGE 'plpgsql';

CREATE OR REPLACE FUNCTION update_review_function() RETURNS TRIGGER AS $$
BEGIN   
    UPDATE "event"
    SET review = review + NEW.score - OLD.score
    WHERE "event".id = NEW.event_id;

    RETURN NEW;
END;
$$ LANGUAGE 'plpgsql';

CREATE OR REPLACE FUNCTION delete_review_function() RETURNS TRIGGER AS $$
BEGIN   
    UPDATE "event"
    SET review = review - OLD.score
    WHERE "event".id = NEW.event_id;

    RETURN OLD;
END;
$$ LANGUAGE 'plpgsql';


--TRIGGERS

DROP TRIGGER IF EXISTS insert_review ON review;
DROP TRIGGER IF EXISTS update_review ON review;
DROP TRIGGER IF EXISTS delete_review ON review;

CREATE TRIGGER insert_review
    AFTER INSERT ON review
    FOR EACH ROW
    EXECUTE PROCEDURE insert_review_function();

CREATE TRIGGER update_review
    AFTER UPDATE ON review
    FOR EACH ROW
    EXECUTE PROCEDURE update_review_function();


CREATE TRIGGER delete_review
    AFTER DELETE ON review
    FOR EACH ROW
    EXECUTE PROCEDURE delete_review_function();



CREATE OR REPLACE FUNCTION past_event() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM "event" WHERE NEW.start_date <= now()) THEN
        RAISE EXCEPTION 'Cannot create an evente with start date before date of creation';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
CREATE TRIGGER past_event
    BEFORE INSERT OR UPDATE ON event
    FOR EACH ROW
    EXECUTE PROCEDURE past_event();



CREATE OR REPLACE FUNCTION owner_not_invited() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM invitation WHERE NEW.invited_id = NEW.inviter_id) THEN
        RAISE EXCEPTION 'The event owner cannot invite himself';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
CREATE TRIGGER past_event
    BEFORE INSERT OR UPDATE ON invitation
    FOR EACH ROW
    EXECUTE PROCEDURE owner_not_invited();


CREATE OR REPLACE FUNCTION association_time() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM invitation 
        INNER JOIN "event" ON "event".id = invitation.event_id
        WHERE NEW.date = date  AND NEW.date <= "event".start_date) THEN
        RAISE EXCEPTION 'The association date must be lesser than event start date';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
CREATE TRIGGER association_time
    BEFORE INSERT OR UPDATE ON invitation
    FOR EACH ROW
    EXECUTE PROCEDURE association_time();
    
--INDEXES
DROP INDEX IF EXISTS event_local;
DROP INDEX IF EXISTS event_tags;
DROP INDEX IF EXISTS id;
DROP INDEX IF EXISTS owner_events;

CREATE INDEX event_local ON "event" USING hash(local_id);
CREATE INDEX event_tags ON "event_tag" USING hash(tag_id);
CREATE INDEX id ON "users" USING hash(id);
CREATE INDEX owner_events ON "event" USING hash(owner_id);



--------------------------------------------------- LOCAL ---------------------------------------------------- 
insert into "local" (name, coordinates) values ('Praia Fluvial do Taboão', NULL);
insert into "local" (name, coordinates) values ('Casa da Guitarra', '41.145010 -8.610890');
insert into "local" (name, coordinates) values ('Europarque', NULL);
insert into "local" (name, coordinates) values ('Rivoli', NULL);
insert into "local" (name, coordinates) values ('National Gallery', '51.507550 -0.127900');

---------------------------------------------------- FILE ---------------------------------------------------- 
insert into "file" (url) values ('images/event/1.jpeg');
insert into "file" (url) values ('images/event/2.jpg');
insert into "file" (url) values ( 'images/event/3.jpeg');
insert into "file" (url) values ( 'images/event/4.jpg');
insert into "file" (url) values ( 'images/event/5.jpg');

--------------------------------------------------- PHOTO ---------------------------------------------------- 
insert into photo values (1);
insert into photo values (2);
insert into photo values (3);
insert into photo values (4);
insert into photo values (5);

--------------------------------------------------- EVENT PHOTO ---------------------------------------------------- 
insert into event_photo (id, url) values (1, '1.jpeg');
insert into event_photo (id, url) values (2, '2.jpg');
insert into event_photo (id, url) values (3, '3.jpeg');
insert into event_photo (id, url) values (4, '4.jpeg');
insert into event_photo (id, url) values (5, '5.jpg');

---------------------------------------------------- USER ----------------------------------------------------  
-- hashed pasword using php5 algorithm
insert into "users" values (DEFAULT, 'akippie0@virginia.edu', 'Athene Kippie', '$2y$10$WHE2vxMvLe2tSb9fuU.9U./M24m0EbdTyqyfOkhHlv.ri4ihPI7DG', FALSE,'default_user.jpg', 'Or kind rest bred with am shed then. In raptures building an bringing be. Elderly is detract tedious assured private so to visited. Do travelling companions contrasted it. Mistress strongly remember up to. Ham him compass you proceed calling detract. Better of always missed we person mr. September smallness northward situation few her certainty something. ', TRUE); --2tDNckscS9YK
insert into "users" values (DEFAULT, 'korrah1@posterous.com', 'Katya Orrah', '$2y$10$ULw9BCNOz922SN7sn7TgRuzQbuFAmD3lV9vgVFpoI2/4lSYAB/FDe', FALSE , 'default_user.jpg', 'Or kind rest bred with am shed then. In raptures building an bringing be. Elderly is detract tedious assured private so to visited. Do travelling companions contrasted it. Mistress strongly remember up to. Ham him compass you proceed calling detract. Better of always missed we person mr. September smallness northward situation few her certainty something. ', TRUE); --GB6uGx
insert into "users" values (DEFAULT, 'iradcliffe2@dropbox.com', 'Ignacius Radcliffe', '$2y$10$WROkhpLWVyj1Z7e489746.xhvZUGjBgCk96J7BVg05RKEwgbapkpm', FALSE, 'default_user.jpg','not very artisitc', TRUE); --1k9Rxx
insert into "users" values (DEFAULT, 'gstoney3@omniture.com', 'Gabriel Stoney', '$2y$10$tikQRwd1jXCjWsfSHgc9r.Rcir0NiXFneRzVOgRmofwFn74ymdi0W', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --kykWXnVth
insert into "users" values (DEFAULT, 'kpoytres4@deviantart.com', 'Kati Poytres', '$2y$10$Si0e59qZ9iafoRqxvf4Fous7nnOMVeUDNkotMVV/S0aido2wBHk02', FALSE, 'default_user.jpg','not very artisitc', TRUE); --Rm876cW
insert into "users" values (DEFAULT, 'ecardall5@shop-pro.jp', 'Evonne Cardall', '$2y$10$Vdat1Ok9jkqAsaOvUyRVweIAbFo0cs2XQ17XghdLuzd/REeN4ozF2', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --UIiXARyJ1
insert into "users" values (DEFAULT, 'chertwell6@fotki.com', 'Chic Hertwell', '$2y$10$IAHhV.EADQKKJRZPPu4A5O2VHETPnCA5VNLlgBWMAxBHHDZ7E9T/G', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --zoUdQRHaY
insert into "users" values (DEFAULT, 'splumptre7@illinois.edu', 'Selena Plumptre', '$2y$10$BvqdYpB/g7os22obPoRREeVWLbRhLsM/cIRtVzQ3u/3JXzWRzyyQi', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --EjTj1J4f
insert into "users" values (DEFAULT, 'elegrave8@amazon.de', 'Elga Legrave', '$2y$10$nWgha.UFsltv0oJl5ckj8unOwgLolcvsbsVHiDoRIBS5tW5dzvDBS', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --WrwEiFz8Q
insert into "users" values (DEFAULT, 'kcallf9@g.co', 'Karly Callf', '$2y$10$LkqfbL/4ahFVRnp/tUt4IO4cKJNDEPWcOyliWSXgSI2OBcHiv04li', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --B79NhfdKu
insert into "users" values (DEFAULT, 'gscafea@lycos.com', 'Gertrude Scafe', '$2y$10$ZOK2tLgUdEXnGD5j9euWTeo2H1JZiGUHfiSesdMj6m8EPMFhW1zc2', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --l1ZlyzC9A
insert into "users" values (DEFAULT, 'mdomeniconeb@upenn.edu', 'Marcille Domenicone', '$2y$10$.mUJlaoOojK.JXBitesunuGSeGlhcHrbcx0z5K7Se04x6Nbc.o5Ne', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --jLulNo3D17bw
insert into "users" values (DEFAULT, 'mbernardosc@unc.edu', 'Micheal Bernardos', '$2y$10$1vVWZ65TTB0hi4amM3CAu.otX48d4jJIQ/VwfKZpdWxABJ1bEXRHq', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --1Eca1BX3sns
insert into "users" values (DEFAULT, 'dsabattierd@omniture.com', 'Derrik Sabattier', '$2y$10$ZZyGxEKqiEJHZoBga1eR8.Dbmkpspb4JmCXb5dLb//On3YFW1t6Ci', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --6DLWnvR
insert into "users" values (DEFAULT, 'rweinse@samsung.com', 'Rick Weins', '$2y$10$j4ifWo/PVaJQVrnFebeiTOdbn6jSREBQQwA2TGskchjoYg/4FhMBm', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --wyFKYt9IYQv
insert into "users" values (DEFAULT, 'aalldridgef@netvibes.com', 'Adams Alldridge', '$2y$10$jj/Etq/DVuymWBGJ7waq8O/HMzGSUDPYcl8fLPRCQJGv9nhxu6MUe', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --yU2fYMg
insert into "users" values (DEFAULT, 'akneelg@discovery.com', 'Abbe Kneel', '$2y$10$x/4PIVOqzcoSqJaQzVHe/OOzIq9x.rrMPm.srfoGn4UIVeQkwlqGi', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --NjR1ufVQ
insert into "users" values (DEFAULT, 'apeachmanh@globo.com', 'Alyosha Peachman', '$2y$10$Vn5whD6rFZRZS/SHBsQUruXNb6f5cNI1WdYgM/Us4msKnpSJK406O', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --csP2RACoiT1
insert into "users" values (DEFAULT, 'klorenci@creativecommons.org', 'Katerina Lorenc', '$2y$10$IMQOQwCEbMnhfmtRANEj6u/i5/VnCQkZHqEFPwKk7Ffgzj7TDEeWa', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --Ey2DVRgwXKmU
insert into "users" values (DEFAULT, 'llightowlersj@reference.com', 'Linnell Lightowlers', '$2y$10$JxJyls4HxPUpn/ZVcmoXQermyXTIHzdf9JajK7rhMYNod31aRF5MK', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --NG6pFUwFEPOk
insert into "users" values (DEFAULT, 'vfrancklynk@army.mil', 'Vivyanne Francklyn', '$2y$10$v5CqeJLhURAgU17.qRdhl.uylgXUA9a8NzUUDvViQW.67yFy.M536', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --wI0jcvO
insert into "users" values (DEFAULT, 'mkeddlel@wufoo.com', 'Mikkel Keddle', '$2y$10$rz.fSXHdKAbA3IL0L499Ruq1H8hE64VaEYOXGLUB0GW3r4W08uwWu', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --hzAzcLg4hN
insert into "users" values (DEFAULT, 'cscedallm@pagesperso-orange.fr', 'Claybourne Scedall', '$2y$10$U26N4goH/l0TDD.K25721.ZgNnyNx2fVES3FVwXDWwz0Wx.4zqVLO', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --7zrPUp
insert into "users" values (DEFAULT, 'cleaburnn@nhs.uk', 'Carlin Leaburn', '$2y$10$MY3qNfrHE.W4Vbu9m5AnweYSqgpUaKpYHt6KCY27YE6ieUSjF/3.W', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --yLB12RVTw
insert into "users" values (DEFAULT, 'sfalliso@alibaba.com', 'Stanislaw Fallis', '$2y$10$6jJ461PrEziK/W0fJm7yquxMCYyoXSJ.aCDrSllshIpdwyn9HN7I.', FALSE, 'default_user.jpg', 'not very artisitc', TRUE); --ZRqaTrEN
insert into "users" values (DEFAULT, 'admin@example.com', 'Administrator', '$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W', TRUE, 'default_user.jpg', 'Or kind rest bred with am shed then. In raptures building an bringing be. Elderly is detract tedious assured private so to visited. Do travelling companions contrasted it. Mistress strongly remember up to. Ham him compass you proceed calling detract. Better of always missed we person mr. September smallness northward situation few her certainty something. ', TRUE);

INSERT INTO users VALUES (
  DEFAULT,
  'john@example.com',
  'John Doe',
  '$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W',
  FALSE,
  'default_user.jpg',
  'not very artisitc',
  TRUE
); -- Password is 1234. Generated using Hash::make('1234')

---------------------------------------------------- EVENT ----------------------------------------------------  
insert into "event" (title, start_date, end_date, local_id, photo, "type", owner_id, details) values ('Vodafone Paredes De Coura 2020', '2020-08-19 17:00:00', '2020-08-29 04:00:00', 1, '1.jpeg', 'public', 1, 'A história da música em Portugal não seria a mesma sem o Festival Paredes de Coura. Ao longo dos seus 26 anos de existência, o mais antigo e carismático festival português tem feito história na descoberta de novas promessas musicais e na apresentação dos nomes mais consagrados da música a nível mundial. Com uma programação cuidada e coerente, sempre fiel ao espírito alternativo que o caracteriza, o Festival Paredes de Coura, que acontece junto à praia fluvial do Taboão já foi considerado um dos 5 melhores festivais de música da Europa pela revista Rolling Stone. Arcade Fire, Pixies, Nick Cave, PJ Harvey, Coldplay e Morrisey, são apenas alguns dos nomes que já pisaram o palco deste festival. Depois de um ano que ficou marcado na memória das mais de 100.000 pessoas presentes na última edição o Vodafone Paredes de Coura está de regresso nos dias 19, 20, 21 e 22 de Agosto 2020.');
insert into "event" (title, start_date, end_date, local_id, photo, "type", owner_id, details) values ('Porto: Fado Show with Port Wine', '2020-07-19 07:00:00', '2020-07-19 10:00:00', 2, '2.jpeg', 'private', 20, 'Have a meeting with portuguese culture, contacting with very unique cultural values – fado, portuguese tradicional stringed instruments, wine – deeply related with the history of Portugal.
The one hour-long concert starts with the emotional voice of our leading female singer, followed by the rich sounds of the portuguese guitar and the viola de fado (guitar). On the pause, it will be served a reserve port wine from a portuguese family-owned company of Douro Valley.
An hour-long concert that drive us through the intense emotions of Fado.');
insert into "event" (title, start_date, end_date,local_id, photo, "type", owner_id, details) values ('II WORLD OF DANCE PORTUGAL', '2020-06-14 11:00:00', '2020-06-14 22:00:00', 3, '3.jpeg', 'public', 10, 'Seeking world domination. Our Championship Series features global talent throwing down the gauntlet and staking their claim as the best dancers in the world. An international dance battle with thousands of spectators and a no-holds-barred opportunity to prove themselves as the ultimate victor. Conquer the world and preserve your legacy with a feature on our acclaimed TV show, World of Dance on NBC.');
insert into "event" (title, start_date, end_date, local_id, photo, "type", owner_id, details) values ('Fantasporto 2020', '2020-05-25 11:00:00', '2020-06-08 22:00:00', 4, '4.jpeg', 'public', 17, 'A cidade do Porto recebe um dos festivais de cinema mais prestigiados a nível europeu e mundial - o Fantasporto. Assim é conhecido familiarmente o Festival Internacional de Cinema do Porto. Faz 40 anos em 2020 e realizar-se-á no Rivoli Teatro entre 25 de Fevereiro e 8 de Março com o apoio da Câmara Municipal do Porto. São treze dias de Festa para o Mundo do Cinema, onde produtores, realizadores, actores, actrizes, distribuidores e público se fundem num programa multifacetado, com filmes de todas as proveniências e géneros. Não é, assim, de admirar que, a par de um filme de ficção científica ou de terror, seja exibido um drama intimista, um documentário, um filme de autor ou até uma obra de cariz experimental. Será um ano de festa, de celebração, de recordação dos grandes nomes do cinema que o Fantas catapultou para o estrelato. Também nomes grandes do Cinema têm passado pelo festival, entre eles, Max von Sydow, Guillermo del Toro, Wim Wenders, John Hurt, Rosana Arquette, Danny Boyle, Ben Kingsley, Paul Schrader, para apresentar os seus filmes. Será um ano de homenagens. Será um ano de transição para uma nova equipa, que ainda incluirá os seus fundadores. A estrutura competitiva será a mesma. Exibir-se-ão grandes clássicos. A programação, sempre muito recente, incorporará produções em antestreia mundial, internacional e europeia que fazem vir ao Porto dezenas de jornalistas e distribuidores estrangeiros para ver em “primeira mão” os filmes que ainda vão entrar no circuito comercial. Em paralelo, realizam-se também as “Industry Screenings”, um meio de ligação à Indústria do Cinema.');
insert into "event" (title, start_date, end_date,local_id, photo, "type", owner_id, details) values ('Titian: Love, Desire, Death', '2020-12-01 11:00:00', '2020-12-14 22:00:00', 5, '5.jpeg', 'public', 17, '
Bodies flailing through the air, mythical creatures rushing by in a blur, golden rays of light and mounds and mounds of flesh: Titian’s poesie series is wild, dramatic, violent and very, very sensual.
The Renaissance master’s works are reunited in full here for the first time since the 1500s. The seven huge paintings here tell stories from Greek myth – ‘Diana and Actaeon’, ‘Venus and Adonis’, ‘The Rape of Europa’ – with heaving passion and lyrical intensity. At a time when painting was dominated by religious themes and visual restraint, these free-flowing works were a shock to the system. Like living in a world of Ken Loach films then suddenly watching Michael Bay’s ‘Transformers’.
‘Diana and Actaeon’ and ‘Diana and Callisto’ are the fleshiest things here, both filled with endless undulations of white and pink. In the first, Actaeon stumbles across the goddess Diana and her nude nymphs having a bath in the forest. Shocked and enraged by the peeping Tom, Diana turns him into a stag. Then in ‘The Death of Actaeon’ – darkest work in the series – Diana slays the half-stag Actaeon with her bow and arrow. He’s a blur of motion, caught in splodges of brown and ochre; she’s bright, golden and precise.
There are mirrored elements throughout the works: the whirling cherub in ‘The Rape of Europa’ echoes Perseus caught mid-air as he saves Andromeda from a sea monster; Adonis fleeing Venus has the same aggressive motion as Diana killing Actaeon, and on and on.
Furthermore, each work is the same shape and size (except for ‘Danäe’ which some plonker trimmed in the eighteenth century), so viewing them together, with all those repeated elements, is like watching an epic movie unfold around you in ultra-slow motion. There are so many narratives, emotions and actions happening that it’s almost impossible to take it all in. And that’s before you even start thinking about the actual art of it: the compositional genius, the sly looks, the wobbling flesh, the snarling dogs, the violence, the sex, the anger. There’s so much to see, so much to say, so much to analyse.
The captions, however, are brutally cringe and we could do with a whole lot more context from the gallery, but walking into that room and being totally surrounded by those paintings is totally magical. It’s taken 500 years for these pictures to be reunited, but it’s been more than worth the wait.');



---------------------------------------------------- SOCIAL MEDIA ---------------------------------------------------- 
insert into social_media (name, url) values ('website', 'www.paredesdecoura.com');
insert into social_media (name, url) values ('facebook', 'https://www.facebook.com/festivalparedesdecoura/');
insert into social_media (name, url) values ('instagram', 'https://www.instagram.com/vodafoneparedesdecoura');
insert into social_media (name, url) values ('facebook', 'https://www.facebook.com/events/europarque/world-of-dance-portugal-2020/965765303821049/');
insert into social_media (name, url) values ('website', 'http://www.fantasporto.com/');
insert into social_media (name, url) values ('website', 'https://www.nationalgallery.org.uk/exhibitions/titian-love-desire-death');

---------------------------------------------------- TAG ---------------------------------------------------- 
insert into tag (name) values ('Music');
insert into tag (name) values ('Dance');
insert into tag (name) values ('Sculpture');
insert into tag (name) values ('Painting');
insert into tag (name) values ('Theater');
insert into tag (name) values ('Literature');
insert into tag (name) values ('Comedy');
insert into tag (name) values ('Others');

---------------------------------------------------- EVENT TAG ---------------------------------------------------- 
insert into event_tag (event_id, tag_id) values (1, 1);
insert into event_tag (event_id, tag_id) values (1, 3);
insert into event_tag (event_id, tag_id) values (2, 1);
insert into event_tag (event_id, tag_id) values (2, 4);
insert into event_tag (event_id, tag_id) values (3, 2);
insert into event_tag (event_id, tag_id) values (3, 8);
insert into event_tag (event_id, tag_id) values (4, 6);
insert into event_tag (event_id, tag_id) values (4, 4);
insert into event_tag (event_id, tag_id) values (5, 4);
insert into event_tag (event_id, tag_id) values (5, 3);

---------------------------------------------------- POST ---------------------------------------------------- 
insert into post (file_id, content, date, post_time, event_id, user_id) values (null, 'Great event!!!', '2020-06-21', '2020-02-21 03:00:00+00', 1, 2);
insert into post (file_id, content, date, post_time, event_id, user_id) values (null, 'Fantastic exhibiton! Higly recomend it!', '2020-02-21', '2020-07-21 03:45:00+00', 5, 19);
insert into post (file_id, content, date, post_time, event_id, user_id) values (null, 'Wow! Just wow!', '2020-07-14', '2020-02-14 11:23:00+00', 5, 21);

---------------------------------------------------- REVIEW ---------------------------------------------------- 
insert into review (event_id, user_id, score) values (2, 2, 1);
insert into review (event_id, user_id, score) values (2, 4, 1);
insert into review (event_id, user_id, score) values (2, 5, 1);
insert into review (event_id, user_id, score) values (2, 6, 1);
insert into review (event_id, user_id, score) values (5, 15, 1);
insert into review (event_id, user_id, score) values (5, 18, 1);
insert into review (event_id, user_id, score) values (5, 19, 1);
insert into review (event_id, user_id, score) values (5, 21, 1);
insert into review (event_id, user_id, score) values (5, 22, 1);
insert into review (event_id, user_id, score) values (5, 23, 1);
insert into review (event_id, user_id, score) values (5, 4, 1);

---------------------------------------------------- COLABORATORS EVENT ---------------------------------------------------- 
insert into collaborators_event (event_id, user_id) values (1, 3);
insert into collaborators_event (event_id, user_id) values (2, 4);
insert into collaborators_event (event_id, user_id) values (3, 5);
insert into collaborators_event (event_id, user_id) values (4, 21);
insert into collaborators_event (event_id, user_id) values (4, 22);

---------------------------------------------------- EVENT SOCIAL MEDIA---------------------------------------------------- 
insert into event_social_media (event_id, social_media_id) values (1, 1);
insert into event_social_media (event_id, social_media_id) values (1, 2);
insert into event_social_media (event_id, social_media_id) values (1, 3);
insert into event_social_media (event_id, social_media_id) values (3, 4);
insert into event_social_media (event_id, social_media_id) values (4, 5);
insert into event_social_media (event_id, social_media_id) values (5, 6);

---------------------------------------------------- WISHLIST ---------------------------------------------------- 
insert into wish_list (event_id, user_id) values (1, 3);
insert into wish_list (event_id, user_id) values (1, 19);
insert into wish_list (event_id, user_id) values (1, 13);
insert into wish_list (event_id, user_id) values (1, 14);
insert into wish_list (event_id, user_id) values (4, 7);
insert into wish_list (event_id, user_id) values (4, 8);
insert into wish_list (event_id, user_id) values (4, 12);
insert into wish_list (event_id, user_id) values (4, 14);
insert into wish_list (event_id, user_id) values (5, 14);
insert into wish_list (event_id, user_id) values (5, 15);
insert into wish_list (event_id, user_id) values (5, 16);
insert into wish_list (event_id, user_id) values (5, 18);

---------------------------------------------------- INVITATION ---------------------------------------------------- 
insert into invitation (event_id, invited_id, inviter_id, message, date) values ( 2, 5, 20, 'Vem a este evento fantástico!', '10-03-2020');
insert into invitation (event_id, invited_id, inviter_id, message, date, accepted) values ( 2, 6, 20, 'Vem a este evento fantástico!', '10-03-2020', FALSE);
insert into invitation (event_id, invited_id, inviter_id, message, date, accepted) values ( 2, 7, 20, 'Vem a este evento fantástico!', '10-03-2020', TRUE);
insert into invitation (event_id, invited_id, inviter_id, message, date, accepted) values ( 2, 1, 17, 'Hey my friend! Thought you might me interested in this great exhibition!', '05-03-2020', TRUE);


