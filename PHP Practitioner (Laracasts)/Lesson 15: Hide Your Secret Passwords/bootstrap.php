<?php

require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'functions.php';
$config = require 'config.php';

$query = new QueryBuilder(
    Connection::make($config['database'])
);
