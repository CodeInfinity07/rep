#!/bin/bash

API_URL="http://130.250.191.174:3009/casino/tableid?key=90asdhnladmnfdkljlaskjdnasmndlaksdjlas"
IMAGE_BASE_URL="https://nd.sprintstaticdata.com/casino-icons/lc"
SAVE_DIR="public/img/casino-games"

mkdir -p "$SAVE_DIR"

echo "Fetching casino games list from API..."
RESPONSE=$(curl -s "$API_URL")

if [ -z "$RESPONSE" ]; then
    echo "ERROR: Failed to fetch data from API"
    exit 1
fi

IMAGES=$(echo "$RESPONSE" | grep -oP '"imgpath"\s*:\s*"[^"]*"' | grep -oP '"[^"]*"$' | tr -d '"')

TOTAL=0
DOWNLOADED=0
SKIPPED=0
FAILED=0

for IMG in $IMAGES; do
    TOTAL=$((TOTAL + 1))
    LOCAL_PATH="$SAVE_DIR/$IMG"

    if [ -f "$LOCAL_PATH" ]; then
        SKIPPED=$((SKIPPED + 1))
        echo "SKIP: $IMG (already exists)"
        continue
    fi

    HTTP_CODE=$(curl -s -o "$LOCAL_PATH" -w "%{http_code}" "$IMAGE_BASE_URL/$IMG")

    if [ "$HTTP_CODE" = "200" ] && [ -s "$LOCAL_PATH" ]; then
        DOWNLOADED=$((DOWNLOADED + 1))
        echo "OK: $IMG"
    else
        FAILED=$((FAILED + 1))
        rm -f "$LOCAL_PATH"
        echo "FAIL: $IMG (HTTP $HTTP_CODE)"
    fi
done

echo ""
echo "Done!"
echo "Total: $TOTAL | Downloaded: $DOWNLOADED | Skipped: $SKIPPED | Failed: $FAILED"
echo "Images saved to: $SAVE_DIR/"
