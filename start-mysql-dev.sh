#!/bin/bash

#mysqld起動
docker exec sandboxphp52docker_php_1 /etc/init.d/mysqld start

#サンプルDBを作成
docker exec -t sandboxphp52docker_php_1 sh -c "cd /apps/test_db && mysql < /apps/test_db/employees_partitioned.sql"
