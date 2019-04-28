<article id="section-setup">
    <h1>Setup</h1>

    <section id="section-setup-modules">
        <h2>Aegaeon Modules</h2>
        <p>
            Aegaeon use spring @ConditionalOnProperty annotation to allow you to disable part of the server you may not need.
        </p>
        <p>
            Features are grouped under different modules. Each module can be controlled by editing spring's boot application.yml or from the command line.
        </p>
        <p>
            Modules are :
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Default</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>oauth</td>
                    <td>Openid / OAuth authorization and token endpoint.</td>
                    <td>Enable</td>
                </tr>
                <tr>
                    <td>login</td>
                    <td>Enable the login page.</td>
                    <td>Enable</td>
                </tr>
                <tr>
                    <td>information</td>
                    <td>Enable the information endpoints (jwk publishing and server info).</td>
                    <td>Enable</td>
                </tr>
                <tr>
                    <td>home</td>
                    <td>Enable the home page.</td>
                    <td>Disable</td>
                </tr>
                <tr>
                    <td>account</td>
                    <td>Enable the user account management.</td>
                    <td>Disable</td>
                </tr>
                <tr>
                    <td>admin</td>
                    <td>Enable clients and users administration.</td>
                    <td>Disable</td>
                </tr>
                <tr>
                    <td>introspect</td>
                    <td>Enable the introspect endpoint.</td>
                    <td>Disable</td>
                </tr>
            </tbody>
        </table>
        <p>
            To enable or disable a module using the application.yml, simply fetch the source, open the file <i>src/main/resources/application.yml</i>
            and set your module to true or false under <i>aegaeon: modules:</i> section.
        </p>
        <p>
            When completed, rebuild Aegaeon with maven (see <a href="#section-install-buildit">Build it</a>).
        </p>
        <p>
            If prefer to run prebuild war file, building Aegaeon to change a module can be inconvenient. Instead, you may use command line arguments to enable or disable
            one or more modules.
        </p>
        <p>
            Beeing a spring's boot application, there are many way to change configuration values at runtime. See here for a complete
            list : <a href="https://docs.spring.io/spring-boot/docs/current/reference/html/boot-features-external-config.html" target="_blank">Externalized Configuration - Spring Boot</a>
        </p>
        <p>
        An example :
        </p>
        <p class="code-block">
            <span class="code-caption">Command Line</span>
            start.sh --aegaeon.modules.login=false
        </p>
    </section>

    <section id="section-setup-keys">
        <h2>JWT token keys</h2>
        <p>
            Following successful authentication and authorization, an openid server create tokens and return these tokens to one of your client to be consume
            by your resource server. These tokens are usually created using some cryptographic algorithm.
        </p>
        <p>
            A set of public/private keys is required by Aegaeon to generate these tokens correctly. Future version will include a setup wizard allowing
            you to create keys automatically but you need to do it by youself currently. Fortunately, there is a convenient project called
            <a href="https://github.com/mitreid-connect/json-web-key-generator" target="_blank">json-web-key-generator</a> you can use to create your key file.
        </p>
        <p>
            Please follow these steps (you can rename mykeys.jwks):
        </p>
        <p class="code-block">
            <span class="code-caption">clone project</span>
            git clone https://github.com/mitreid-connect/json-web-key-generator.git
        </p>
        <p class="code-block">
            <span class="code-caption">compile sources</span>
            cd json-web-key-generator && mvn -DskipTests package
        </p>
        <p class="code-block">
            <span class="code-caption">create keys</span>
            <span>cd target</span>
            <span>java -jar json-web-key-generator-0.4-SNAPSHOT-jar-with-dependencies.jar -i HMAC -t oct -s 512 -S -o mykeys.jwks</span>
            <span>java -jar json-web-key-generator-0.4-SNAPSHOT-jar-with-dependencies.jar -i RSA -t RSA -s 2048 -S -o mykeys.jwks</span>
        </p>
        <p>
            Move the jwks file to another folder and note the path.
        </p>
    </section>

    <section id="section-setup-db">
        <h2>Database</h2>
        <div class="message">
            Installing MariaDB, creating a schema and a user is not covered by this documentation. Please consult MariaDB website if you need help.
        </div>
        <p>
            Database schema are maintained using Flyway (<a href="https://flywaydb.org/" target="_blank">more info here</a>).
            You can either install flyway to run the SQL files, execute each file by hand or ask Aegaeon to automatically create its schema.
        </p>
        <p>The first solution is to use flyway directly:</p>
        <p class="code-block">
            flyway -user=your_user -password=your_password -schemas=your_aegaeon_schema -locations=aegaeon_folder/aegaeon-api/src/main/resources/db/mysql migrate
        </p>
        <p>If you choose the second solution, you can use mysql command line or a SQL ide.</p>
        <p>If you want to let aegaeon create the schema automatically, simply add the following argument to tomcat startup script (see below).</p>
        <p class="code-block">
            --flyway.enable=false
        </p>
    </section>

    <section id="section-setup-tomcat">
        <h2>Tomcat</h2>
        <p>You should now have a war file, a jwks key file and an available database schema. Next step is to deploy the build.</p>
        <p>To start properly, Aegaeon relies on some information you need to add to tomcat's context file. Aegaeon then use jdni to inject
        these property and complete its initialization.
        </p>
        <p></p>
    </section>
</article>