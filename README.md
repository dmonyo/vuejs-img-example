# Image Management App

An application to get images properties according the alias. The application uses the library [jbzoo/image](https://packagist.org/packages/jbzoo/image) to manipulate the images information.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

### Prerequisites

In order to get this application up and running you need to have installed PHP (5.6 or above) and Composer.

* [PHP.net](http://php.net/manual/es/install.php) - Installation guide according your OS.

* [Composer.org](https://getcomposer.org/doc/00-intro.md) Installation guide according your OS.


### Installing

Once you have PHP and composer up and running, on a command line type in the following commands:

```
$ cd path/to/your/app/root/folder
$ composer install
```

To serve in php server

```
$ php -S localhost:8000
```

You can access the application with the following URL

```
http://localhost:8000
```


End with an example of getting some data out of the system or using it for a little demo

## Running the tests

This application can be tested succesfully with this set of data:

```
[
	'flowers' => './assets/images/flowers.jpeg',
	'dogs' => './assets/images/dogs.jpeg',
	'people' => './assets/images/people.jpeg',
	'beach' => './assets/images/beach.jpeg',
	'forrest' => './assets/images/forrest.jpeg',
	'sunflowers' => './assets/images/sunflowers.jpeg',

]
```

The data is disposed as an array("alias" => "URL"). Using these aliases you can have the info regarding the corresponding image found. If an alias image is not found, it won't appear in the result.

```
{"count":6,"data":[{"height":183,"width":275,"url":"http:\/\/localhost:8000\/.\/assets\/images\/flowers
.jpeg"},{"height":168,"width":300,"url":"http:\/\/localhost:8000\/.\/assets\/images\/dogs.jpeg"},{"height"
:144,"width":350,"url":"http:\/\/localhost:8000\/.\/assets\/images\/people.jpeg"},{"height":168,"width"
:300,"url":"http:\/\/localhost:8000\/.\/assets\/images\/beach.jpeg"},{"height":183,"width":275,"url"
:"http:\/\/localhost:8000\/.\/assets\/images\/forrest.jpeg"},{"height":183,"width":275,"url":"http:\
/\/localhost:8000\/.\/assets\/images\/sunflowers.jpeg"}]}
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [PHP](http://php.net) - Used to code the backend API
* [HTML](https://www.w3.org/html/) - Used to generate the web page
* [Bootstrap 3](https://getbootstrap.com/docs/3.3/) - Used to style the page
* [VueJS] (http://vuejs.org) - Used to program behavior in Front End


## Authors

* **David Moreno**  - [Github repo](https://github.com/dmonyo)


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details


