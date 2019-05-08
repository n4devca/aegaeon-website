# Frequently Asked Questions

1. What do I need to install and run Aegaeon?

    You need java 8, a database (MySQL or PostgreSQL) and a java application server (tomcat, jetty, etc).

2. How much memory is needed to run Aegaeon ?

    It depends on how many users and applications you plan to support. Minimally, you will need 512 mb assigned to your JVM.

3. Is Aegaeon free ?

    Aegaeon is available under the Apache 2.0 license. It is free and open source. You can read the license [here](license.md).

4. Can I run multiple instances of Aegaeon (clustering) ?

    Current alpha does not support clustering. Clustering is plan for next beta release.

5. Can I run Aegaeon using Docker ?

    Sure! If you do, please contribute your Docker file.

6. Can I run Aegaeon in production ?

    I would not recommend it. Aegaeon is still under development and is not considered stable yet.

7. Which OpenID / OAuth flow is supported ?

    The following flows are supported: Implicit, Authorization code, refresh token and client credential.

8. I found a bug / I want to contribute!

    Contribution and bug reports are welcome! Please open an issue on [Github](https://github.com/n4devca/aegaeon/issues).