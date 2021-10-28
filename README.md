# ZendSample

## Overview
This is the sample project using [Zend Framework 1.8.5](https://framework.zend.com/downloads/archives).

This application is executed in docker containers and edited through Remote Development extention of [VSCode](https://azure.microsoft.com/ja-jp/products/visual-studio-code/).

## Requirement

- Windows 10
- [Docker Desktop for Windows](https://www.docker.com/products/docker-desktop)
- VSCode with the extention of Remote Development

## How to use
1. Open ZendSample folder (i.e. this project itself) in containers through Remote Development extention of VSCode.
2. Initialize a database in the container for MySQL.
   ```
   # After type each line, type "password"
   $ mysql -u zend -p < /var/lib/mysql/db_init/ddl.sql
   $ mysql -u zend -p < /var/lib/mysql/db_init/initial_data.sql
   ```
3. Start docker containers and access to http://localhost:8080/ZendSample/public/welcome/index .
4. Sign in by Email='user@example.com' and Password='password'.
   
※ The url of http://localhost:8080/ZendSample/public leads you to default index page of Zend Framework 1.8.5.