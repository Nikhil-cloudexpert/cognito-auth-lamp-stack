<?php

require '../vendor/autoload.php';

use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;

$config = require '../config/cognito.php';

$client = new CognitoIdentityProviderClient([
    'region' => $config['region'],
    'version' => 'latest'
]);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    echo "Email and password are required";
    exit;
}

try {
    $result = $client->initiateAuth([
        'AuthFlow' => 'USER_PASSWORD_AUTH',
        'ClientId' => $config['app_client_id'],
        'AuthParameters' => [
            'USERNAME' => $email,
            'PASSWORD' => $password
        ]
    ]);

    $tokens = $result['AuthenticationResult'];

    echo "Login successful\n\n";
    echo "ID Token:\n" . $tokens['IdToken'] . "\n\n";
    echo "Access Token:\n" . $tokens['AccessToken'] . "\n\n";
    echo "Refresh Token:\n" . $tokens['RefreshToken'];

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
