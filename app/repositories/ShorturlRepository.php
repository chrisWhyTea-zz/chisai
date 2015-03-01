<?php

namespace konekobox\chisai\repositories;

use Carbon\Carbon;

class ShorturlRepository implements ShorturlRepositoryInterface
{

    function getByShort($short)
    {
        return \Model::factory('Shorturl')->findOne($short);
    }

    function getAll()
    {
        return \Model::factory('Shorturl')->findMany();

    }

    function create($url)
    {
        // TODO: Add validation for the URL
        $now = Carbon::now();
        $shorturl = \Model::factory('Shorturl')->create();
        $shorturl->url = $url;
        $shorturl->short = $this->uuid();
        $shorturl->created_at = $now;
        $shorturl->save();
        return $shorturl->short;
    }

    function delete(\Model $shortM)
    {
        // TODO: Implement delete() method.
    }

    function statisticVisit(\Model $shorturl)
    {
        $shorturl->visitors++;
        $shorturl->last_visited_at = Carbon::now();
        $shorturl->save();
    }

    /**
     * thx to http://quantblog.wordpress.com/ for this algorithm for shorter unique_id
     * @param int $lenght
     * @return string
     */
    private function uuid($length=6) {

        // create a unique id with 2 salts (yes it's hilarious)
        $saltedUnique = md5("nNzAGXDLdznZUiKHHQdzsqMV3irmriMn6F" . uniqid("", true). "tnuyPfJNqUVALE9BUwCuHZzxqtCmVgErWL");

        // pack the salted uniqueid to hex
        $pack = pack('H*', $saltedUnique);

        // and base64 encode it ...
        $tmp =  base64_encode($pack);

        //remove chars that can't be used
        $uid = preg_replace("#(*UTF8)[^A-Za-z0-9]#", "", $tmp);

        $length = max(4, min(128, $length));


        while (strlen($uid) < $length)
            $uid .= uuid(22);

        return substr($uid, 0, $length);
    }
}