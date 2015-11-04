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

interface ImageMappableInterface
{
    /**
     * @param MapInterface[] $maps
     * @return self
     */
    public function setImageMaps($maps);

    /**
     * @param MapInterface[] $maps
     * @return self
     */
    public function addImageMaps($maps);

    /**
     * @param MapInterface $map
     * @return self
     */
    public function addImageMap(MapInterface $map);

    /**
     * @param MapInterface[] $maps
     * @return self
     */
    public function removeImageMaps($maps);

    /**
     * @param MapInterface $map
     * @return self
     */
    public function removeImageMap(MapInterface $map);

    /**
     * @param MapInterface $map
     * @return bool
     */
    public function hasImageMap(MapInterface $map);

    /**
     * Removes all maps
     *
     * @return self
     */
    public function clearImageMaps();

    /**
     * @return MapInterface[]
     */
    public function getImageMaps();
}
