<?php

$counter_model = $this->loadModel('CounterModel');

if(!isset($_SESSION['counter_ip']))
{
    $counter_model->addCounter();
    $_SESSION['counter_ip'] = true;
}

$counterDay = $counter_model->getCounterToday();
$counterAll = $counter_model->getCounterAll();

