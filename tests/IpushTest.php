<?php

require_once __DIR__ . "/../src/Ipush.php";

use PHPUnit\Framework\TestCase;
use Ipush\Ipush;

final class IpushTest extends TestCase
{
    public $url =  "wss://api.ipush.id/ws";
    public function testWebsocketConnection()
    {
        try {
            $ipush = new Ipush(
                $this->url,
                "970a7dd0-cb3b-4c9f-bfed-da1d6b4b40c2",
                "9c93918ad6aa1c02c8add0785fca515031257126f639b8ae7269d593",
                "15dc3a68771251b56b65e3665dd59dc169859724f4ddcf6efe36fff1"
            );
            $ipush->trigger("test", "test", ['balance' => 10000]);
        } catch (Exception $e) {
            // Pesan jika gagal koneksi ke socket server ipush 
            $this->fail($e->getMessage());
        }
    }
    // public function testWebsocketConnectionError()
    // {
    //     try {
    //         $ipush = new ipush($this->url, "", "", "");
    //         $ipush->trigger("test", "test", ['balance' => 10000]);
    //     } catch (Exception $e) {
    //         // Pesan jika gagal koneksi ke socket server ipush 
    //         $this->fail($e->getMessage());
    //     }
    // }
}
