<?php

namespace AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use MdlpAdminBundle\DependencyInjection\Compiler\OverrideServiceCompilerPass;

class AppBundle extends Bundle
{
	public function build(ContainerBuilder $container) {
		parent::build($container);
	}
}
