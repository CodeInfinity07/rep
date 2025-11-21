<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class SportsDataController extends Controller
{
    private $apiUrl = 'http://89.116.20.218:8085/api/home';
    
    public function getSportsData()
    {
        try {
            $apiKey = $_SERVER['SCORESWIFT_API_KEY'] ?? $_ENV['SCORESWIFT_API_KEY'] ?? getenv('SCORESWIFT_API_KEY') ?? env('SCORESWIFT_API_KEY');
            
            if (!$apiKey) {
                return response()->json([
                    'error' => 'API key not found. Please ensure SCORESWIFT_API_KEY is properly configured in the workflow environment.'
                ], 500);
            }
            
            $cacheKey = 'sports_data';
            $cacheDuration = now()->addSeconds(30);
            
            $data = Cache::remember($cacheKey, $cacheDuration, function () use ($apiKey) {
                $response = Http::withHeaders([
                    'X-ScoreSwift-Key' => $apiKey
                ])->timeout(10)->get($this->apiUrl);
                
                if ($response->successful()) {
                    return $response->json();
                }
                
                return null;
            });
            
            if (!$data) {
                return response()->json(['error' => 'Failed to fetch sports data'], 500);
            }
            
            $categorized = $this->categorizeSports($data);
            
            return response()->json($categorized);
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching data: ' . $e->getMessage()], 500);
        }
    }
    
    private function categorizeSports($data)
    {
        $cricket = [];
        $soccer = [];
        $tennis = [];
        
        foreach ($data as $sportCategory) {
            if (!isset($sportCategory['markets']) || empty($sportCategory['markets'])) {
                continue;
            }
            
            $sportName = strtolower($sportCategory['name'] ?? '');
            
            foreach ($sportCategory['markets'] as $market) {
                $processedMarket = [
                    'marketId' => $market['marketId'] ?? '',
                    'marketName' => $market['marketName'] ?? '',
                    'status' => $market['status'] ?? 'UNKNOWN',
                    'inplay' => $market['inplay'] ?? false,
                    'startTime' => $market['marketStartTime'] ?? null,
                    'runners' => $this->processRunners($market['runners'] ?? []),
                    'totalMatched' => $this->calculateTotalMatched($market['runners'] ?? [])
                ];
                
                if ($sportName === 'cricket') {
                    $cricket[] = $processedMarket;
                } elseif ($sportName === 'soccer') {
                    $soccer[] = $processedMarket;
                } elseif ($sportName === 'tennis') {
                    $tennis[] = $processedMarket;
                }
            }
        }
        
        return [
            'cricket' => array_slice($cricket, 0, 5),
            'soccer' => array_slice($soccer, 0, 5),
            'tennis' => array_slice($tennis, 0, 5)
        ];
    }
    
    public function getCricketMatches()
    {
        try {
            $apiKey = $_SERVER['SCORESWIFT_API_KEY'] ?? $_ENV['SCORESWIFT_API_KEY'] ?? getenv('SCORESWIFT_API_KEY') ?? env('SCORESWIFT_API_KEY');
            
            if (!$apiKey) {
                return response()->json(['error' => 'API key not configured'], 500);
            }
            
            $cacheKey = 'cricket_matches';
            $cacheDuration = now()->addSeconds(30);
            
            $data = Cache::remember($cacheKey, $cacheDuration, function () use ($apiKey) {
                $response = Http::withHeaders([
                    'X-ScoreSwift-Key' => $apiKey
                ])->timeout(10)->get($this->apiUrl);
                
                if ($response->successful()) {
                    return $response->json();
                }
                
                return null;
            });
            
            if (!$data) {
                return response()->json(['error' => 'Failed to fetch cricket matches'], 500);
            }
            
            $cricket = [];
            
            foreach ($data as $sportCategory) {
                if (!isset($sportCategory['markets']) || empty($sportCategory['markets'])) {
                    continue;
                }
                
                $sportName = strtolower($sportCategory['name'] ?? '');
                
                if ($sportName === 'cricket') {
                    foreach ($sportCategory['markets'] as $market) {
                        $cricket[] = [
                            'marketId' => $market['marketId'] ?? '',
                            'marketName' => $market['marketName'] ?? '',
                            'status' => $market['status'] ?? 'UNKNOWN',
                            'inplay' => $market['inplay'] ?? false,
                            'startTime' => $market['marketStartTime'] ?? null,
                        ];
                    }
                }
            }
            
            return response()->json($cricket);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    private function processRunners($runners)
    {
        $processed = [];
        foreach ($runners as $runner) {
            $processed[] = [
                'name' => $runner['runnerName'] ?? 'Unknown',
                'selectionId' => $runner['selectionId'] ?? 0,
                'back' => $runner['back'][0]['price'] ?? '',
                'lay' => $runner['lay'][0]['price'] ?? '',
                'totalMatched' => $runner['totalMatched'] ?? 0
            ];
        }
        return $processed;
    }
    
    private function calculateTotalMatched($runners)
    {
        $total = 0;
        foreach ($runners as $runner) {
            $total += $runner['totalMatched'] ?? 0;
        }
        return $total;
    }
    
    public function getInplayMatches()
    {
        try {
            $apiKey = $_SERVER['SCORESWIFT_API_KEY'] ?? $_ENV['SCORESWIFT_API_KEY'] ?? getenv('SCORESWIFT_API_KEY') ?? env('SCORESWIFT_API_KEY');
            
            if (!$apiKey) {
                return response()->json(['error' => 'API key not configured'], 500);
            }
            
            $cacheKey = 'inplay_matches';
            $cacheDuration = now()->addSeconds(30);
            
            $data = Cache::remember($cacheKey, $cacheDuration, function () use ($apiKey) {
                $response = Http::withHeaders([
                    'X-ScoreSwift-Key' => $apiKey
                ])->timeout(10)->get('http://89.116.20.218:8085/api/inplay');
                
                if ($response->successful()) {
                    return $response->json();
                }
                
                return null;
            });
            
            if (!$data) {
                return response()->json(['error' => 'Failed to fetch inplay matches'], 500);
            }
            
            $categorized = [
                'cricket' => [],
                'soccer' => [],
                'tennis' => [],
                'horse' => [],
                'greyhound' => []
            ];
            
            foreach ($data as $sportCategory) {
                if (!isset($sportCategory['markets']) || empty($sportCategory['markets'])) {
                    continue;
                }
                
                $sportName = strtolower($sportCategory['name'] ?? '');
                
                foreach ($sportCategory['markets'] as $market) {
                    $matchData = [
                        'marketId' => $market['marketId'] ?? '',
                        'marketName' => $market['marketName'] ?? '',
                        'status' => $market['status'] ?? 'UNKNOWN',
                        'inplay' => $market['inplay'] ?? false,
                        'startTime' => $market['marketStartTime'] ?? null,
                    ];
                    
                    if ($sportName === 'cricket') {
                        $categorized['cricket'][] = $matchData;
                    } elseif ($sportName === 'soccer') {
                        $categorized['soccer'][] = $matchData;
                    } elseif ($sportName === 'tennis') {
                        $categorized['tennis'][] = $matchData;
                    } elseif (str_contains($sportName, 'horse')) {
                        $categorized['horse'][] = $matchData;
                    } elseif (str_contains($sportName, 'greyhound')) {
                        $categorized['greyhound'][] = $matchData;
                    }
                }
            }
            
            return response()->json($categorized);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}
