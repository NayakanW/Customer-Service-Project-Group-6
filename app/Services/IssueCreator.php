<?php

namespace App\Services;

/**
 * Service IssueCreator
 * 
 * Service ini menangani pembuatan issue di sistem pelacakan issue.
 * 
 * Fitur:
 * 1. Integrasi dengan sistem pelacakan issue eksternal
 * 2. Konversi tiket menjadi issue
 * 3. Sinkronisasi status antara tiket dan issue
 * 4. Penanganan error saat pembuatan issue
 */
interface IssueCreator
{
    public function createIssue($account, $repoSlug, $title, $content, $extra = []);

    public function createComment($account, $repoSlug, $id, $comment);

    public function updateIssue($account, $repoSlug, $id, $fields);
}
