# Tomcat Installation

To setup tomcat, we will configure the context to include the connection to your database and some parameters
used by Aegaeon.

If it is not done yet, download the latest release from [apache tomcat website](https://tomcat.apache.org/).

Uncompress the archive inside a folder of your choice.

Using a text editor, open the file context.xml in conf/ folder.

Add a jdbc connection to your database. It sould look like this:

    <Resource name="jdbc/aegaeon"
          auth="Container"
          type="javax.sql.DataSource"
          factory="org.apache.tomcat.jdbc.pool.DataSourceFactory"
          username="aegaeon_server"
          password="password"
          driverClassName="com.mysql.cj.jdbc.Driver"
          url="jdbc:mysql://localhost:3306/aegaeon_db"/>

<p class="alert alert-info">
    The resource above use MySQL driver. If you are using PostgreSQL, you need to use a different driver. This is a very minimal
    jdbc connection setup. I highly recommend you to check tomcat's connection pool documentation to setup a maximum number of connections
    and other important properties of your database connection.
</p>