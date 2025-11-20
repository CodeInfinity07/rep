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
            $cacheDuration = 30;
            
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
            
            foreach ($sportCategory['markets'] as $market) {
                $marketName = $market['marketName'] ?? '';
                
                $processedMarket = [
                    'marketId' => $market['marketId'] ?? '',
                    'marketName' => $marketName,
                    'status' => $market['status'] ?? 'UNKNOWN',
                    'inplay' => $market['inplay'] ?? false,
                    'startTime' => $market['marketStartTime'] ?? null,
                    'runners' => $this->processRunners($market['runners'] ?? []),
                    'totalMatched' => $this->calculateTotalMatched($market['runners'] ?? [])
                ];
                
                if ($this->isCricket($marketName)) {
                    $cricket[] = $processedMarket;
                } elseif ($this->isSoccer($marketName)) {
                    $soccer[] = $processedMarket;
                } elseif ($this->isTennis($marketName)) {
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
    
    private function isCricket($marketName)
    {
        $cricketKeywords = ['Lions', 'Rhinos', 'Bulls', 'Riders', 'Zimbabwe', 'Pakistan', 'India', 'England', 'Australia'];
        foreach ($cricketKeywords as $keyword) {
            if (stripos($marketName, $keyword) !== false) {
                return true;
            }
        }
        return false;
    }
    
    private function isSoccer($marketName)
    {
        $soccerKeywords = ['FK', 'FC', 'United', 'City', 'Bordeaux', 'Pau', 'Milan', 'Madrid'];
        foreach ($soccerKeywords as $keyword) {
            if (stripos($marketName, $keyword) !== false) {
                return true;
            }
        }
        return false;
    }
    
    private function isTennis($marketName)
    {
        $tennisPatterns = ['/\w+\sv\s\w+$/', '/Robertson/', '/Kellovsky/'];
        foreach ($tennisPatterns as $pattern) {
            if (preg_match($pattern, $marketName)) {
                $isCricketOrSoccer = $this->isCricket($marketName) || $this->isSoccer($marketName);
                if (!$isCricketOrSoccer) {
                    return true;
                }
            }
        }
        return false;
    }
}
