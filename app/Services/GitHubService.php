<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class GitHubService
{
    public function getPopularRepositories($date, $language, $limit)
    {
        $query = "created:>$date";
        if ($language) {
            $query .= " language:$language";
        }

        $response = Http::get("https://api.github.com/search/repositories", [
            'q' => $query,
            'sort' => 'stars',
            'order' => 'desc',
            'per_page' => $limit,
        ]);
        return $response->json();
    }
}

