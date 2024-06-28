#!/bin/bash
# Replaces all the boilerplate values in plugin files

GREEN='\033[1;32m'
GREY='\033[1;30m'
NC='\033[0m' # No Color

echo -e "\n${GREEN}Welcome, this script has been created to let you easily adjust the plugin names in all the files.${NC}\n"
echo -e "${GREEN}We hope you will build something awesome and let us know!${NC}"
echo -e "${GREEN}BracketSpace team${NC}\n"

echo "Please, provide Nice Name for your plugin, eg. WooCommerce triggers"
echo "What is your plugin Nice Name?"
read user_nicename
echo -e "${GREY}-- Replacing Nicenamexx with ${user_nicename}...${NC}"
find . -type f \( -iname \*.php -o -iname \*.txt -o -iname \*.json -o -iname \*.xml -o -iname \*.js \) ! -path "./vendor/*" ! -path "./node_modules/*" -exec sed -i '' -e "s/Nicenamexx/${user_nicename}/g" {} +
echo -e "${GREY}-- Success!${NC}"

echo -e "\n"

echo "Please, provide underscored slug for your plugin, eg. my_plugin"
echo "What is your plugin slug?"
read user_underscore_slug
echo -e "${GREY}-- Replacing slug_namexx with ${user_underscore_slug}...${NC}"
find . -type f \( -iname \*.php -o -iname \*.txt -o -iname \*.json -o -iname \*.xml -o -iname \*.js \) ! -path "./vendor/*" ! -path "./node_modules/*" -exec sed -i '' -e "s/slug_namexx/${user_underscore_slug}/g" {} +
echo -e "${GREY}-- Success!${NC}"

echo -e "\n"

echo "Please, provide dashed slug for your plugin, eg. my-plugin"
echo "What is your plugin slug?"
read user_dash_slug
echo -e "${GREY}-- Replacing slug-namexx with ${user_dash_slug}...${NC}"
find . -type f \( -iname \*.php -o -iname \*.txt -o -iname \*.json -o -iname \*.xml -o -iname \*.js -o -iname \*.neon \) ! -path "./vendor/*" ! -path "./node_modules/*" -exec sed -i '' -e "s/slug-namexx/${user_dash_slug}/g" {} +
echo -e "${GREY}-- Success!${NC}"
echo -e "${GREY}-- Changing main plugin and pot file name ${user_dash_slug}...${NC}"
mv notification-slug-namexx.php "notification-${user_dash_slug}.php"
mv resources/languages/notification-slug-namexx.pot "resources/languages/notification-${user_dash_slug}.pot"
echo -e "${GREY}-- Success!${NC}"

echo "Please, provide camelCase slug for your plugin, eg. myPlugin"
echo "What is your plugin slug?"
read user_camel_slug
echo -e "${GREY}-- Replacing notificationSlugNamexx with ${user_camel_slug}...${NC}"
find . -type f \( -iname \*.php -o -iname \*.txt -o -iname \*.json -o -iname \*.xml -o -iname \*.js \) ! -path "./vendor/*" ! -path "./node_modules/*" -exec sed -i '' -e "s/notificationSlugNamexx/${user_camel_slug}/g" {} +
echo -e "${GREY}-- Success!${NC}"

echo -e "\n"

echo "By default, namespace always looks like this BracketSpace\Notification\YourNamespace"
echo "What is your Namespace?"
read user_namespace
echo -e "${GREY}-- Replacing XXNAMESPACEXX namespace with ${user_namespace}...${NC}"
find . -type f \( -iname \*.php -o -iname \*.txt -o -iname \*.json -o -iname \*.js \) ! -path "./vendor/*" ! -path "./node_modules/*" -exec sed -i '' -e "s/XXNAMESPACEXX/${user_namespace}/g" {} +
echo -e "${GREY}-- Success!${NC}"

echo -e "\n"

echo -e "${GREEN}That's it! This is where your journey begins. Please adjust the directory name if you haven't yet.${NC}\n"
echo -e "${GREEN}Happy coding!${NC}"
echo -e "${GREEN}BracketSpace team${NC}"
