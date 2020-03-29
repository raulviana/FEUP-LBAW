
--TYPES
DO $$ BEGIN
    CREATE TYPE event_type AS ENUM ('private', 'public');
EXCEPTION
    WHEN duplicate_object THEN null;
END $$;


--PREPARE

DROP TABLE IF EXISTS "user" CASCADE;
DROP TABLE IF EXISTS artist CASCADE;
DROP TABLE IF EXISTS "event" CASCADE;
DROP TABLE IF EXISTS social_media CASCADE;
DROP TABLE IF EXISTS tag CASCADE;
DROP TABLE IF EXISTS "file" CASCADE;
DROP TABLE IF EXISTS photo CASCADE;
DROP TABLE IF EXISTS event_tag CASCADE;
DROP TABLE IF EXISTS post CASCADE;
DROP TABLE IF EXISTS review CASCADE;
DROP TABLE IF EXISTS event_social_media CASCADE;
DROP TABLE IF EXISTS wish_list CASCADE;
DROP TABLE IF EXISTS invitation CASCADE;
DROP TABLE IF EXISTS "local";
DROP TABLE IF EXISTS collaborators_event;



--CREATE TABLES

CREATE TABLE "local" (
    local_id SERIAL PRIMARY KEY,
    name TEXT NOT NULL, 
    coordinates TEXT
);

CREATE TABLE "file" (
    file_id SERIAL PRIMARY KEY,
    url TEXT NOT NULL CONSTRAINT file_url_uk UNIQUE
);

CREATE TABLE photo (
    photo_id INTEGER NOT NULL REFERENCES "file" (file_id) ON UPDATE CASCADE,
    PRIMARY KEY (photo_id)
);

CREATE TABLE "user" (
    id SERIAL PRIMARY KEY,
    email text NOT NULL UNIQUE,
    name text NOT NULL,
    password text NOT NULL
);

CREATE TABLE artist (
    user_id INTEGER NOT NULL UNIQUE REFERENCES "user" (id) ON UPDATE SET NULL,
    about text,
    admin BOOLEAN,
	PRIMARY KEY (user_id)
);


CREATE TABLE "event" (
    event_id SERIAL PRIMARY KEY,
    title TEXT NOT NULL,
    details TEXT,
    start_date TIMESTAMP NOT NULL,
    end_date TIMESTAMP NOT NULL,
    local INTEGER NOT NULL REFERENCES "local" (local_id) ON UPDATE SET NULL,
    photo INTEGER REFERENCES photo (photo_id) ON UPDATE SET NULL,
    TYPE event_type NOT NULL,
    owner_id INTEGER NOT NULL REFERENCES artist (user_id),
    CONSTRAINT valid_date CHECK (start_date < end_date)
);

CREATE TABLE social_media (
    social_media_id SERIAL PRIMARY KEY,
    name TEXT NOT NULL,
    url TEXT NOT NULL
);

CREATE TABLE tag (
    tags_id SERIAL PRIMARY KEY,
    name TEXT NOT NULL CONSTRAINT tag_name_uk UNIQUE
);


CREATE TABLE event_tag (
    event_id INTEGER NOT NULL REFERENCES event (event_id) ON UPDATE CASCADE,
    id_event_tags INTEGER NOT NULL REFERENCES tag (tags_id) ON UPDATE SET NULL,
    PRIMARY KEY (event_id, id_event_tags)
);

CREATE TABLE post (
    post_id SERIAL PRIMARY KEY,
    file_id INTEGER REFERENCES "file" (file_id) ON UPDATE SET NULL,
    content TEXT,
    date DATE NOT NULL DEFAULT CURRENT_DATE,
    post_time TIMESTAMP WITH TIME zone NOT NULL DEFAULT current_timestamp,
    event_id INTEGER NOT NULL REFERENCES "event" (event_id) ON UPDATE CASCADE,
    user_id INTEGER NOT NULL REFERENCES artist (user_id) ON UPDATE SET NULL
);

CREATE TABLE review (
    event_id INTEGER REFERENCES "event" (event_id) ON UPDATE CASCADE,
    user_id INTEGER REFERENCES artist (user_id) ON UPDATE SET NULL,
    score INTEGER,
    CONSTRAINT score_positive CHECK (score > 0),
    PRIMARY KEY (event_id, user_id)
);

CREATE TABLE collaborators_event (
    event_id INTEGER REFERENCES "event" (event_id) ON UPDATE CASCADE,
    user_id INTEGER REFERENCES artist (user_id) ON UPDATE SET NULL,
    PRIMARY KEY (event_id, user_id)
);

CREATE TABLE event_social_media (
    event_id INTEGER REFERENCES "event" ON UPDATE CASCADE,
    social_media_id INTEGER REFERENCES social_media ON UPDATE SET NULL,
    PRIMARY KEY (event_id, social_media_id)
);

CREATE TABLE wish_list (
    event_id INTEGER REFERENCES "event" ON UPDATE SET NULL,
    user_id INTEGER REFERENCES artist ON UPDATE SET NULL,
    PRIMARY KEY (event_id, user_id)
);

CREATE TABLE invitation (
    invitation_id SERIAL PRIMARY KEY,
    event_id INTEGER REFERENCES "event" (event_id) ON UPDATE CASCADE,
    invited_id INTEGER REFERENCES artist (user_id) ON UPDATE SET NULL,
    inviter_id INTEGER REFERENCES artist (user_id) ON UPDATE SET NULL,
    message TEXT NOT NULL,
    date DATE NOT NULL DEFAULT CURRENT_DATE,
    accepted BOOLEAN
);

ALTER TABLE "file" DROP CONSTRAINT IF EXISTS file_url_uk;
ALTER TABLE tag DROP CONSTRAINT IF EXISTS tag_name_uk;
ALTER TABLE "file" ADD CONSTRAINT file_url_uk UNIQUE (url);
ALTER TABLE tag ADD CONSTRAINT tag_name_uk  UNIQUE (tags_id);

--TRIGGERS

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
	