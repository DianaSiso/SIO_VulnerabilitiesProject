# Correr o projeto

## Server e Database
Utilizando o xampp:
1. Adicionar a pasta `server` do projeto a `/opt/lampp/htdocs`
2. Correr xampp
   1. `cd /opt/lampp`
   2. `sudo ./manager-linux-x64.run`
3. Em `localhost/dashboard`, selecionar phpMyAdmin
4. Importar ficheiro `HPWiki.sql` que se encontra na pasta database
    - emails e passwords:
      - isabella@hotmail.com: iLoveDobby_3
      - john@gmail.com: AvadaKedravaBellatrix
      - lili_martinha@gmail.com: AvadaKedravaBellatrix88

## Client
Na pasta client de cada uma das apps:
1. `npm install`
2. `npm start`

# Descrição do projeto
Wiki sobre personagens do mundo de Harry Potter. É possível obter informação sobre as personagens e para comentar é necessário realizar login. Existem 2 tipos de utilizadores: os normais e os administradores. Os normais podem eliminar os seus próprios comentários e os administradores podem eliminar os comentários de qualquer utilizador.

# Autores

- Diana Siso, 98607, LEI
- Miguel Ferreira, 98599, LEI
- Raquel Ferreira, 98323, LEI
- Sophie Pousinho, 97814, LEI

# Vulnerabilidades
- CWE-79: Improper Neutralization of Input During Web Page Generation ('Cross-site Scripting')
- CWE-89: Improper Neutralization of Special Elements used in an SQL Command ('SQL Injection')
- CWE-862: Missing Authorization
- CWE-20: Improper Input Validation
- CWE-549: Missing Password Field Masking

# Tecnologias usadas

- React (front-end)
- PHP (back-end)
- MySQL (base de dados)
- XAMPP (servidor)

# Sites auxiliares

https://www.w3schools.com/php/php_form_validation.asp

https://github.com/lchaconc/Ejercicios-api/blob/master/ws-login/login.php

