Sonata Standard Edition
=======================

What's inside?
--------------

Sonata Standard Edition comes pre-configured with the following bundles:

* Bundles from Symfony Standard distribution
* Sonata Admin Bundles: Admin and Doctrine ORM Admin
* Sonata Ecommerce Bundles: Payment, Customer, Invoice, Order and Product
* Sonata Foundation Bundles: Core, Notification, Formatter, Intl, Cache, Seo and Easy Extends
* Sonata Feature Bundles: Page, Media, News, User, Block, Timeline
* Api Bundles: FOSRestBundle, BazingaHateoasBundle, NelmioApiDocBundle and JMSSerializerBundle

Installation
------------------

Get composer:

    curl -s http://getcomposer.org/installer | php

Run the following command for the 4.0 branch:

    php composer.phar create-project sonata-project/sandbox:4.0.x-dev
    
Edit your .env config file to config database:

    DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/sonata_sandbox
    
Reset the data (also use it to prepare database):

    php bin/load_data.php
    

Run
---

If you are running PHP7.1, you can use the built in server to start the demo:

    bin/console server:run localhost:9090

Now open your browser and go to http://localhost:9090/admin

and use your user and password defined previously

Tests
-----

### Functional testing

You can now run the tests suite using the following command

    vendor/bin/behat

To get more informations about Behat, feel free to check [the official documentation][link_behat].


### Unit testing

To run the Sonata test suites, you can run the command:

    bin/vendor/simple-phpunit

Enjoy!

[link_behat]: http://docs.behat.org "the official Behat documentation"
