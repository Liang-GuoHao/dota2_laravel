#!/bin/bash
cd /data/www/dota2_laravel
echo >> /data/www/dota2_laravel/log/shell/github_webhook.log
date "+%Y-%m-%d %H:%M:%S" >> /data/www/dota2_laravel/log/shell/github_webhook.log
git pull origin master >> /data/www/dota2_laravel/log/shell/github_webhook.log
echo >> /data/www/dota2_laravel/log/shell/github_webhook.log