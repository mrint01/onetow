<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('_voiture', new Route('/Voiture', array(
    '_controller' => 'ParcBundle:Voiture:Voiture',
)));

return $collection;