# Pusar PHP Client


### PHP

1. Install package
```
composer require zuramai/pusar-php
```

2. Menggunakan library Pusar
```php
require_once __DIR__ . '/../vendor/autoload.php';
use Zuramai\\Pusar\\ Pusar;

try {
    $pusar = new Pusar(
        WEBSOCKET_URL
        APP_ID,
        API_KEY,
        API_SECRET
    );
}catch(Exception $e) {
    // Pesan jika gagal koneksi ke socket server Pusar 
    echo $e->getMessage();
}
```

3. Broadcast message 

```
// Format:
// $pusar->trigger(CHANNEL, EVENT, DATA);

// Contoh:
$pusar->trigger("transaction", "buy-voucher-success", [
    'current_balance' => 10000, 
    'product' => 'Pulsa Telkomsel 10000'
]);
```
