#!/bin/bash

# Change to the expected directory.
cd "$(dirname "$0")" || exit
cd .. || exit

# Read the version from package.json.
NEW_VERSION=$(cat package.json \
              | grep version \
              | head -1 \
              | awk -F: '{ print $2 }' \
              | sed 's/[", ,]//g')

echo "Setting new version: $NEW_VERSION"

# Update mooltilang.php.
echo "Updating 'composer.json'"
sed -E -i '' -e "s,\"version\": \".*\",\"version\": \"$NEW_VERSION\"," composer.json
