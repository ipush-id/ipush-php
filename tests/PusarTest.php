<?php

use PHPUnit\Framework\TestCase;
use Zuramai\Pusar\Pusar;

final class PusarTest extends TestCase
{
    public $url =  "ws://localhost:3000/ws";
    public function testWebsocketConnection()
    {
        try {
            $pusar = new Pusar(
                $this->url,
                "bbd491a8-796f-437f-927c-a84c753fd675",
                "9c93918ad6aa1c02c8add0785fca515031257126f639b8ae7269d593",
                "15dc3a68771251b56b65e3665dd59dc169859724f4ddcf6efe36fff1"
            );
            $pusar->trigger("test", "test", ['balance' => 10000]);
        } catch (Exception $e) {
            // Pesan jika gagal koneksi ke socket server Pusar 
            $this->fail($e->getMessage());
        }
    }
    // public function testWebsocketConnectionError()
    // {
    //     try {
    //         $pusar = new Pusar($this->url, "", "", "");
    //         $pusar->trigger("test", "test", ['balance' => 10000]);
    //     } catch (Exception $e) {
    //         // Pesan jika gagal koneksi ke socket server Pusar 
    //         $this->fail($e->getMessage());
    //     }
    // }
}
