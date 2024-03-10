# Ipush PHP Client

### PHP

1. Install package
```
composer require zuramai/ipush-php
```

2. Menggunakan library Ipush
```php
require_once __DIR__ . '/../vendor/autoload.php';
use Ipush\\Ipush\\ Ipush;

try {
    $ipush = new Ipush(
        WEBSOCKET_URL
        APP_ID,
        API_KEY,
        API_SECRET
    );
}catch(Exception $e) {
    // Pesan jika gagal koneksi ke socket server Ipush 
    echo $e->getMessage();
}
```

3. Broadcast message 

```
// Format:
// $ipush->trigger(CHANNEL, EVENT, DATA);

// Contoh:
$ipush->trigger("transaction", "buy-voucher-success", [
    'current_balance' => 10000, 
    'product' => 'Pulsa Telkomsel 10000'
]);
```
