<?php
// definition du port et de l'adresse du serveur
$host = "127.0.0.1";
$port = 25000;
// sans timeout!
set_time_limit(0);
// creation du  socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
// bind socket to port
$result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");
// ecoute sur la connection
$result = socket_listen($socket, 3) or die("Could not set up socket listener\n");

// accept
// spawn another socket to handle communication
$spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
// lecture client
$input = socket_read($spawn, 1024) or die("Could not read input\n");
// 
$input = trim($input);
echo "Client Message : ".$input;
//
$output = strrev($input) . "\n";
socket_write($spawn, $output, strlen ($output)) or die("Could not write output\n");
// close sockets
socket_close($spawn);
socket_close($socket);