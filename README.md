It's a simple way to start a new project with Wordpress using [Vagrant](https://www.vagrantup.com/)

## Installation

* Install [VirtualBox](https://www.virtualbox.org/)

* Install vagrant using the installation instructions in the [Getting Started document](https://www.vagrantup.com/docs/getting-started/)

* Clone this repository and cd into it

* Run ```vagrant up``` in order to set up the box using the ansible provisioner

* You should now have your working 
  * http://192.168.10.11
  
 
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
 

## Theme structure

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

# Sage Theme

More information about installation and setup 
https://github.com/roots/sage/tree/9.0.0-alpha.3

## Theme structure

```shell
themes/your-theme-name/   # → Root of your Sage based theme
├── assets                # → Front-end assets
│   ├── config.json       # → Settings for compiled assets
│   ├── build/            # → Webpack and ESLint config
│   ├── fonts/            # → Theme fonts
│   ├── images/           # → Theme images
│   ├── scripts/          # → Theme JS
│   └── styles/           # → Theme stylesheets
├── composer.json         # → Autoloading for `src/` files
├── composer.lock         # → Composer lock file (never edit)
├── dist/                 # → Built theme assets (never edit)
├── functions.php         # → Composer autoloader, theme includes
├── index.php             # → Never manually edit
├── node_modules/         # → Node.js packages (never edit)
├── package.json          # → Node.js dependencies and scripts
├── screenshot.png        # → Theme screenshot for WP admin
├── src/                  # → Theme PHP
│   ├── lib/Sage/         # → Theme wrapper, asset manifest
│   ├── admin.php         # → Theme customizer setup
│   ├── filters.php       # → Theme filters
│   ├── helpers.php       # → Helper functions
│   └── setup.php         # → Theme setup
├── style.css             # → Theme meta information
├── templates/            # → Theme templates
│   ├── layouts/          # → Base templates
│   └── partials/         # → Partial templates
└── vendor/               # → Composer packages (never edit)
```

