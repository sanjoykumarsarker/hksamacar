#!usr/bin/sh

rsync -avzhe ssh     /var/www/html/hks_postage_entry_sheet.php root@harekrishnasamacar.com:/var/www/html/hks_postage_entry_sheet.php
rsync -avzhe ssh     /var/www/html/hks_postage_entry_sheet_data.php root@harekrishnasamacar.com:/var/www/html/hks_postage_entry_sheet_data.php
