--TYPES
DO $$ BEGIN
    CREATE TYPE event_type AS ENUM ('private', 'public');
EXCEPTION
    WHEN duplicate_object THEN null;
END $$;


--PREPARE

DROP TABLE IF EXISTS "Artist" CASCADE;
DROP TABLE IF EXISTS "User" CASCADE;
DROP TABLE IF EXISTS "Admin" CASCADE;
DROP TABLE IF EXISTS "Event" CASCADE;
DROP TABLE IF EXISTS "Social_Media" CASCADE;
DROP TABLE IF EXISTS "Tags" CASCADE;
DROP TABLE IF EXISTS "File" CASCADE;
DROP TABLE IF EXISTS "Photo" CASCADE;
DROP TABLE IF EXISTS "Event_Tags" CASCADE;
DROP TABLE IF EXISTS "Post" CASCADE;
DROP TABLE IF EXISTS "Review" CASCADE;
DROP TABLE IF EXISTS "Collaborators" CASCADE;
DROP TABLE IF EXISTS "Event_Social_Media" CASCADE;
DROP TABLE IF EXISTS "Wishlist" CASCADE;
DROP TABLE IF EXISTS "Invitation" CASCADE;



--CREATE TABLES

CREATE TABLE "User" (
    id SERIAL PRIMARY KEY,
    email text NOT NULL CONSTRAINT user_email_uk UNIQUE,
    name text NOT NULL,
    password text NOT NULL
);

CREATE TABLE "Artist" (
    user_id INTEGER NOT NULL REFERENCES "User" (id) ON UPDATE SET NULL,
    about text
);

CREATE TABLE "Admin" (
    user_id INTEGER NOT NULL REFERENCES "User" (id) ON UPDATE SET NULL
);

CREATE TABLE "Event" (
    event_id SERIAL PRIMARY KEY,
    title TEXT NOT NULL,
    details TEXT,
    start_date TIMESTAMP NOT NULL,
    end_date TIMESTAMP NOT NULL,
    local TEXT NOT NULL REFERENCES "Local" (local_id) ON UPDATE SET NULL,
    photo INTEGER REFERENCES "Photo" (photo_id) ON UPDATE SET NULL,
    TYPE event_type NOT NULL,
    owner_id INTEGER NOT NULL REFERENCES "Artist" (user_id)
    --constrait start_date // end_date
);


--Criar tipo coordinates????? 
CREATE TABLE "Local" (
    local_id SERIAL PRIMARY KEY,
    name TEXT NOT NULL, 
    coordinates TEXT
);

CREATE TABLE "Social_Media" (
    social_media_id SERIAL PRIMARY KEY,
    name TEXT NOT NULL,
    url TEXT NOT NULL
);

CREATE TABLE "Tags" (
    tags_id SERIAL PRIMARY KEY,
    name TEXT NOT NULL CONSTRAINT tag_name_uk UNIQUE
);

CREATE TABLE "File" (
    file_id SERIAL PRIMARY KEY,
    url TEXT NOT NULL CONSTRAINT file_url_uk UNIQUE
);

CREATE TABLE "Photo" (
    photo_id INTEGER NOT NULL REFERENCES "File" (file_id) ON UPDATE CASCADE,
    PRIMARY KEY (photo_id)
);

CREATE TABLE "Event_Tags" (
    event_id INTEGER NOT NULL REFERENCES "Event" (event_id) ON UPDATE CASCADE,
    id_event_tags INTEGER NOT NULL REFERENCES "Tags" (tags_id) ON UPDATE SET NULL,
    PRIMARY KEY (event_id, id_events_tags)
);

CREATE TABLE "Post" (
    post_id SERIAL PRIMARY KEY,
    file_id INTEGER REFERENCES "File" (file_id) ON UPDATE SET NULL,
    content TEXT,
    date DATE NOT NULL DEFAULT CURRENT_DATE,
    time TIMESTAMP NOT NULL DEFAULT CURRENT_TIME,
    event_id INTEGER NOT NULL REFERENCES "Event" (event_id) ON UPDATE CASCADE,
    user_id INTEGER NOT NULL REFERENCES "Artist" (user_id) ON UPDATE SET NULL
);

CREATE TABLE "Review" (
    event_id INTEGER REFERENCES "Event" (event_id) ON UPDATE CASCADE,
    user_id INTEGER REFERENCES "Artist" (user_id) ON UPDATE SET NULL,
    score INTEGER,
    CONSTRAINT score_positive CHECK (score > 0),
    PRIMARY KEY (event_id, user_id)
);

CREATE TABLE "Collaborators_Event" (
    event_id INTEGER REFERENCES "Event" (event_id) ON UPDATE CASCADE,
    user_id INTEGER REFERENCES "Artist" (user_id) ON UPDATE SET NULL,
    PRIMARY KEY (event_id, user_id)
);

CREATE TABLE "Event_SocialMedia" (
    event_id INTEGER REFERENCES "Event" ON UPDATE CASCADE,
    social_media_id INTEGER REFERENCES "Social_Media" ON UPDATE SET NULL,
    PRIMARY KEY (event_id, social_media_id)
);

CREATE TABLE "Wish_List" (
    event_id INTEGER REFERENCES "Event" ON UPDATE SET NULL,
    user_id INTEGER REFERENCES "Artist" ON UPDATE SET NULL,
    PRIMARY KEY (event_id, user_id)
);

CREATE TABLE "Invitation" (
    invitation_id SERIAL PRIMARY KEY,
    event_id INTEGER REFERENCES "Event" (event_id) ON UPDATE CASCADE,
    invited_id INTEGER REFERENCES "Artist" (user_id) ON UPDATE SET NULL,
    inviter_id INTEGER REFERENCES "Artist" (user_id) ON UPDATE SET NULL,
    message TEXT NOT NULL,
    date DATE NOT NULL DEFAULT CURRENT_DATE,
    accepted BOOLEAN
);