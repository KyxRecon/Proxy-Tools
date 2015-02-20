#!/bin/bash
# Parallel Proxy Scraper & Checker Tool - By Alexcerus HR
# Demo : https://www.youtube.com/watch?v=qliqTP6pFkA
#
clear
cat <<EOF

########################################################
#       Hproxy Scraper & Analysis Tool          #
########################################################

EOF
echo '[+] CTRL+C has been detected!.....starting process ' | grep --color '.....starting process'
cd `dirname $0`
php Hproxy.php
cat proxxy.txt
echo "RESULTS FROM PROXY SCRAPING" | grep --color 'RESULTS FROM PROXY SCRAPING'
#
#
#
#
