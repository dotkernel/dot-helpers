<?php
/**
 * @see https://github.com/dotkernel/dot-helpers/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-helpers/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

namespace Dot\Helpers\Factory;

use Dot\Helpers\Route\RouteHelper;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Helper\ServerUrlHelper;
use Zend\Expressive\Helper\UrlHelper;

/**
 * Class RouteOptionHelperFactory
 * @package Dot\Helpers\Factory
 */
class RouteHelperFactory
{
    /**
     * @param ContainerInterface $container
     * @return RouteHelper
     */
    public function __invoke(ContainerInterface $container)
    {
        $urlHelper = $container->get(UrlHelper::class);
        $serverUrlHelper = $container->get(ServerUrlHelper::class);

        return new RouteHelper($urlHelper, $serverUrlHelper);
    }
}
