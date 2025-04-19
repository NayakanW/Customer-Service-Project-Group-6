<?php

namespace App\Services;

use LanguageDetection\Language;

/**
 * Service TicketLanguageDetector
 * 
 * Service ini mendeteksi bahasa yang digunakan dalam tiket.
 * 
 * Fitur:
 * 1. Deteksi bahasa otomatis dari konten tiket
 * 2. Pengaturan bahasa untuk tiket baru
 * 3. Integrasi dengan sistem multi-bahasa
 * 4. Penanganan bahasa default
 */
class TicketLanguageDetector
{
    private $ticket;

    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    public function detect()
    {
        $ld        = new Language(array_keys(\App\Language::available()));
        $text      = $this->ticket->body.' '.$this->ticket->comments()->pluck('body');
        $languages = $ld->detect($text)->close();

        return array_keys($languages)[0];
    }
}
