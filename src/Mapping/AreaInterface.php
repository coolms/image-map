<?php
/**
 * CoolMS2 Image Map Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/image-map for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsImageMap\Mapping;

use CmsMap\Mapping\AreaInterface as GenericAreaInterface;

interface AreaInterface extends GenericAreaInterface
{
    /**
     * @param string $shape
     */
    public function setShape($shape);

    /**
     * @return string
     */
    public function getShape();
}
