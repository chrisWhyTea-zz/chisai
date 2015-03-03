<?php


namespace konekobox\chisai\repositories;


interface ShorturlRepositoryInterface
{
    function getByShorttag($shorttag);

    function getAll();

    function create($url);

    function statisticVisit(\Model $shorturl);
}