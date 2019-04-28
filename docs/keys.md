# JWK Keys

To work properly, Aegaeon needs JSON Web Keys (JWK).
These keys are used to generate the id and access tokens given to client after a successful authorization.

To generate it, you can use one of these:

- an command line key generator [https://github.com/mitreid-connect/json-web-key-generator](https://github.com/mitreid-connect/json-web-key-generator)
- an online version available at [https://mkjwk.org/](https://mkjwk.org/)

My suggestion is :

- Use the online key generator for development and test.
- Use the offline / stand alone key generator to create keys used by your production instance.

Either way, generate your web keys and move the resulting file somewhere safe.