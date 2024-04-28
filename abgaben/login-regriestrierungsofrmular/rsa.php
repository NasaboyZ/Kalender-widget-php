<?php
// Generiere Schlüsselpaar
$key_pair = openssl_pkey_new(array(
    'private_key_bits' => 2048,
    'private_key_type' => OPENSSL_KEYTYPE_RSA,
));

// Extrahiere öffentlichen Schlüssel
openssl_pkey_export($key_pair, $private_key);
$public_key_details = openssl_pkey_get_details($key_pair);
$public_key = $public_key_details['key'];

// Daten, die verschlüsselt werden sollen
$data = "Hello, world!";

// Verschlüssele Daten mit dem öffentlichen Schlüssel
openssl_public_encrypt($data, $encrypted_data, $public_key);

// Entschlüssele Daten mit dem privaten Schlüssel
openssl_private_decrypt($encrypted_data, $decrypted_data, $private_key);

echo "Originaldaten: $data<br>";
echo "Verschlüsselte Daten: " . base64_encode($encrypted_data) . "<br>";
echo "Entschlüsselte Daten: $decrypted_data";
?>
