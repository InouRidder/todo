<?php

require 'models/todo.php';
require 'controllers/index.php';
require 'core/database/repository.php';

$config = require 'config.php';
$db_config = $config['database'];
$repo = new Repository($db_config);

require 'core/routes.php';

require 'core/functions.php';
