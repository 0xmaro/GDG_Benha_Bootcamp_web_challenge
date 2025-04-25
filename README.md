# Web Challenges - GDG Benha on Campus Bootcamp 2025

This repository contains a collection of Web CTF challenges used in the GDG Benha Bootcamp 2025.

## Requirements

- Apache2 (local web server)
- PHP
- MySQL

## Installation & Setup (Automated)

You can run the following bash script to install and configure everything automatically.

### Setup Script

```bash
#!/bin/bash

USER_NAME=$(whoami)

cd "/home/$USER_NAME/Desktop" || exit
mkdir -p Day3
cd Day3 || exit

git clone https://github.com/0xmaro/GDG_Benha_Bootcamp_web_challenge || { echo "Failed to clone repository"; exit 1; }

sudo service mysql start || { echo "Failed to start MySQL service"; exit 1; }

sudo mysql -u root -p <<MYSQL_SCRIPT
CREATE DATABASE ctf_challenge;
CREATE USER 'maro'@'localhost' IDENTIFIED BY 'gdgchallenges';
GRANT ALL PRIVILEGES ON ctf_challenge.* TO 'maro'@'localhost';
FLUSH PRIVILEGES;
EXIT;
MYSQL_SCRIPT

sudo mysql -u root -p ctf_challenge < "/home/$USER_NAME/Desktop/Day3/GDG_Benha_Bootcamp_web_challenge/ctf_challenge.sql" || { echo "Failed to import SQL file"; exit 1; }

sudo cp -r "/home/$USER_NAME/Desktop/Day3/GDG_Benha_Bootcamp_web_challenge" /var/www/html/GDG_Benha_Bootcamp_web_challenge || { echo "Failed to copy challenges directory"; exit 1; }

sudo chown -R www-data:www-data /var/www/html/GDG_Benha_Bootcamp_web_challenge || { echo "Failed to change ownership"; exit 1; }

sudo service apache2 start || { echo "Failed to start Apache service"; exit 1; }

xdg-open http://127.0.0.1/GDG_Benha_Bootcamp_web_challenge || { echo "Failed to open challenges in the browser"; exit 1; }

echo "Setup completed successfully."
