<article id="section-install">
    <h1>Installation</h1>

    <section>
        <p>Aegaeon is a java app. To run it, you basically need a servlet container. Tomcat, jetty, Wildfly, weblogic (my condolences) or any
        other should work. Being a Spring Boot application, you can also use boot's embedded server.</p>
    </section>

    <section id="section-install-requisites">
        <h2>Requisites</h2>
        <p>To run Aegaeon, you will need : </p>
        <ul>
            <li>A MySQL database</li>
            <li>A java server (I use tomcat)</li>
            <li>An HTTP server (I use nginx)</li>
        </ul>
        <p>PostgreSQL could probably be used instead of MySQL but is untested currently.</p>
    </section>

    <section id="section-install-buildit">
        <h2>Building Aegaeon</h2>
        <p>
            Aegaeon is open source and available under Apache 2.0 license. If you want to build it, grab the source from Github using git :
        </p>
        <p class="code-block">
            git clone https://github.com/n4devca/aegaeon.git
        </p>
        <p>
            After downloading the source, use maven to create a deployable war :
        </p>
        <p class="code-block">
            cd aegaeon && mvn -DskipTests package
        </p>
        <p>You will find the war under target directory.</p>
    </section>

    <section id="section-install-download">
        <h2>Download prebuild</h2>
        <p>
            You can get prebuild release on Github: <a href="https://github.com/n4devca/aegaeon/releases" target="_blank">https://github.com/n4devca/aegaeon/releases</a>.
        </p>
    </section>
</article>