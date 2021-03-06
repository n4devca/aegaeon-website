# Database

Aegaeon needs a relational database to work properly.
Currently, only MySQL 5.7 and PostgreSQL 11 are supported but another database may be used if you are willing to adapt
model creation scripts (contributions are welcome).

The recipe below is a simple database setup with a single user. There are multiple ways to setup Aegaeon and mostly depends on your
infrastructure requirements, security and ressources.

You should always carefully consider your users, schema and deployment model.

Whatever database you may choose, you will need to apply each database revision files in the right order.
If you look into release archive, you will find SQL scripts named like this:

```
VX.Y.Z__Description.sql
```

**X.Y** is Aegaeon's release number and **Z** the database script number. SQL files need to be applied in order.
You can apply each file manually with your favorite SQL client or used flyway, a version control tool for your database.

More information here: [https://flywaydb.org/](https://flywaydb.org/)


## MySQL

Aegaeon is tested with MySQL 5.7 but should also work on older versions or with other MySQL compatible projects like MariaDB and Percona Server.

First, connect to your database as root:

    $ mysql -u root -p

From there, create one user:

    CREATE USER 'aegaeon_server'@'localhost' IDENTIFIED BY 'password';

Change 'password' and note it for later.

Create a schema for Aegaeon and grant necessary permissions to the your user:

    CREATE DATABASE aegaeon_db DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
    GRANT ALTER, CREATE, EXECUTE, DELETE, DROP, INDEX, INSERT, SELECT, TRIGGER, UPDATE ON aegaeon_db.* TO 'aegaeon_server'@'localhost';
    FLUSH PRIVILEGES;

Finally, you can connect to your new database:

    $ mysql -u aegaeon_server -p aegaeon_db

The last step is to apply each SQL revision files you may find in /model/mysql folder in aegaeon release archive.
Connect to your database with aegaeon_server user and run each file in the right sequence.

## PostgreSQL

Aegaeon is tested with PostgreSQL 11 but should also work with older versions.

First, connect to your PostgreSQL database with a user having enough permissions to create roles, databases and schemas.

Then, create a database and connect to it:

    create database aegaeon_db;
    \c aegaeon_db

We will create a role and a schema for Aegaeon. The model and data will be contained in this schema.

    CREATE ROLE aegaeon_server with LOGIN PASSWORD 'password';
    GRANT connect on database aegaeon_db to aegaeon_server;
    CREATE SCHEMA authorization aegaeon_server;
    GRANT usage on schema aegaeon_server to aegaeon_server;

Change 'password' and note it for later.

Finally, you can connect to your new schema:

    $ psql -U aegaeon_server -d aegaeon_db

The last step is to apply each SQL revision file you may find in /model/postgresql folder in aegaeon release archive.
Connect to your database with aegaeon_server user and run each file in the right sequence.

