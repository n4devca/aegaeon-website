# JWK Keys

Aegaeon relies on JSON Web Keys (JWK) to generate the *ID* and *Access token* given to clients after a successful authorization by one of your user.

JSON Web Keys can be created with:

- an command line key generator [https://github.com/mitreid-connect/json-web-key-generator](https://github.com/mitreid-connect/json-web-key-generator)
- an online version available at [https://mkjwk.org/](https://mkjwk.org/)

My suggestion is:

- Use the online key generator for development and test.
- Use the offline / stand alone key generator to create keys used by your production instance.

Either way, generate your web keys and move the resulting file somewhere safe.

See here for more informations:
[https://connect2id.com/products/nimbus-jose-jwt/algorithm-selection-guide](https://connect2id.com/products/nimbus-jose-jwt/algorithm-selection-guide)