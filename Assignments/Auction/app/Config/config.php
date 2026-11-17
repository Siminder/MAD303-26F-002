<?php

//Database Configuration
define("DB_HOST", "localhost");
define("DB_USER", "sbansal");
define("DB_PASSWORD", "jb9fjjb9fj");
define("DB_NAME", "sbansalauction");

// Add your name below
define("CONFIG_ADMIN", "Siminder Bansal");
define("CONFIG_ADMINEMAIL", "w0654525@myssc.ca");
// Add the location of your forums below
define("CONFIG_URL", "https://sbansal.scweb.ca/auction");
// Add your blog name below
define("CONFIG_AUCTIONNAME", "Your Online Auction");
// The currency used on the auction
define("CONFIG_CURRENCY", "$");

//Set Timezone
date_default_timezone_set("America/Toronto");

//Log Location
define("LOG_LOCATION", __DIR__ . "/../../logs/app.log");

//File Upload Location
define("FILE_UPLOADLOC", "imgs/");