# API-TWITTER

twiiter-api
Api de twitter en PHP

#Requerimientos:
Abrir twitter 

En la carpeta antes mencionada está el proyecto de la Api de twitter en PHP. 


En la carpeta se encuentran los archivos necesarios para ejecutar nuestra Aplicacion que nos permite visualizar el contenido de un perfil en twitter medinte claves de acceso.

#Instalación:
Normalmente: Si usted no utiliza el compositor, simplemente se debe incluir TwitterAPIExchange.php en su aplicación.

#Como usar:
Incluya el archivo de clase require_once('TwitterAPIExchange.php');

Set access tokens $settings = array( 'oauth_access_token' => "YOUR_OAUTH_ACCESS_TOKEN", 'oauth_access_token_secret' => "YOUR_OAUTH_ACCESS_TOKEN_SECRET", 'consumer_key' => "YOUR_CONSUMER_KEY", 'consumer_secret' => "YOUR_CONSUMER_SECRET" );

Elija URL y Solicitud Método $url = 'https://api.twitter.com/1.1/blocks/create.json'; $requestMethod = 'POST';

Elija los campos del POST $postfields = array( 'screen_name' => 'usernameToBlock', 'skip_status' => '1' );

Realizar la petición! $twitter = new TwitterAPIExchange($settings); echo $twitter->buildOauth($url, $requestMethod) ->setPostfields($postfields) ->performRequest();

#Obtener solicitud
Establezca el campo GET ANTES de llamar buildOauth (); y todo lo demás es el mismo: $url = 'https://api.twitter.com/1.1/followers/ids.json'; $getfield = '?screen_name=vBurgOsA'; $requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings); echo $twitter->setGetfield($getfield) ->buildOauth($url, $requestMethod) ->performRequest();

Eso es! Realmente simple, funciona muy bien con la API 1.1. Gracias a @ lackovic10 yrivers el SO y J7mbo!
