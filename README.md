It's a simple way to start a new project with Wordpress using [Vagrant](https://www.vagrantup.com/)

## Installation

* Install [VirtualBox](https://www.virtualbox.org/)

* Install Vagrant using the installation instructions in the [Getting Started document](https://www.vagrantup.com/docs/getting-started/)

* Install vagrant-triggers plugin <br/>`vagrant plugin install vagrant-triggers` 

* Clone this repository and cd into it

* Run ```vagrant up``` in order to set up the box using the ansible provisioner

* You should now have your working 
  * http://192.168.10.11
  * or http://
  
 
## Installed Components

* [Apache2](http://nginx.org)
* [MySQL](http://dev.mysql.com/downloads/mysql/)
* [PHP 5.5](http://www.php.net/)
* [PhpMyAdmin](https://www.phpmyadmin.net/)
* [NodeJS 6](https://nodejs.org)
* [Bower](https://bower.io/)
* [Gulp](http://gulpjs.com/)
* [Git](http://git-scm.com/)
* [Composer](https://getcomposer.org/)
* [Wordpress 4.6.1](https://wordpress.org/)
  
  
## How use?

##### Connect with PhpMyAdmin:
  
    * Available on http://192.168.10.11/phpmyadmin
    * User: root Password: root
  
##### Connect with the database:
    
    * MySQL Host: 127.0.0.1
    * Username: root
    * Password: root
    * SSH Host: 192.168.10.11
    * SSH User: vagrant
    * SSH Password: vagrant
    
##### How restore/import database

```shell
 cd sites/helloworld/bin
 ./dbtool restore
```
    
##### How export database

```shell
 cd sites/helloworld/bin
 ./dbtool dump
```
 

## Structure

```shell
sites/                     
├── helloworld            
│   ├── bin               # → 
│   ├── config/           
│       └── wp-blog.php   # → The config file of the WordPress    
│   ├── database/         # → Sql files
│   └── public/            
│       ├── wp-app/       # → Theme
│       └── wordpress/    # → The WordPress framework
├── Vagrant.setup.sh      # → Installing: Apache, PHP, etc.. 
└── Vagrantfile           
```

### Theme structure

```shell
themes/basetwo/           # → Root of based theme
│
├── functions.php         # → Composer autoloader, theme includes, etc..
├── gulpfile.js           # → Gulpfile.js there're basic tasks for compilation, etc.
├── index.php             # → (never edit)
├── node_modules/         # → Node.js packages (never edit)
├── package.json          # → Dependencies and scripts
├── screenshot.png        # → Theme screenshot for WP admin
├── style.css             # → Theme meta information
│
├── assets                # → Front-end assets
│   ├── fonts/            # → Theme fonts
│   ├── images/           # → Theme images
│   ├── js/               # → Theme JS
│   └── scss/             # → Theme stylesheets
│
├── dist/                 # → Built theme assets (never edit)
│
├── lib/                  # → Theme PHP
│   ├── assets.php        # → x
│   ├── config.php        # → x
│   ├── filters.php       # → x
│   ├── wrapper.php       # → x
│   └── wrapper.php       # → x
└── templates/            # → Theme templates
    ├── layouts/          # → Base templates
    └── partials/         # → Partial templates

```
