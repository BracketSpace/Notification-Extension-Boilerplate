#!/bin/bash
# Replaces all the boilerplate values in plugin files

GREEN='\033[1;32m'
GREY='\033[1;30m'
NC='\033[0m' # No Color

echo -e "\n${GREEN}
            .;oOKNWMMMMMWX0xl,.
         .cd0NWMMMMMMMMMMMMMWXOo,.
      .:kXWMMWX0xdollllodxOXWMMMNOl.
    .c0WMMNOo;.            .,lONMMW0c.
   ;OWMMNx;.                  .;kWMMWk.
 .lXMMWO;       .,:cccc:,.      .lXMMWO.
.oNMMNd.     ,oOXWMMMMMWWXkc.     cXMMWx
cXMMWd.    ,kNMMMNK000KNWMMW0:    .xWMMX
OMMMO.    ;KMMMKo,.    .l0WMMXc    lNMMW
NMMWo    .OMMM0,         .OMMM0.   cNMMW
WMMX:    ;XMMWo           cNMMN:   lWMMN
WMMX:    ;KMMWo           ;XMMWl  .kMMMO
NMMWl    .kWMMKc.         ,KMMWl  lNMMX:
OMMMO.    ,0WMMNOl;...,:c.,KMMWOcxNMMXc
:XMMWd.    .dXWMMMWNNNWMX;.kMMMMWMMWO;
 lNMMNd.     .cx0XNNNNXKd. .xKNNXKx:.
 .cXMMWO;       ........     .....
   ,OWMMNk;.                   .,:.
    .cOWMMW0d:..           ..;oONK,
      .;xXWMMMNKOkdddooddxO0XWMMWk.
         .:dOXWMMMMMMMMMMMMWNKko,.
            .,lx0XNWWWWWNX0xc
${NC}"

echo -e "\n${GREEN}Welcome, this script has been created to let you easily adjust the plugin names in all the files.${NC}\n"
echo -e "${GREEN}We hope you will build something awesome and let us know!${NC}"
echo -e "${GREEN}BracketSpace team${NC}\n"

echo "Please, provide Nice Name for your plugin, eg. WooCommerce triggers"
echo "What is your plugin Nice Name?"
read user_nicename
echo -e "${GREY}-- Replacing Nicenamexx with ${user_nicename}...${NC}"
find . -type f \( -iname \*.php -o -iname \*.txt -o -iname \*.json -o -iname \*.xml -o -iname \*.js \) -exec sed -i "s/Nicenamexx/${user_nicename}/g" {} +
echo -e "${GREY}-- Success!${NC}"

echo -e "\n"

echo "Please, provide Slug for your plugin, eg. woocommerce_triggers"
echo "As the slug is used in function names, use _ instead of -"
echo "What is your plugin Slug?"
read user_slug
echo -e "${GREY}-- Replacing slugnamexx with ${user_slug}...${NC}"
find . -type f \( -iname \*.php -o -iname \*.txt -o -iname \*.json -o -iname \*.xml -o -iname \*.js \) -exec sed -i "s/slugnamexx/${user_slug}/g" {} +
echo -e "${GREY}-- Success!${NC}"
echo -e "${GREY}-- Changing main plugin file name ${user_slug}...${NC}"
mv notification-slugnamexx.php "notification-${user_slug}.php"
echo -e "${GREY}-- Success!${NC}"

echo -e "\n"

echo "By default, namespace always looks like this BracketSpace\Notification\YourNamespace"
echo "What is your Namespace?"
read user_namespace
echo -e "${GREY}-- Replacing XXNAMESPACEXX namespace with ${user_namespace}...${NC}"
find . -type f \( -iname \*.php -o -iname \*.txt -o -iname \*.json -o -iname \*.js \) -exec sed -i "s/XXNAMESPACEXX/${user_namespace}/g" {} +
echo -e "${GREY}-- Success!${NC}"

echo -e "\n"

echo -e "${GREEN}That's it! This is where your journey begins. Please adjust the directory name if you haven't yet.${NC}\n"
echo -e "${GREEN}Happy coding!${NC}"
echo -e "${GREEN}BracketSpace team${NC}"

echo -e "\n${GREEN}
                      .:dOXWWMMMWXOd:.
                    .l0WMMMMMMMMMMMMW0l.
                  .l0WMMMMWX0OO0XWMMMMWKl.
                .l0WMMMMWOc..  ..:kNMMMMWKl.
              .l0WMMMMWO:.        .:ONMMMMWKl.
            .l0WMMMMWO:.            .:ONMMMMWKl.
          .l0WMMMMWO:.      ....      .:kNMMMMWKl.
        .l0WMMMMWO:.      .:kXXk;.      .:ONMMMMWKl.
      .l0WMMMMWO:.       .oNMMMMNk;.      .:ONMMMMWKl.
    .l0WMMMMWO:.      .,. .dKWMMMMNk;.      .:ONMMMMWKl.
  .l0WMMMMWO:.      .:ONXo...dOXWMMMNk;.      .:kNMMMMWKl.
 :0WMMMMWO:.      .:ONMMMWk.  ..dXMMMMNk;.      .:ONMMMMW0:.
lXMMMMWO:.       ,kNMMMWKo.      .oXMMMMNk,       .:ONMMMMNl
KMMMMXl.        ,0MMMWKo.          .oXWMMM0,        .cKMMMMX
WMMMWd.         oWMMMK;              ;0MMMWo          oWMMMM
WMMMMk.         cNMMMXd.            .lXMMMNl         .xWMMMW
OWMMMWk,        .dNMMMWKo.        .l0WMMMWx.        ,xNMMMM0
,OWMMMMNx,       .:ONMMMWKo.    .c0WMMMW0c.       ,xXMMMMW0;
 .oXMMMMMNx,       .:OWMMMWKo.  .oXMMW0c.       ,xXMMMMMXd.
   .dXMMMMMNx,       .:ONMMMWKko. .dkc.       ,xXMMMMMXd.
     .dXWMMMMNx,       .:ONMMMMWKl.         ,xXMMMMMXd,
       .dXMMMMMNx,       .:ONMMW0c.       ,xXMMMMMXd,
         .dXWMMMMNx,       .:dxl.       ,xXMMMMMXd,
           .dXMMMMMNx,                ,xXMMMMMXd,
             .dXWMMMMNx,            ,xXMMMMMXd,
               .dXMMMMMNx,        ,xXMMMMMXd,
                 .dXMMMMMNkc;,,,cxXMMMMMXd,
                   .dXWMMMMMWWNWMMMMMMXd,
                     .o0NMMMMMMMMMMW0o.
                       .lOXWMMMMWNOl.
${NC}"
