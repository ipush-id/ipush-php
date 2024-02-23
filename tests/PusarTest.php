<?php

use PHPUnit\Framework\TestCase;
use Zuramai\Pusar\Pusar;

final class PusarTest extends TestCase {
    public $url =  "ws://localhost:3000/ws";
    public function testWebsocketConnection()
    {
        try {
            $pusar = new Pusar(
                $this->url, 
                "5a23c696-03c3-42bf-918f-b0f0e97544e4",
                "5a23c696-03c3-42bf-918f-b0f0e97544e4",
                "5a23c696-03c3-42bf-918f-b0f0e97544e4"
            );
            $pusar->trigger("test", "test", ['balance' => 10000]);
        }catch(Exception $e) {
            // Pesan jika gagal koneksi ke socket server Pusar 
            $this->fail($e->getMessage());
        }
    }
}