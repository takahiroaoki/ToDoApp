# ZendSample

## Overview
This is the sample project using [Zend Framework 1.8.5](https://framework.zend.com/downloads/archives).

This application is executed in docker containers and edited through Remote Development extention of [VSCode](https://azure.microsoft.com/ja-jp/products/visual-studio-code/).

## Requirement

- Windows 10
- [Docker Desktop for Windows](https://www.docker.com/products/docker-desktop) 4.2.0
- VSCode with the extention of Remote Development 0.21.0

## How to use
1. Open ZendSample folder (i.e. this project itself) in containers through Remote Development extention of VSCode.
2. Initialize a database in the container for MySQL.
   ```
   # After type each line, type "password"
   $ mysql -u zend -p < /var/lib/mysql/db_init/ddl.sql
   $ mysql -u zend -p < /var/lib/mysql/db_init/initial_data.sql
   ```
3. Start docker containers and access to http://localhost:8080/kanban .
4. Sign in by Email='user@example.com' and Password='password'.
   
※ The root url of http://localhost:8080/ leads you to default index page of Zend Framework 1.8.5.

## Reference
- [Zend Framework 徹底入門](https://www.amazon.co.jp/Zend-Framework%E5%BE%B9%E5%BA%95%E5%85%A5%E9%96%80-%E5%B1%B1%E7%94%B0-%E7%A5%A5%E5%AF%9B/dp/4798117129/ref=sr_1_1?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&crid=U4Y2V42K6CWE&keywords=zendframework&qid=1639974825&sprefix=zendframework%2Caps%2C200&sr=8-1)
- [オープンソース徹底活用ZendFrameworkによるWebアプリケーション開発](https://www.amazon.co.jp/Zend-Framework%E5%BE%B9%E5%BA%95%E5%85%A5%E9%96%80-%E5%B1%B1%E7%94%B0-%E7%A5%A5%E5%AF%9B/dp/4798117129/ref=sr_1_1?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&crid=U4Y2V42K6CWE&keywords=zendframework&qid=1639974825&sprefix=zendframework%2Caps%2C200&sr=8-1)
- [The official document of Zend Framework](https://framework.zend.com/)
