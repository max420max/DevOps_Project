FROM ubuntu
RUN sudo apt-get update
RUN sudo apt-get upgrade -y
RUN sudo apt-get install apache2 -y
RUN sudo apt install php -y
RUN sudo apt-get install mysql-server mysql-client -y
RUN sudo mysql_secure_installation
RUN sudo apt-get install phpmyadmin