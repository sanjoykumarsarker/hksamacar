#!/bin/sh
now=$(date +"%F %T")
mysqldump -uHKSamacar_local -pJpsk/1866 HareKrishnaSamacar | gzip > /var/www/html/backup_databases/database_$now.gz
 