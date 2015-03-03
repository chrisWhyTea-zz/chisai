<?php


namespace konekobox\chisai\controllers;

use konekobox\chisai\repositories\ShorturlRepository;
use SlimController\SlimController;

/**
 * Class ShorturlController
 * @package konekobox\chisai\controllers
 */
class ShorturlController extends SlimController
{

    /**
     * @var ShorturlRepository
     */
    private $Shorturl;

    /**
     * @param \Slim\Slim $app
     */
    function __construct(\Slim\Slim &$app)
    {

        parent::__construct($app);
        $this->Shorturl = new ShorturlRepository();
    }


    /**
     *
     */
    public function indexAction()
    {
        $this->render('shorturl/index.twig');
    }

    /**
     *
     */
    public function createAction()
    {
        $shorttag = $this->Shorturl->create($this->app->request->post('url'));
        $this->app->redirect("/$shorttag/details");
    }

    /**
     * @param $shorttag
     */
    public function redirectAction($shorttag)
    {
        $shorturl = $this->Shorturl->getByShorttag($shorttag);
        $this->Shorturl->statisticVisit($shorturl);
        $this->app->redirect($shorturl->url);
    }

    /**
     * @param $shorttag
     */
    public function detailsAction($shorttag)
    {
        $shorturlDetails = $this->Shorturl->getByShorttag($shorttag)->as_array();

        $this->render('shorturl/details.twig', $shorturlDetails);
    }

}