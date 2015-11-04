<?php
/**
 * CoolMS2 Image Map Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/image-map for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsImageMap;

return [
    'controllers' => [
        'invokables' => [
            'CmsImageMap\Controller\Admin' => 'CmsImageMap\Mvc\Controller\AdminController',
        ],
    ],
    'router' => [
        'routes' => [
            
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'cmsImageMap' => 'CmsImageMap\View\Helper\ImageMap',
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __NAMESPACE__ => __DIR__ . '/../view',
        ],
    ],
];
