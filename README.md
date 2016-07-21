![SetRobot Logo](http://agenciaccm.s3-sa-east-1.amazonaws.com/uploads/2016/07/16165134/setrobot_logo.svg "SetRobot")
[![Build Status](https://travis-ci.org/CC-Mkt/setRobot.svg?branch=master)](https://travis-ci.org/CC-Mkt/setRobot)
[![Dependency Status](https://david-dm.org/CC-Mkt/setRobot.svg)](https://david-dm.org/CC-Mkt/setRobot)
[![Code Climate](https://codeclimate.com/github/CC-Mkt/setRobot/badges/gpa.svg)](https://codeclimate.com/github/CC-Mkt/setRobot)
[![Issue Count](https://codeclimate.com/github/CC-Mkt/setRobot/badges/issue_count.svg)](https://codeclimate.com/github/CC-Mkt/setRobot)

[![Total Downloads](https://poser.pugx.org/cc-mkt/setrobot/downloads)](https://packagist.org/packages/cc-mkt/setrobot)
[![License](https://poser.pugx.org/cc-mkt/setrobot/license)](https://packagist.org/packages/cc-mkt/setrobot)
[![Latest Stable Version](https://poser.pugx.org/cc-mkt/setrobot/v/stable)](https://packagist.org/packages/cc-mkt/setrobot)
[![Latest Unstable Version](https://poser.pugx.org/cc-mkt/setrobot/v/unstable)](https://packagist.org/packages/cc-mkt/setrobot)

SetRobot é um tema base criado pelo time **Agência CCM**, para auxiliar no desenvolvimento ágil de temas para WordPress.

##Motivação
Para facilitar o nosso fluxo de desenvolvimento na **Agência CCM**, construímos esse mini tema interno, pensando em agilizar o desenvolvimento de temas. Por padrão não tem estilo e nem JavaScript mágico, somente a organização que amamos seguir.

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
cd PATH/wp/wp-content/themes/
composer create-project CC-Mkt/setRobot nome_do_tema --stability=dev

npm install
bower install
composer install

# Ou

npm run build
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
- [PHP CS Fixer](https://github.com/benmatselby/sublime-phpcs)
- [PHPmd](https://github.com/SublimeLinter/SublimeLinter-phpmd)

Depois basta fazer o **Fork** e nos mandar uma **Pull Request**.

##Versionamento
setRobot sem o [Versionamento Semântico](http://semver.org/lang/pt-BR/).

#Copyright e Licença
Copyright 2016.
O código PHP esta licenciado sob a Licença GPLv2. Todos os arquivos CSS, SCSS, JS, imagens e outros não incluindo arquivos PHP estão licenciados como MIT ou pela licença especificada dentro de seus arquivos.

#Feito com amor por Agência CCM
Esse tema foi criado e é mantido pela [Agência CCM](http://agenciaccm.com.br).
