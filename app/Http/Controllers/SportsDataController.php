<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class SportsDataController extends Controller
{
    private $sportIds = [
        'cricket' => 4,
        'soccer' => 1,
        'tennis' => 2,
        'horse_racing' => 10,
        'greyhound_racing' => 65
    ];
    
    public function getSportsData()
    {
        try {
            $cacheKey = 'sports_data_mysql';
            $cacheDuration = now()->addSeconds(5);
            
            $data = Cache::remember($cacheKey, $cacheDuration, function () {
                return [
                    'cricket' => $this->getMatchesBySport($this->sportIds['cricket'], 5),
                    'soccer' => $this->getMatchesBySport($this->sportIds['soccer'], 5),
                    'tennis' => $this->getMatchesBySport($this->sportIds['tennis'], 5)
                ];
            });
            
            return response()->json($data);
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching data: ' . $e->getMessage()], 500);
        }
    }
    
    public function getCricketMatches()
    {
        try {
            $cacheKey = 'all_matches_mysql';
            $cacheDuration = now()->addSeconds(5);
            
            $data = Cache::remember($cacheKey, $cacheDuration, function () {
                return [
                    'cricket' => $this->getMatchesBySport($this->sportIds['cricket']),
                    'soccer' => $this->getMatchesBySport($this->sportIds['soccer']),
                    'tennis' => $this->getMatchesBySport($this->sportIds['tennis'])
                ];
            });
            
            return response()->json($data);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    private function getMatchesBySport($sportId, $limit = null)
    {
        $sportNames = [
            4 => 'Cricket',
            1 => 'Soccer',
            2 => 'Tennis',
            10 => 'Horse Racing',
            65 => 'Greyhound Racing'
        ];
        
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        
        $query = DB::table('matches')
            ->where('sport_id', $sportId)
            ->where('scheduled_time', '>=', $today . ' 00:00:00')
            ->where('scheduled_time', '<', $tomorrow . ' 00:00:00')
            ->orderByRaw('is_inplay DESC, scheduled_time ASC');
        
        if ($limit) {
            $query->limit($limit);
        }
        
        $matches = $query->get();
        
        $result = [];
        
        foreach ($matches as $match) {
            $odds = DB::table('match_odds')
                ->where('gmid', $match->gmid)
                ->orderBy('section_number')
                ->get();
            
            $runners = [];
            foreach ($odds as $odd) {
                $runners[] = [
                    'name' => $odd->selection_name,
                    'back' => (float) $odd->back_odds,
                    'backSize' => (float) $odd->back_size,
                    'lay' => (float) $odd->lay_odds,
                    'laySize' => (float) $odd->lay_size
                ];
            }
            
            $totalMatched = 0;
            foreach ($runners as $runner) {
                $totalMatched += ($runner['backSize'] + $runner['laySize']);
            }
            
            $result[] = [
                'marketId' => (string) $match->gmid,
                'marketName' => $match->match_name,
                'status' => $match->match_status ?? 'OPEN',
                'inplay' => (bool) $match->is_inplay,
                'startTime' => $match->scheduled_time ? date('c', strtotime($match->scheduled_time)) : null,
                'sport' => $sportNames[$sportId] ?? 'Unknown',
                'runners' => $runners,
                'totalMatched' => round($totalMatched, 2)
            ];
        }
        
        return $result;
    }
    
    public function getAllSportsMatches()
    {
        try {
            $data = [
                'cricket' => $this->getMatchesBySport($this->sportIds['cricket']),
                'soccer' => $this->getMatchesBySport($this->sportIds['soccer']),
                'tennis' => $this->getMatchesBySport($this->sportIds['tennis']),
                'horse_racing' => $this->getRacingEvents($this->sportIds['horse_racing']),
                'greyhound_racing' => $this->getRacingEvents($this->sportIds['greyhound_racing'])
            ];
            
            return response()->json($data);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    private function getRacingEvents($sportId, $limit = null)
    {
        $sportNames = [
            10 => 'Horse Racing',
            65 => 'Greyhound Racing'
        ];
        
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        
        $query = DB::table('racing_events')
            ->where('sport_id', $sportId)
            ->where('scheduled_datetime', '>=', $today . ' 00:00:00')
            ->where('scheduled_datetime', '<', $tomorrow . ' 00:00:00')
            ->orderBy('scheduled_datetime', 'asc');
        
        if ($limit) {
            $query->limit($limit);
        }
        
        $events = $query->get();
        
        $result = [];
        
        foreach ($events as $event) {
            $result[] = [
                'marketId' => (string) $event->gmid,
                'marketName' => $event->venue_name,
                'status' => 'OPEN',
                'inplay' => false,
                'startTime' => $event->scheduled_datetime ? date('c', strtotime($event->scheduled_datetime)) : null,
                'sport' => $sportNames[$sportId] ?? 'Racing',
                'runners' => [],
                'totalMatched' => 0
            ];
        }
        
        return $result;
    }
    
    public function getMatchDetails($gmid)
    {
        try {
            $match = DB::table('matches')->where('gmid', $gmid)->first();
            
            if (!$match) {
                return response()->json(['error' => 'Match not found'], 404);
            }
            
            $odds = DB::table('match_odds')
                ->where('gmid', $gmid)
                ->orderBy('section_number')
                ->get();
            
            $runners = [];
            foreach ($odds as $odd) {
                $runners[] = [
                    'selectionId' => $odd->sid,
                    'name' => $odd->selection_name,
                    'back' => (float) $odd->back_odds,
                    'backSize' => (float) $odd->back_size,
                    'lay' => (float) $odd->lay_odds,
                    'laySize' => (float) $odd->lay_size,
                    'status' => $odd->status
                ];
            }
            
            return response()->json([
                'gmid' => $match->gmid,
                'matchName' => $match->match_name,
                'competitionName' => $match->competition_name,
                'status' => $match->match_status,
                'inplay' => (bool) $match->is_inplay,
                'startTime' => $match->scheduled_time,
                'hasBookmaker' => (bool) $match->has_bookmaker,
                'hasFancy' => (bool) $match->has_fancy,
                'runners' => $runners
            ]);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
