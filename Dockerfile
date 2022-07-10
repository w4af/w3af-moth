FROM w4af/ci_web1804-php7:latest
MAINTAINER Arthur Taylor <arthur@codders.de>

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update
RUN apt-get upgrade -y

RUN apt-get install -y openssh-server

# Some modules are not enabled yet
RUN rm -rf /etc/apache2/mods-enabled/jk.*
RUN rm -rf /etc/apache2/mods-enabled/mod-security.*
RUN rm -rf /etc/apache2/mods-enabled/python.*
RUN rm -rf /etc/apache2/mods-enabled/ssl.*

#
# PHP configuration
#
RUN sed -ri 's/^display_errors\s*=\s*Off/display_errors = On/g' /etc/php/7.4/apache2/php.ini
RUN sed -ri 's/^error_reporting\s*=.*$/error_reporting = E_ALL \& ~E_DEPRECATED \& ~E_NOTICE/g' /etc/php/7.4/apache2/php.ini
RUN sed -ri 's/^short_open_tag\s*=\s*Off/short_open_tag = On/g' /etc/php/7.4/apache2/php.ini
RUN sed -ri 's|^auto_prepend_file\s*=\s*|auto_prepend_file = /app/show_source.php|g' /etc/php/7.4/apache2/php.ini

# Allow root to login
RUN sed -ri 's/^PermitRootLogin.*$/PermitRootLogin yes/g' /etc/ssh/sshd_config

# Webroot for moth
ADD webroot/moth/ /app/

# And some specific configurations to make the app more vulnerable
RUN rm -rf /app/w3af/audit/xss/stored/data.txt
RUN touch /app/w3af/audit/xss/stored/data.txt
RUN chown www-data: /app/w3af/audit/xss/stored/data.txt

COPY ./setup_db.sh /init_mysql.sh

RUN rm -rf /var/lib/apt/lists/*
