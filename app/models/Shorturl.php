<?php


namespace konekobox\chisai\models;


/**
 * Class Shorturl
 * @package konekobox\chisai\models
 */
class Shorturl extends \Model
{
    /**
     * @var bool
     */
    public static $_table_use_short_name = true;
    /**
     * @var string
     */
    public static $_id_column = 'shorttag';
}