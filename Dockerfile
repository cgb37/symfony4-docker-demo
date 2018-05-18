FROM ubuntu:16.04

FROM php:7.2-apache

RUN apt-get clean
RUN apt-get update

RUN apt-get install -y \
    sudo \
    autoconf \
    autogen \
    wget \
    curl \
    rsync \
    zip \
    unzip \
    ssh \
    openssh-client \
    cron \
    git \
    nano \
    vim \
    emacs \
    build-essential \
    apt-utils \
    software-properties-common \
    nasm \
    rsyslog \
    libjpeg-dev \
    libpng-dev \
    locales && \
    locale-gen en_US.UTF-8 && \
    localedef -i en_US -f UTF-8 en_US.UTF-8

RUN sed -i -e 's/# en_US.UTF-8 UTF-8/en_US.UTF-8 UTF-8/' /etc/locale.gen && \
    locale-gen

ENV LANG en_US.UTF-8
ENV LANGUAGE en_US:en
ENV LC_ALL en_US.UTF-8

# Set the timezone.
ENV TZ 'America/New_York'
RUN echo $TZ > /etc/timezone && \
    apt-get update && apt-get install -y tzdata && \
    rm /etc/localtime && \
    ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && \
    dpkg-reconfigure -f noninteractive tzdata


# Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer && \
    composer self-update --preview
RUN command -v composer


## ssh
ENV SSH_PASSWD "root:Docker!"
RUN apt-get update \
        && apt-get install -y --no-install-recommends dialog \
        && apt-get update \
	&& apt-get install -y --no-install-recommends openssh-server \
	&& echo "$SSH_PASSWD" | chpasswd

COPY .docker/sshd_config /etc/ssh/
COPY .docker/init.sh /usr/local/bin/
RUN chmod u+x /usr/local/bin/init.sh


# Copy public facing pages
COPY . /var/www/html/

# make scripts executable
RUN chmod -R u+x /var/www/html/bin

## Copy sh test file
#COPY ./bin/  /usr/local/bin/
#RUN chmod -R u+x /usr/local/bin
#
#
## Add crontab file in the cron directory
ADD .docker/crontab /etc/cron.d/crontab
#
## Give execution rights on the cron job
RUN chmod 0600 /etc/cron.d/crontab
#
## Create the log file to be able to run tail
RUN touch /var/log/cron.log
#
#
#
#RUN chmod 0755 -R /usr/local/app
#
#RUN cd /var/www/html/ && composer install

ADD .docker/uml-calservice.conf /etc/apache2/sites-available/uml-calservice.conf


#
#RUN php /usr/local/bin/create-calendar-directories.php
#RUN php /usr/local/bin/write-calendar-json.php

# Add group
RUN groupadd dev01

## add user
RUN useradd -d /home/cbrownroberts -ms /bin/bash -g sudo -p cbrownroberts cbrownroberts
WORKDIR /home/cbrownroberts



EXPOSE 2222 80

ENTRYPOINT ["/usr/local/bin/init.sh"]