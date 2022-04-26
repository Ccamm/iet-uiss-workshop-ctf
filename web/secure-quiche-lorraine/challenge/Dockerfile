FROM debian:bullseye-slim

# Install system packeges
RUN apt-get update && apt-get install -y supervisor nginx lsb-release curl wget

# Add repos
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list

# Install PHP dependencies and ping
RUN apt update && apt install -y php7.4-fpm php7.4-sqlite3 sqlite3 libsqlite3-dev

COPY config/fpm.conf /etc/php/7.4/fpm/php-fpm.conf
COPY config/supervisord.conf /etc/supervisord.conf
COPY config/nginx.conf /etc/nginx/nginx.conf

# Copy challenge files
COPY src /var/www/html

RUN mkdir -p /run/database

COPY db/createdb.sql /run/database/createdb.sql

RUN sqlite3 /run/database/sqlite.db < /run/database/createdb.sql
RUN mkdir -p /var/www/html/images/uploads
RUN chown www-data:www-data /var/www/html/images/uploads

RUN echo "CTF{n0n0n0n0n0_pHp_f1l3s_pLz_oTh3rw15e_U_c4n_c0mPr0m15e_me_h0sT1!!1}" > /flag

# Expose the port nginx is listening on
EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
