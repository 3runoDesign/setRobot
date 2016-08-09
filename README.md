![SetRobot Logo](http://agenciaccm.s3-sa-east-1.amazonaws.com/uploads/2016/07/16165134/setrobot_logo.svg "SetRobot")

setRobot é um tema base para auxiliar no desenvolvimento ágil de temas para WordPress.

##Motivação
Para facilitar o fluxo e agilizar o desenvolvimento de temas. Por padrão não temos estilo (coisas básicas) e nem JavaScript mágico.

##Requisitos
| Pré-requisitos    | Como verificar | Como instalar
| --------------- | ------------ | ------------- |
| PHP >= 5.6.x    | `php -v`     | [php.net](http://php.net/manual/en/install.php) |
| Composer        | `composer -v`| [Composer](https://getcomposer.org/download/)|
| Node.js 6.2.x  | `node -v`    | [nodejs.org](http://nodejs.org/) |
| gulp >= 3.9.1  | `gulp -v`    | `npm install -g gulp` |
| Bower >= 1.7.9 | `bower -v`   | `npm install -g bower` |

##Referências
 Features    | ferramentas usadas
 ------ | -----
**HTML** | [Blade WP](https://github.com/tormjens/wp-blade)
**CSS** | [Sass](http://sass-lang.com/) ([Libsass](http://sass-lang.com/libsass) via [node-sass](https://github.com/sass/node-sass)), [CSSNano](https://github.com/ben-eb/cssnano), Source Maps
**Framework para Sass** | [Bourbon](Bourbon.io) e [Neat](neat.bourbon.io)
**Images** | [ImageMin](https://www.npmjs.com/package/gulp-imagemin)
**Assets para produção** | [Gulp-rev-all](https://github.com/smysnk/gulp-rev-all)

##Como Instalar

```shell
1º Abra seu terminal e entre na pasta themes do seu projeto.
   "$ cd PATH/wp/wp-content/themes/"

2º Execute o comando git clone
   "$ git clone git@github.com:3runoDesign/setRobot.git nome_do_tema"

3º No seu terminal, entre na pasta themes e em seguida na pasta setRobot 
  "cd $ cd PATH/wp/wp-content/themes/nome_do_tema/"

4º No terminal, dentro da pasta "nome_do_tema", execute o comando:
 "$npm run build"

5º Por fim, novamente dentro da pasta "nome_do_tema", execute o comando para instalação do composer
  "$composer install"

```

###Tasks do gulp
```shell
gulp assets-build #Criar os arquivos
gulp assets-build --production #Criar os arquivos e criar o manifesto
gulp w #Observar os arquivos durante o desenvolvimento.
```

##Inspirações
 - https://github.com/roots/sage
 - https://github.com/wpbrasil/odin
 - https://github.com/zach-adams/cutlass-wp-theme

##Como contribuir
Se você usa [Atom.io](https://atom.io/):
- [PHP CS Fixer (PSR-2)](https://atom.io/packages/php-cs-fixer)
- [PHPmd](https://atom.io/packages/linter-phpmd)

Se você usa [Sublime Text](https://www.sublimetext.com/):
- [PHP CS Fixer (PSR-2)](https://github.com/benmatselby/sublime-phpcs)
- [PHPmd](https://github.com/SublimeLinter/SublimeLinter-phpmd)

Depois basta fazer o **Fork** e nos mandar uma **Pull Request**.

##Versionamento
**setRobot** sem o [Versionamento Semântico](http://semver.org/lang/pt-BR/).

#Copyright e Licença
Copyright 2016.
O código PHP esta licenciado sob a Licença GPLv2. Todos os arquivos CSS, SCSS, JS, imagens e outros não incluindo arquivos PHP estão licenciados como MIT ou pela licença especificada dentro de seus arquivos.
