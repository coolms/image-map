<?php
/**
 * CoolMS2 Image Map Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/image-map for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsImageMap\Mapping\Traits;

use Doctrine\Common\Collections\ArrayCollection,
    Doctrine\Common\Collections\Collection,
    CmsImageMap\Mapping\MapInterface;

trait ImageMappableTrait
{
    /**
     * @var MapInterface[]
     *
     * @ORM\OneToMany(targetEntity="CmsImageMap\Mapping\MapInterface",
     *      mappedBy="image",
     *      orphanRemoval=true,
     *      cascade={"persist","remove"},
     *      fetch="EXTRA_LAZY")
     * @Form\Exclude()
     */
    protected $imageMaps = [];

    /**
     * __construct
     *
     * Initializes image maps
     */
    public function __construct()
    {
        $this->imageMaps = new ArrayCollection();
    }

    /**
     * @param MapInterface[] $maps
     * @return self
     */
    public function setImageMaps($maps)
    {
        $this->clearMaps();
        $this->addImageMaps($maps);

        return $this;
    }

    /**
     * @param MapInterface[] $maps
     * @return self
     */
    public function addImageMaps($maps)
    {
        foreach ($maps as $map) {
            $this->addImageMap($map);
        }

        return $this;
    }

    /**
     * @param MapInterface $map
     * @return self
     */
    public function addImageMap(MapInterface $map)
    {
        $this->getImageMaps()->add($map);
        if (!$map->getImage()) {
            $map->setImage($this);
        }

        return $this;
    }

    /**
     * @param MapInterface[] $maps
     * @return self
     */
    public function removeImageMaps($maps)
    {
        foreach ($maps as $map) {
            $this->removeImageMap($map);
        }

        return $this;
    }

    /**
     * @param MapInterface $map
     * @return self
     */
    public function removeImageMap(MapInterface $map)
    {
        $this->getImageMaps()->removeElement($map);
        return $this;
    }

    /**
     * @param MapInterface $map
     * @return bool
     */
    public function hasImageMap(MapInterface $map)
    {
        $this->getImageMaps()->contains($map);
    }

    /**
     * Removes all maps
     *
     * @return self
     */
    public function clearImageMaps()
    {
        $this->getImageMaps()->clear();
        return $this;
    }

    /**
     * @return Collection
     */
    public function getImageMaps()
    {
        return $this->imageMaps;
    }
}
