# Lab3_KeepAlived
keepalived + nginx + php-fpm + mysql


### 1. Branch LEMP: 
Vagrant + Ansible Install LEMP Web Server on CentOS 7

### 2. Branch keepAlived:
Vagrant + Ansible Install LEMP with KeepAlived on CentOS 7 

### 3. Branch HA_Wordpress:
Vagrant + Ansible Install HA-cluster Wordpress on VRRP/Keepalved (CentOS 7) 




## Реализация High Availability кластера
Реализована отказоусточивость фронтенда через KeepAlived. \
Стенд разворачивается полуатоматически внутри домашней сети: 
1) Скачать архив по нужной ветке `git clone --branch HA_wordpress git@github.com:molchanovar/Lab3_KeepAlived.git` 
2) Убрать проверку ключей в `/etc/ansible/ansible.cfg` (раскомментировать `host_key_checking = False`)
3) Установить `apt install sshpass` (нужен для ansible для входа по паролю)
4) Запустить Vagrant `vagrant up`
5) Запустить ansible роль **HA_wordpress_role.yml** с локальным inventory `ansible-playbook -i inventory HA_wordpress_role.yml -v `


### Развернутся 3 VM: 
1) Nodes: wp1 [192.168.1.14], wp2 [192.168.1.15] - на них реализован Keepalived и Wordpress
2) Database: db [192.168.1.16] - база данных Mysql 8.0
3) HA Wordpress доступен по адресу [192.168.1.50]


### Проверка доступности Wordpress при падении Nginx/Server'а
1) Остановить Nginx на сервере wp1 [192.168.1.14] - скрипт **check_nginx.sh** проверит что Nginx упал и KeepAlived перенесет общий адрес на другой сервер c Nginx
2) Выключить сеть/сервер - также KeepAlived сам переключит на резерную ноду (простой около минуты)

#### Firewalld
При тестовой раскатке на wp2 не запустился сервис Firewalld - `Failed to start firewalld - dynamic firewall daemon` \
Проблема ушла после `pkill -f firewalld` и повторного запуска
