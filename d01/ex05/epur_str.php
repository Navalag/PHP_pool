#!/usr/bin/php
<?php

echo ($argc > 1) ? preg_replace('/ +/', ' ', trim($argv[1])) . "\n" : "";

?>