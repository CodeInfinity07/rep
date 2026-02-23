<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CasinoController extends Controller
{
    public function getGames()
    {
        $games = Cache::remember('casino_games', 300, function () {
            try {
                $response = Http::timeout(10)->get('http://130.250.191.174:3009/casino/tableid', [
                    'key' => '90asdhnladmnfdkljlaskjdnasmndlaksdjlas',
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    return $data['data']['t1'] ?? [];
                }
            } catch (\Exception $e) {
                \Log::error('Casino API error: ' . $e->getMessage());
            }
            return [];
        });

        return response()->json(['games' => $games]);
    }

    public static function fetchGames()
    {
        return Cache::remember('casino_games', 300, function () {
            try {
                $response = Http::timeout(10)->get('http://130.250.191.174:3009/casino/tableid', [
                    'key' => '90asdhnladmnfdkljlaskjdnasmndlaksdjlas',
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    return $data['data']['t1'] ?? [];
                }
            } catch (\Exception $e) {
                \Log::error('Casino API error: ' . $e->getMessage());
            }
            return [];
        });
    }
}
