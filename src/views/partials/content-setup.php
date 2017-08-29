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
            To properly work, Aegaeon requires you to provide a set of public/private keys.
        </p>
    </section>
</article>