# PostgreSQL with Docker

## Introduction

This README describes how to initiate the setup the development environment for LBAW 2019/20.
These instructions address the development with a local environment, i.e. on the machine (that can be a VM) without using a Docker container for PHP.
Containers are used for PostgreSQL and pgAdmin, though.

The template was prepared to run on Linux 18.04LTS, but it should be fairly easy to follow and adapt for other operating systems.

* [Installing Docker and Docker Compose](#installing-docker-and-docker-compose)
* [Working with PostgreSQL](#working-with-postgresql)

## Installing Docker and Docker Compose

Firstly, you'll need to have __Docker__ and __Docker Compose__ installed on your PC.
The official instructions are in [Install Docker](https://docs.docker.com/install/) and in [Install Docker Compose](https://docs.docker.com/compose/install/#install-compose).
It resumes to executing the commands:

    # install docker-ce **if needed**
    sudo apt-get update
    sudo apt-get install apt-transport-https ca-certificates curl software-properties-common
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
    sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
    sudo apt-get update
    sudo apt-get install docker-ce
    docker run hello-world # make sure that the installation worked

    # **optionally** add your user to the docker group by using a terminal to run:
    sudo usermod -aG docker $USER
    # sign out and back in again so this setting takes effect.

    # install docker-compose
    sudo curl -L "https://github.com/docker/compose/releases/download/1.25.3/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
    sudo chmod +x /usr/local/bin/docker-compose
    docker-compose --version # verify that you have Docker Compose installed.


## Working with PostgreSQL

We've created a _docker-compose_ file that sets up __PostgreSQL9.4__ and __pgAdmin4__ to run as local Docker containers.

From the project root issue the following command:

    docker-compose up

This will start the database and the pgAdmin4 tool images as two independent docker containers.

[//]: # (The database's username is _postgres_ and the password is _pg!lol!2020_.)

You can hit http://localhost:5050 to access __pgAdmin4__ and manage your database.
Use the following credentials to login:

    Email: postgres
    Password: pg!lol!2020

In the first usage, you will need to add a new Server using the following attributes<sup>1</sup>:

    hostname: postgres
    username: postgres
    password: pg!lol!2020

<sup>1</sup>Hostname is _postgres_ instead of _localhost_ since _Docker composer_ creates an internal DNS entry to facilitate the connection between linked containers.
