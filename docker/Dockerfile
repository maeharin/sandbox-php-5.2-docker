FROM centos:5

#
# httpd-devel: apxsをphpインストール時に使うために必要
#
RUN yum install -y \
  gcc \
  make \
  curl \
  libxml2 \
  libxml2-devel \
  httpd \
  httpd-devel

#
# mysqlクライアントとmysqlサーバーインストール
#
RUN yum install -y \
  mysql \
  mysql-devel \
  mysql-server

#
# phpのtarをDLして展開
#
RUN set -xe \
    && mkdir -p /usr/src/php \
    && cd /usr/src/ \
    && curl -fSL "http://museum.php.net/php5/php-5.2.17.tar.gz" -o php.tar.gz \
    && tar -xzf /usr/src/php.tar.gz -C /usr/src/php --strip-components=1

#
# phpインストール
#
RUN cd /usr/src/php \
    && ./configure \
        --with-libdir=lib64 \
        --with-apxs2=/usr/sbin/apxs \
        --with-pear \
        --with-mysql \
        --enable-mbstring \
        --without-sqlite \
        --without-pdo-sqlite \
        --with-zlib

RUN cd /usr/src/php \
    && make \
    && make install \
    && make clean \
    && rm -rf /usr/src/php

#
# apacheでphpを動かすためのconfをcopy
#
COPY ./docker/php.conf /etc/httpd/conf.d/php.conf

EXPOSE 80
ENTRYPOINT ["httpd"]
CMD ["-D", "FOREGROUND"]

#
# アプリケーションのソースコードをcopy
# 
COPY ./src/ /var/www/html/

#
# test_db用のファイルをcopy
#
RUN mkdir -p /apps/test_db
COPY ./test_db/ /apps/test_db/
