<?php



use DockerSdk\Client;

/*
 * Example Usage:
 */
$client = new Client('/var/run/docker.sock');

$dockerContainers  = $client->dispatchCommand('/containers/json');
foreach ($dockerContainers as $container) {
  printf("%s (%s) - %s\n", implode(', ', $container['Names']),
      $container['Id'], $container['Image']);
}


$dockerVersion = $client->dispatchCommand('/version');
printf("%s (%s - %s)", $dockerVersion['Version'],
    $dockerVersion['Os'], $dockerVersion['KernelVersion']);