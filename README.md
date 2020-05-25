# Atfull
LIGHT & VIDEO FOR YOUR EARS


## Plugins 
- elementor
- advanced-custom-fields

## Install
### Requirements
- mysql
- php
- wp-cli
- npm
- composer


### One-line install 
```
git clone 
wp core download --locale=fr_FR --skip-content && mysql -u$DB_USERNAME -p -e "create database '$SITE_DBNAME'" && wp config create --dbname=$SITE_DBNAME --prompt=dbuser,dbpass && wp core install --url="$SITE_URL.com" --title="$SITE_TITLE" --admin_user=$ADMIN_USERNAME --prompt=admin_password --admin_email=$ADMIN_EMAIL && wp db import db_atfull.sql && wp plugin install advanced-custom-fields elementor --activate && cd wp-content/themes/atfull && composer install && npm install && npm build
```

### Development
```
npm start
```
