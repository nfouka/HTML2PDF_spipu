<?php

namespace UGA\Html2PDFBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UGAHtml2PDFBundle:Default:index.html.twig');
    }
}
