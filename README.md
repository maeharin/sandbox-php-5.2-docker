# php 5.2 sandbox

all in one container
- centos 5
- apache 2.2
- php 5.2
- mysql 5.0

## how to use

submodule初期化（mysqlのtest_dbリポジトリを使っています）

```
$ git submodule init
$ git submodule update
```

イメージ作成＋コンテナ起動

```
$ docker-compose up --build
```

mysqld起動＋サンプルDB作成

```
$ ./start-mysql-dev.sh
```
