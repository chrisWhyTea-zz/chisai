<?php


namespace konekobox\chisai\controllers;

use konekobox\chisai\repositories\ShorturlRepository;
use SlimController\SlimController;

class ShorturlController extends SlimController
{

    private $Shorturl;

    function __construct(\Slim\Slim &$app)
    {

        parent::__construct($app);
        $this->Shorturl = new ShorturlRepository();
    }


    public function indexAction()
    {
        $this->render('index.twig');
    }

    public function createAction()
    {
        $shorttag = $this->Shorturl->create($this->app->request->post('url'));
        $this->app->redirect("/$shorttag/details");
    }

    public function redirectAction($shorttag)
    {
        $shorturl = $this->Shorturl->getByShort($shorttag);
        $this->Shorturl->statisticVisit($shorturl);
        $this->app->redirect($shorturl->url);
    }

    public function detailsAction($shorttag)
    {
        $shorturlDetails = $this->Shorturl->getByShort($shorttag);

        $this->render('details.twig', [
            "url" => $shorturlDetails->url,
            "visitors" => $shorturlDetails->visitors,
            "created_at" => $shorturlDetails->created_at,
            "last_visited_at" => $shorturlDetails->last_visited_at,
            "short" => $shorturlDetails->short,
        ]);
    }

}