Real-Estate-Management-System
==============================


# Requirement #

##USER##
 in our system need three kinds of user
		- Administrator
		- Owner (these two kind have to login before use our system)
		- Visitor (this kind of user don't need to register & login)

##Functionalities##
**Visitor**

	- Search (all key word that related to house attribute).
	- Show result (after action search of user the result, Address, Map,are shown as list).
	- Show detail (when click in one list of the result we'll show you detail such as photos, contact,price ..).
	- vote house the have been view (decrease & increase).

**Owner**

	- Create owner profile
	- Create house (insert house info, upload photos and owner contact)
	- View house (Show result, Show detail)
	- Update (they can change their house info & upload new photos)
	- Delete house

**Administrator**

	- View owner profile
	- Delete owner profile
	- Allow users' authorities


# Configration #

`composer update`

then edit file

`vendor\heartsentwined\zf2-doctrine\bin\doctrine-cli.php`

to 


```php
     
<?php
use Zend\ServiceManager\ServiceManager;
use Zend\Mvc\Application;

chdir(__DIR__);

$previousDir = '.';

while (!file_exists('config/application.config.php')) {
    $dir = dirname(getcwd());

    if ($previousDir === $dir) {
        throw new RuntimeException(
            'Unable to locate "config/application.config.yml": ' .
            'is DoctrineModule in a subdir of your application skeleton?'
        );
    }

    $previousDir = $dir;
    chdir($dir);
}

if (!(@include_once __DIR__ . '/../vendor/autoload.php') && !(@include_once __DIR__ . '/../../../autoload.php')) {
    throw new RuntimeException('Error: vendor/autoload.php could not be found. Did you run php composer.phar install?');
}

$application = Application::init( require_once 'config/application.config.php' );

/* @var $cli \Symfony\Component\Console\Application */
$cli = $application->getServiceManager()->get('doctrine.cli');
$cli->run();


```