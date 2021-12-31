<?php
require_once 'autoload.php';

/**
----------------------------------------------------------------------------------
//De esta forma consumimos por metodo GET los datos presenciados en la URL anclada
//¿Devuelve un json?
----------------------------------------------------------------------------------
$ch = curl_init();

//El tercer parametro va la direccion URL
curl_setopt($ch, CURLOPT_URL, 'https://pagina.in/api/user/2');

curl_exec($ch);

if(curl_errno($ch)) echo curl_error($ch);

curl_close($ch);
*/

/**
//----------------------------------------------------------------------------------
//De esta forma consumimos por metodo GET los datos presenciados en la URL anclada
//Genera un array asociativo del json extraido
//----------------------------------------------------------------------------------
$ch = curl_init();

//El tercer parametro va la direccion URL
curl_setopt($ch, CURLOPT_URL, 'https://pagina.in/api/user/2');

curl_exec($ch);

if(curl_errno($ch)) echo curl_error($ch);
else $decoded = json_decode($response, true);
var_dump($decoded);

curl_close($ch);
 */
/**
//----------------------------------------------------------------------------------
//De esta forma generamos una peticion POST
//----------------------------------------------------------------------------------
$ch = curl_init();

$array = [
    'name'=>'Emilio',
    'Job' => 'Programer'
];

curl_setopt($ch, CURLOPT_URL, 'https://pagina.in/api/user');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_exec($ch);

if(curl_errno($ch)) echo curl_error($ch);
else $decoded = json_decode($response, true);

foreach ($decoded as $index => $value){
    echo "$index: $value";
}

curl_close($ch);
 */
/**
//----------------------------------------------------------------------------------
//De esta forma generamos una peticion PATCH O PUT
//-----------------------------------------------------------------------------------

$ch = curl_init();

$array = [
    'name'=>'Emilio',
    'Job' => 'Programer'
];

curl_setopt($ch, CURLOPT_URL, 'https://pagina.in/api/user');
curl_setopt($ch, CURLOPT_POST, 'PATCH');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_exec($ch);

if(curl_errno($ch)) echo curl_error($ch);
else $decoded = json_decode($response, true);

foreach ($decoded as $index => $value){
    echo "$index: $value";
}

curl_close($ch);

 */

use App\Classes\Curl;

$curl = new Curl('https://pagina.in/api/users');

$array = [
    'name' => 'Andres Arenas',
    'Job' => 'Web developer'
];

$response = $curl->init()->setOption()->setOption(CURLOPT_POST, true)->buildQuery($array)->setOption(CURLOPT_RETURNTRANSFER, true)->decode()->fetch();
/**
foreach($response as $index => $indez)
{
    echo "$index->name : $indez";
}
*/

echo "
<b>Id:</b>
$response->id
<br>
<b>Name:</b>
$response->name
<br>
<b>Job:</b>
$response->job
<br>
<b>Created at:</b>
$response->createdAt
<br>
";