# Installation :

Ce Projet en structure MVC tourne sur une AMI 2 sur AWS toutes les caractéristiques des logicielles sont en dessous l'application peut également marcher en local avec de possible bug de formatage de texte.

### Pré Requis :

> AWS EC2

> PHP 7.2

> MariaDB 10.2

> Appache 2.4.62

### Userdata pour l'installation des logicielles et du code sur Amazon Linux 2

```
#!/bin/bash
yum update -y
amazon-linux-extras install -y lamp-mariadb10.2-php7.2 php7.2
yum install -y httpd mariadb-server git
systemctl start httpd
systemctl enable httpd
sudo systemctl start mariadb
sudo systemctl enable mariadb
usermod -a -G apache ec2-user
chown -R ec2-user:apache /var/www
chmod 2775 /var/www
find /var/www -type d -exec chmod 2775 {} \;
find /var/www -type f -exec chmod 0664 {} \;
cd /var/www/html
git clone https://github.com/erwanntko/realisation1booqueen.git .
```
### Mise en place de la base de donnée
```
mysql -u root
source /var/www/html/base.sql;
```

### PS : Deux compte sont déjà créé pour une démo

> Username : Hybris.Kappa Password : Hybris1! Role : User
> 
> Username : Athéna.Kappa Password : Athéna1! Role : Admin

L'application est prête !

# Documentaion :

MCD :

![image](https://github.com/user-attachments/assets/24735856-ded6-4033-bfdd-23f8d5a96a3b)

UseCases :

![image](https://github.com/user-attachments/assets/2b2981e7-3de8-42fb-9770-865a7c59a2bc)
