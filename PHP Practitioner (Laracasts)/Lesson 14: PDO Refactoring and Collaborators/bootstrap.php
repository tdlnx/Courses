<?php

require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'functions.php';

$query = new QueryBuilder(
    Connection::make()
);
