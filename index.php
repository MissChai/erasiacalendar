<?php

// Conf
require( 'app/conf/dev.php' );
//require( 'app/conf/prod.php' );

// Sources
require( 'src/App/Date.php' );
require( 'src/App/Route.php' );
require( 'src/App/Router.php' );

require( 'src/Controller/ApiController.php' );
require( 'src/Controller/CalendarController.php' );
require( 'src/Controller/EventController.php' );
require( 'src/Controller/LocationController.php' );
require( 'src/Controller/UserController.php' );

require( 'src/Entity/Event.php' );
require( 'src/Entity/Location.php' );
require( 'src/Entity/User.php' );

require( 'src/Repository/EventRepository.php' );
require( 'src/Repository/LocationRepository.php' );
require( 'src/Repository/UserRepository.php' );

// Session
session_start();

// Routes
require( 'app/routes.php' );