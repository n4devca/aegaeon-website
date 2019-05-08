# Configuration

Aegaeon has multiple configuration flags allowing you to enable or disable parts of the server.

There are many ways to set these flags: command line, tomcat **Environment** variable, custom application.yml, etc.

## Flags

| Name | Description | Mandatory | Value | Default |
| ---- | ----------- | --------- | ------ | ------- |
| aegaeon.jwks | JSON Web Keys (JWK) to use. | Yes | String (/path/to/your/keys.jwks) | - |
| aegaeon.info.serverName | The name and title of this server. | No | String | Aegaeon |
| aegaeon.info.issuer | Identity of your authorization server. | Yes | String/URL | - |
| aegaeon.info.logoUrl| Your server's logo. | No | String/URL | None |
| aegaeon.info.legalEntity | The legal entity behind this server. | No | String | None |
| aegaeon.info.privacyPolicy | Your privacy policy. | No | String/URL | None |
| aegaeon.info.customStyleSheet | A custom style sheet to change Aegaeon styling | No | String/URL | None |
| aegaeon.modules.account | Enable user profile page. | No | true or false | true |
| aegaeon.modules.admin | Enable openid client configuration page. | No | true or false | true |
| aegaeon.modules.createaccount | Enable user sign-up page. | No | true or false | true |
| aegaeon.modules.home| Enable Aegaeon's homepage. If this value is false, login page is the home page. | No | true or false | false |
| aegaeon.modules.information | Enable information and configuration endpoints.<sup>1</sup> | No | true or false | true |
| aegaeon.modules.introspect | Enable OAuth 2.0 introspect endpoint.<sup>2</sup> | No | true or false | false |
| aegaeon.modules.login | Enable user's login page.<sup>3</sup> | No | true or false | true |
| aegaeon.modules.oauth | Enable OAuth token endpoint.<sup>4</sup> | No | true or false | true |


**<sup>1</sup>** Information endpoint is used by client to know how they should interact with your server. More information here: [https://openid.net/specs/openid-connect-discovery-1_0.html](https://openid.net/specs/openid-connect-discovery-1_0.html)

**<sup>2</sup>** Introspect endpoint allows resource server to validate access token without parsing them. More information here: [https://tools.ietf.org/html/rfc7662](https://tools.ietf.org/html/rfc7662)

**<sup>3</sup>** You could technically delegate the login to another third party system and use Aegaeon as a simple token provider. Not implemeted yet.

**<sup>4</sup>** You could technically disable the token endpoint completely leaving only implicit flow from authorization endpoint.

## Example

Here is an example using tomcat's environment variable in the context.xml file:

```xml
<?xml version="1.0" encoding="UTF-8"?>

    <Resource name="jdbc/aegaeon"
    ...
    />

    <Environment name="aegaeon.jwks" type="java.lang.String" value="/opt/jwks/aegaeon.jwks"/>
    <Environment name="aegaeon.info.serverName" type="java.lang.String" value="Aegaeon" />
    <Environment name="aegaeon.info.issuer" type="java.lang.String" value="https://aegaeon.n4dev.ca"/>
    <Environment name="aegaeon.modules.home" type="java.lang.String" value="false" />
    <Environment name="aegaeon.modules.introspect" type="java.lang.String" value="true" />

</Context>
```

