<?php
/**
 * CoolMS2 Image Map Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/image-map for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsImageMap\View\Helper;

use Zend\View\Helper\AbstractHelper,
    CmsCommon\Stdlib\ArrayUtils,
    CmsCommon\View\Helper\Map,
    CmsImage\View\Helper\Image,
    CmsImageMap\Mapping\MapInterface;

/**
 * View Helper to render objects implementing MapInterface
 *
 * @author Dmitry Popov <d.popov@altgraphic.com>
 */
class ImageMap extends AbstractHelper
{
    /**
     * @var Image
     */
    protected $imageHelper;

    /**
     * @var string
     */
    protected $defaultImageHelper = 'cmsImage';

    /**
     * @var Map
     */
    protected $mapHelper;

    /**
     * @var string
     */
    protected $defaultMapHelper = 'map';

    /**
     * @param MapInterface $map
     * @param array $attribs
     * @return self|string
     */
    public function __invoke(MapInterface $map = null, array $attribs = [])
    {
        if (0 === func_num_args()) {
            return $this;
        }

        return $this->render($map, $attribs);
    }

    /**
     * @param MapInterface $map
     * @param array $attribs
     * @return string
     */
    public function render(MapInterface $map, array $attribs = [])
    {
        $imageHelper = $this->getImageHelper();
        $mapHelper = $this->getMapHelper();

        $image = $map->getImage();
        $attribs = array_merge_recursive($image->getAttribs(), $attribs);

        $id = $name = 'cms-image-map-' . $map->getId();

        $attribs['usemap'] = '#' . $name;
        $attribs = array_merge_recursive($attribs, ['class' => 'cms-image-map']);

        if ($map->hasAreas()) {
            $areas = ArrayUtils::iteratorToArray($map->getAreas(), false);
        } else {
            $areas = [];
        }

        return $imageHelper($image, $attribs) . PHP_EOL . $mapHelper($areas, compact('id', 'name'));
    }

    /**
     * @return Image
     */
    protected function getImageHelper()
    {
        if (null === $this->imageHelper) {
            $renderer = $this->getView();
            if (method_exists($renderer, 'plugin')) {
                $this->imageHelper = $renderer->plugin($this->defaultImageHelper);
            }

            if (!$this->imageHelper instanceof Image) {
                $this->imageHelper = new Image();
                $this->imageHelper->setView($this->getView());
            }
        }

        return $this->imageHelper;
    }

    /**
     * @return Map
     */
    protected function getMapHelper()
    {
        if (null === $this->mapHelper) {
            $renderer = $this->getView();
            if (method_exists($renderer, 'plugin')) {
                $this->mapHelper = $renderer->plugin($this->defaultMapHelper);
            }

            if (!$this->mapHelper instanceof Map) {
                $this->mapHelper = new Map();
                $this->mapHelper->setView($this->getView());
            }
        }

        return $this->mapHelper;
    }
}
