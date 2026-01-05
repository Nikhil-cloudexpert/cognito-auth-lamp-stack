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
    $result = $client->signUp([
        'ClientId' => $config['app_client_id'],
        'Username' => $email,
        'Password' => $password,
        'UserAttributes' => [
            [
                'Name' => 'email',
                'Value' => $email
            ]
        ]
    ]);

    echo "Signup successful. Check your email for confirmation code.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
