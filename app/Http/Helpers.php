<?php


function loadingState($key, $text){
    $loader = '<div wire:loading wire:target='.$key.' wire:key='.$key.'><i class="fa fa-spinner fa-spin"></i></div> '.$text.'';

    return $loader;
}