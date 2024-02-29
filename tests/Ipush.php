<?php

use PHPUnit\Framework\TestCase;
use Zuramai\Ipush\Ipush;

final class IpushTest extends TestCase
{
    public $url =  "ws://localhost:3000/ws";
    public function testWebsocketConnection()
    {
        try {
            $ipush = new Ipush(
                $this->url,
                "bbd491a8-796f-437f-927c-a84c753fd675",
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
