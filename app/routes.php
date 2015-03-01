<?php
/**
 * Render the Index page
 */
$app->get('/', function () use ($app) {
    $app->render('index.html');
});

/**
 * Create new Shorturl
 */
$app->post('/', function () use ($app) {
    $short = $app->shorturlRepo->create($app->request->post('url'));
    $app->redirect("/$short/details");
});

/**
 * Using the shorturl to redirect to the real url
 */
$app->get('/:short', function ($short) use ($app) {
    $shorturl = $app->shorturlRepo->getByShort($short);
    $app->shorturlRepo->statisticVisit($shorturl);
    $app->redirect($shorturl->url);

});

/**
 * Show some details for the shorturl
 */
$app->get('/:short/details', function ($short) use ($app) {

    $shorturlDetails = $app->shorturlRepo->getByShort($short);

    $app->render('details.html', [
        "url" => $shorturlDetails->url,
        "visitors" => $shorturlDetails->visitors,
        "created_at" => $shorturlDetails->created_at,
        "last_visited_at" => $shorturlDetails->last_visited_at,
        "short" => $shorturlDetails->short,
    ]);
});
