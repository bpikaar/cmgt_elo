<?php

/**
 * Created by PhpStorm.
 * User: Bob
 * Date: 29-1-2016
 * Time: 13:06
 */
namespace App\Models\Common;

/**
 * Class Status of the building block
 */
abstract class Status
{
    const Open = 0;
    const Busy = 1;
    const Done = 2;
}