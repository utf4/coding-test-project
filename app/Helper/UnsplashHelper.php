<?php

namespace App\Helper;

class UnsplashHelper
{
    private $accessKey;
    private $secretKey;

    public function __construct()
    {
        $this->accessKey = env('UNSPLASH_ACCESS_KEY');
        $this->secretKey = env('UNSPLASH_SECRET_KEY');
    }

    public function authenticate()
    {
        // Authentication is typically handled via access keys in Unsplash API
        // No separate authentication request is needed
        return $this->accessKey;
    }

    public function searchImages($query, $page = 1, $perPage = 1)
    {
        $url = "https://api.unsplash.com/search/photos?query=" . urlencode($query) . "&page=$page&per_page=$perPage";

        $headers = [
            "Authorization: Client-ID " . $this->authenticate(),
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new \Exception('Error: ' . curl_error($ch));
        }

        curl_close($ch);
        
        $url = json_decode($response, true)['results'][0]['urls']['raw'];
        $total_pages = json_decode($response, true)['total_pages'];
        return ['url' => $url, 'total_pages' => $total_pages];
    }
}
