# microblog-php-mvc

Sistema de microblog feito com PHP para estudos da linguagem.
O _front end_ desta aplicação utiliza o framework Bootstrap 4.0.0 - beta.

## Requisitos

+ PHP7
+ Servidor Web (Nginx ou Apache)
+ Gerenciador de pacotes Bower que depende do NodeJS (para instalação)

## Instalação

1. Faça o clone, ou se preferir o download do repositório e extraía o conteúdo para o diretório configurado para servir as páginas web. 
2. No diretório raiz da aplicacao execute o comando: `bower install`
3. Execute ou Importe o arquivo `banco.sql` em uma base de dados _Mysql_, utilizando o _phpMyAdmin_ por exemplo.
4. Altere as configuracoes de acesso ao banco de dados no arquivo `app/configuration/settings.php`.

## Está faltando

+ Uma página de perfil onde o usuário pode listar os outros usuários que ele está seguindo, e também, se desejar, clicar em um botão para deixar de seguir um desses usuários.
+ Uma página de configurações onde o usuário possa alterar seu nome e sua senha.
+ Uma função **esqueceu senha** para o usuário recuperar a senha acessível a partir da tela de login.

## Licença

[GNU GENERAL PUBLIC LICENSE - Version 3, 29 June 2007](https://github.com/getuliovinicius/micro-blog-php/blob/master/LICENSE).