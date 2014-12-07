<?php

namespace Stef\BVBundle\GoogleMapsAdapter;


class AdapterSettings {

    const GOOGLE_MAPS                     = 'google_maps';

    /* markers */
    const MARKER_PREFIX                   = 'marker_setting'; // for each marker set 'marker_prefix_' followed by a marker ID and the setting ID i.e. marker_setting_01_clickable:TRUE
    const MARKER_OPTION_CLICKABLE         = 'clickable';
    const MARKER_OPTION_FLAT              = 'flat';
    const MARKER_LAT_POS                  = 'lat'; //Latitude postion
    const MARKER_LNG_POS                  = 'lng'; //Longitude postion
    const MARKER_NO_WRAP_POS              = 'no_wrap'; //Wrap to setting

    /* stylesheet options */
    const STYLESHEET_PREFIX               = 'stylesheet_setting';
    const STYLESHEET_CONTAINER_HEIGHT     = 'height';
    const STYLESHEET_CONTAINER_WIDTH      = 'width';

    /* misc options */
    const AUTOZOOM                        = 'autozoom';
    const CENTER_LAT_POS                  = 'center_pos_lat'; //Latitude postion
    const CENTER_LNG_POS                  = 'center_pos_lng'; //Longitude postion

    private function __construct() {}
}