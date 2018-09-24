<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use AppBundle\AppBundle;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
        /*	new MdlpBundle\MdlpBundle(),
        	new MdlpAdminBundle\MdlpAdminBundle(),
        	new MdlpSitioBundle\MdlpSitioBundle(),
        	new MdlpPanelBundle\MdlpPanelBundle(),*/
        new AppBundle(),
        	new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
        	new JMS\TranslationBundle\JMSTranslationBundle(),
        	new Comur\ImageBundle\ComurImageBundle(),
        	new FOS\UserBundle\FOSUserBundle(),
        //	new JavierEguiluz\Bundle\EasyAdminBundle\EasyAdminBundle(),
        new EasyCorp\Bundle\EasyAdminBundle\EasyAdminBundle(),
        	new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
        new Avanzu\AdminThemeBundle\AvanzuAdminThemeBundle(),
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test', 'dev_lg','dev_vg'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
        }

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        if(($this->getEnvironment() == "vg")||($this->getEnvironment() == "dev_vg")) {
            $loader->load($this->getRootDir().'/config/vg/config_'.$this->getEnvironment().'.yml');
        } elseif(($this->getEnvironment() == "lg")||($this->getEnvironment() == "dev_lg")) {
            $loader->load($this->getRootDir().'/config/lg/config_'.$this->getEnvironment().'.yml');
        } else {
            $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
        }
    }
}
