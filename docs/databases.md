# Database

Aegaeon needs a relational database to work properly.
Current Aegaeon release only supports MySQL 5.7 and PostgreSQL 11 but other databases may be used if you are willing to adapt
model creation script (contributions are welcome).

The recipes below are simple database setup with a single user. There are multiple way to setup Aegaeon and mostly depends on your
infrastructure requirements, security and ressources. Being your user's repository and authorization mechanism, you should consider
carefully your user, schema and deployment model.

Whatever database you may choosed, you will need to apply each database revision files in order.
If you look into release archive, you will find SQL scripts named:

```
VX.Y.Z__Description.sql
```

Where **X.Y** is Aegaeon's release and **Z** the database script number. SQL files need to be applied in order.
You can apply each file manually with your favorite SQL client or used flyway, a version control tool for your database.

More information here: [https://flywaydb.org/](https://flywaydb.org/)


## MySQL

Aegaeon is tested with MySQL 5.7 but should also work on older versions or with other MySQL compatibles projects like MariaDB and Percona Server.

First, connect to your database as root or with a user with enough permissions to create users, schemas and grant permissions.

    $ mysql -u root -p

From there, create one user:

    CREATE USER 'aegaeon_server'@'localhost' IDENTIFIED BY 'password';

Change 'password' and note it for later.

Create a schema for Aegaeon and grant permissions to the your user created previously:

    CREATE DATABASE aegaeon_db DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
    GRANT ALTER, CREATE, EXECUTE, DELETE, DROP, INDEX, INSERT, SELECT, TRIGGER, UPDATE ON aegaeon_db.* TO 'aegaeon_server'@'localhost';
    FLUSH PRIVILEGES;

Finally, you can connect to your new database:

    $ mysql -u aegaeon_server -p aegaeon_db

The last step is to apply each SQL revision file you may find in sql/mysql folder in aegaeon release archive.
Connect to your database with aegaeon_server user and run each file in the proper sequence.

## PostgreSQL

Aegaeon is tested with PostgreSQL 11 but should also work with older versions.

First, connect to your PostgreSQL database with a user having enough permissions to create role, database and schema.

Then, create a database and connect to it:

    create database aegaeon_db;
    \c aegaeon_db

We will create a role and a schema for Aegaeon. The model and data will be contain in this schema.

    CREATE ROLE aegaeon_server with LOGIN PASSWORD 'password';
    GRANT connect on database aegaeon_db to aegaeon_server;
    CREATE SCHEMA authorization aegaeon_server;
    GRANT usage on schema aegaeon_server to aegaeon_server;

Change 'password' and note it for later.

Finally, you can connect to your new schema:

    $ psql -U aegaeon_server -d aegaeon_db

The last step is to apply each SQL revision file you may find in sql/mysql folder in aegaeon release archive.
Connect to your database with aegaeon_server user and run each file in the proper sequence.

