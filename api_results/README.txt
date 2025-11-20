API Results for Market ID 1.250761088
======================================
Match: Aspin Stallions v Ajman Titans
Event ID: 34977777
Generated: 2025-11-20

Files:
------
1. api_GetMarketDetails_1.250761088.json
   - Endpoint: /api/GetMarketDetails?market_id=1.250761088
   - Contains: Event details, runner names, market info

2. api_GetMarketIdsV1_event_34977777.json
   - Endpoint: /api/GetMarketIdsV1?eventid=34977777
   - Contains: All market IDs for the event (nested structure)
   - Markets found: 3 (Match Odds, Match Odds Including Tie, Tied Match)

3. api_GetMarketOdds_1.250761088.json
   - Endpoint: /api/GetMarketOdds?market_id=1.250761088
   - Contains: Live odds for Match Odds market (2 runners)

4. api_GetMarketOdds_1.250761091.json
   - Endpoint: /api/GetMarketOdds?market_id=1.250761091
   - Contains: Live odds for Match Odds Including Tie market (3 runners)

5. api_GetMarketOdds_1.250761090.json
   - Endpoint: /api/GetMarketOdds?market_id=1.250761090
   - Contains: Live odds for Tied Match market (2 runners)

Key Observations:
-----------------
- Event ID extraction: marketDetails['event']['id']
- Market IDs structure: data['competition']['event']['markets']
- Price format: ex.availableToBack/availableToLay
- Runner names: Available in GetMarketDetails and embedded in GetMarketIdsV1

6. api_GetMarketIdsV2_1.250761088.json
   - Endpoint: /api/GetMarketIdsV2?market_id=1.250761088
   - Contains: All market IDs for the event (cleaner structure than V1)
   - Markets found: 13 markets including innings lines, runs, etc.
   - Structure: Array of {marketId, marketName, isInplay}

GetMarketIdsV2 vs GetMarketIdsV1:
---------------------------------
V1: Returns nested structure with full market details
    Path: competition.event.markets[]
    Markets: 3 (Match Odds, Match Odds Including Tie, Tied Match)

V2: Returns simple array with market metadata
    Structure: [{marketId, marketName, isInplay}, ...]
    Markets: 13 (includes innings lines, runs, completed match, etc.)
