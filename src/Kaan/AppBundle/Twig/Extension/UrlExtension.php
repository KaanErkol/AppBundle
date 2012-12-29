<?php

namespace Kaan\DevBundle\Twig\Extension;

class UrlExtension extends \Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            'sifrele' => new \Twig_Filter_Method($this,'sifrele'),
        );
    }

    public function sifrele($phone)
    {
        $ilkuc = substr($phone, 0,3);
        $sondort = substr($phone, 6,10);
        return '('.$ilkuc.') *** '.$sondort;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'your_extension';
    }
}