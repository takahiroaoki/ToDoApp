# ZendSample

## Overview
This is the sample project using Zend Framework-1.8.5.

This application is executed in docker containers and edited through Remote Development extention of VSCode.

## Requirement

- Windows 10
- Docker Desktop for Windows
- VSCode with the extention of Remote Development

## How to use
1. Open ./ZendSample folder in containers through Remote Development extention of VSCode.
2. Execute ./src/ZendSample/data_init/ddl.sql & ./src/ZendSample/data_init/initial_data.sql in the container for MySQL.
3. Start docker containers and access to http://localhost:8080/ZendSample/public/welcome/index .
4. Sign in by Email='user@example.com' and Password='password'.
   
※ The url of http://localhost:8080/ZendSample/public leads you to index page of Zend Framework 1.8.5.