# Web Challenges - GDG Benha Bootcamp 2025

This repository contains a collection of Web CTF challenges used in the GDG Benha Bootcamp 2025.

## 📌 Requirements

- **Apache2** as a local server
- **PHP** for running PHP files
- **MySQL** for database setup

## ⚡ Installation & Setup

### 1️⃣ Install Apache2, PHP, and MySQL

```bash
sudo apt update && sudo apt install apache2 php mysql-server php-mysql
```

### 2️⃣ Copy files to the local server directory

```bash
sudo cp -r * /var/www/html/ctf_challenges/
```

### 3️⃣ Database Setup

#### ✅ Start MySQL:

```bash
sudo systemctl start mysql
```

#### ✅ Login to MySQL and create the database:

```bash
mysql -u root -p
```

Then execute the following commands in MySQL:

```sql
CREATE DATABASE ctf_challenge;
CREATE USER 'maro'@'localhost' IDENTIFIED BY 'gdgchallenges';
GRANT ALL PRIVILEGES ON ctf_challenge.* TO 'maro'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

#### ✅ Import database from `ctf_challenge.sql`

```bash
mysql -u maro -p ctf_challenge < ctf_challenge.sql
```

### 4️⃣ Start the Server

```bash
sudo systemctl restart apache2
```

Then open your browser and navigate to:

```
http://localhost/ctf_challenges/
```

## 🔗 GitHub Repository
[GDG Benha Bootcamp Web Challenges](https://github.com/0xmaro/GDG_Benha_Bootcamp_web_challenge.git)

## 🚀 Enjoy Solving the Challenges! 🎯

