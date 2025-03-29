> Installation :

Ce Projet en structure MVC tourne sur une AMI 2 sur AWS toutes les caractéristiques des logicielles sont en dessous l'application peut également marcher en local avec de possible bug de formatage de texte.

Pré Requis :

AWS EC2

PHP 7.2

MariaDB 10.2

Appache 2.4.62

Sur AMI 2 :

#!/bin/bash
yum update -y
amazon-linux-extras install -y lamp-mariadb10.2-php7.2 php7.2
yum install -y httpd mariadb-server
systemctl start httpd
systemctl enable httpd
usermod -a -G apache ec2-user
chown -R ec2-user:apache /var/www
chmod 2775 /var/www
find /var/www -type d -exec chmod 2775 {} \;
find /var/www -type f -exec chmod 0664 {} \;

Télécharger le code

Lancer l'EC2

Exécuter les comandes pour la BDD :

Se mettre sur le dossier **/www/** en local ou le **/html/** sur AWS

mysql -u root

source base.sql;

L'application est prête !

> Documentaion :

MCD :

![image](https://github.com/user-attachments/assets/24735856-ded6-4033-bfdd-23f8d5a96a3b)

UseCases :

![image](https://github.com/user-attachments/assets/2b2981e7-3de8-42fb-9770-865a7c59a2bc)
