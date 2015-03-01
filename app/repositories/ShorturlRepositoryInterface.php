<?php


namespace konekobox\chisai\repositories;


interface ShorturlRepositoryInterface
{
    function getByShort($short);

    function getAll();

    function create($url);

    function statisticVisit(\Model $shorturl);
}