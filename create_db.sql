--TYPES

CREATE TYPE event_type AS ENUM ('private', 'public');


--PREPARE

DROP TABLE IF EXISTS "User";
DROP TABLE IF EXISTS "Artist";


--CREATE TABLES

CREATE TABLE "User" (
    id SERIAL PRIMARY KEY,
    email text NOT NULL CONSTRAINT user_email_uk UNIQUE,
    name text NOT NULL,
    password text NOT NULL
);

CREATE TABLE "Artist" (
    user_id INTEGER NOT NULL REFERENCES "User" (id) ON UPDATE CASCADE,
    about text
);

CREATE TABLE "Admin" (
    user_id INTEGER NOT NULL REFERENCES "User" (id) ON UPDATE CASCADE
)
