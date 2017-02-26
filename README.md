# Twig2PDF_SPIPU LIB
Twig2pdf for Symfony 2.8 LTS 
<img src="https://github.com/nfouka/HTML2PDF_spipu/blob/master/logo.png?raw=true" /> <br/>

Twig2pdf Bundle
=====================
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nfouka/HTML2PDF_spipu/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nfouka/HTML2PDF_spipu/?branch=master)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%205.5-8892BF.svg)](https://php.net/)
[![License](https://img.shields.io/packagist/l/goaop/goaop-symfony-bundle.svg)](https://packagist.org/packages/goaop/goaop-symfony-bundle)
[![Build Status](https://scrutinizer-ci.com/g/nfouka/HTML2PDF_spipu/badges/build.png?b=master)](https://scrutinizer-ci.com/g/nfouka/HTML2PDF_spipu/build-status/master)


Twig2pdf for Symfony 2/Drupal 8 as a service.
```shell
 _______        _____ ____ _  _   ____  ____  _____ 
|_   _\ \      / /_ _/ ___| || | |  _ \|  _ \|  ___|
  | |  \ \ /\ / / | | |  _| || |_| |_) | | | | |_   
  | |   \ V  V /  | | |_| |__   _|  __/| |_| |  _|  
  |_|    \_/\_/  |___\____|  |_| |_|   |____/|_|    
                                                    
 ____  _   _ _   _ ____  _     _____   ______   __
| __ )| | | | \ | |  _ \| |   | ____| | __ ) \ / /
|  _ \| | | |  \| | | | | |   |  _|   |  _ \\ V / 
| |_) | |_| | |\  | |_| | |___| |___  | |_) || |  
|____/ \___/|_| \_|____/|_____|_____| |____/ |_|  
                                                  
 ____  _        _    _   _ _____ _____ ____  ____  _______     __
|  _ \| |      / \  | \ | | ____|_   _/ __ \|  _ \| ____\ \   / /
| |_) | |     / _ \ |  \| |  _|   | |/ / _` | | | |  _|  \ \ / / 
|  __/| |___ / ___ \| |\  | |___  | | | (_| | |_| | |___  \ V /  
|_|   |_____/_/   \_\_| \_|_____| |_|\ \__,_|____/|_____|  \_/   
                                      \____/                     

```

How to install ?
----------------

Just add this to your composer.json file:

```js
"require": {
  "uga/twig2pdf-bundle": "^1.1"
}
```
Enable it in the Kernel

```php
new UGA\Html2PDFBundle\UGAHtml2PDFBundle() , 
```

How to make it  ?
------------

In your controller:
```php
    protected $pdf2html  ; 

    public function __construct(
                \UGA\Html2PDFBundle\Factory\Html2pdfFactory $pdf2html 
            )
    {
        $this->pdf2html         = $pdf2html ; 
    }
```


In your action:

```php
    $html2pdf =  $this->pdf2html->getInstance() ;
    $html2pdf->WriteHTML($template);
    $html2pdf->Output('exemple.pdf');
```

You can pass every option you would pass to twig2pdf, for instance :

```
$html2pdf = $this->pdf2html->getInstance('P', 'A4', 'en', true, 'UTF-8', array(10, 15, 10, 15)); or by container
$html2pdf =  $this->container->get('uga_html2_pdf.service')->getInstance('P', 'A4', 'fr', null, null, null);
```

If the previous arguments are not provided, the factory uses its own default values. You can
change this default values by adding the bundle configuration to your `app/config/config.yml` :

```yml
uga_html2_pdf:
    html2_pdf_orientation: 'P'
    html2_pdf_format: 'A4'
    html2_pdf_lang: 'fr'
    html2_pdf_unicode: true
    html2_pdf_encoding: 'UTF-8'
    html2_pdf_margin: [10,15,10,15]
```

Integration with twig template :
```php
    $template = $this->template->render('AcmeMyAppBundle:Default:index.html.twig',array(
        'CLASS_HTML2PDF' => "HTML2PDF FOR SYMFONY 2.8.18 "
    )) ;  
    

    $html2pdf =  $this->pdf2html->getInstance() ;
    $html2pdf->WriteHTML($template);
    $html2pdf->Output('exemple.pdf');
```


Full example ( Controller ) :
```php
    <?php

namespace Acme\MyAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    
    protected $entityManager  ; 
    protected $template  ; 
    protected $pdf2html  ; 

    public function __construct(
                \Doctrine\ORM\EntityManager $entityManager , 
                \Twig_Environment $template  , 
                \UGA\Html2PDFBundle\Factory\Html2pdfFactory $pdf2html 
            )
    {
        $this->entityManager    = $entityManager;
        $this->template         = $template ; 
        $this->pdf2html         = $pdf2html ; 
    }
    
    public function indexAction()
    {

    $template = $this->template->render('AcmeMyAppBundle:Default:index.html.twig',array(
        'CLASS_HTML2PDF' => "CLASS HTML2PDF FOR SYMFONY 2.8.18 "
    )) ;  
    

    $html2pdf =  $this->pdf2html->getInstance() ;
    $html2pdf->WriteHTML($template);
    $html2pdf->Output('exemple.pdf');
    
        return $this->render('AcmeMyAppBundle:Default:index.html.twig');
    }
}

```


Update package in vendor project ?
----------------------------------

```
composer install
```


Information:
------------

* Programmer: Spipu
* Web Site  : http://html2pdf.fr/
* Wiki      : http://html2pdf.fr/en/wiki
* Support   : http://html2pdf.fr/en/forum

Contact Me
----------
Nadir Fouka < nadir@fouka.ovh > 
* Web Developer Grenoble Alpes University 2017
* Data Scientist Planet@Dev
