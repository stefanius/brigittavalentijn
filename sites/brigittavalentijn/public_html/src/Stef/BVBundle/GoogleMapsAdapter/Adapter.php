<?php

namespace Stef\BVBundle\GoogleMapsAdapter;

use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\Overlays\Marker;
use Symfony\Component\HttpFoundation\ParameterBag;

class Adapter {

    /**
     * @var Map
     */
    protected $map;

    function __construct(Map $map)
    {
        $this->map = $map;
    }

    public function buildMap(ParameterBag $options)
    {
        $this->autozoom($options);
        $this->centerMap($options);
        $this->stylesheet($options);

        $markerSettings = $this->detectMarkerSettings($options);
        $markers = $this->createMarkers($markerSettings);

        foreach ($markers as $marker) {
            $this->map->addMarker($marker);
        }

        $this->map->setMapOption('zoom', 16);
        return $this->map;
    }

    protected function hasAndGetValue(ParameterBag $options, $key)
    {
        if ($options->has($key)) {
            return $options->get($key);
        }

        return null;
    }

    protected function detectMarkerSettings(ParameterBag $options)
    {
        $markerKeys = [];
        $regex = "/(" . AdapterSettings::GOOGLE_MAPS . "_" . AdapterSettings::MARKER_PREFIX . ")_(?P<marker_id>[\d]{2})_(?P<setting>[a-z_]+)/i";

        $keys = $options->keys();

        foreach ($keys as $key) {
            if (preg_match($regex, $key, $matches)) {
                $markerKeys[$matches['marker_id']][$matches['setting']] = $options->get($key);
            }
        }

        return $markerKeys;
    }

    protected function stylesheet(ParameterBag $options)
    {
        $settings = [];
        $regex = "/(" . AdapterSettings::GOOGLE_MAPS . "_" . AdapterSettings::STYLESHEET_PREFIX . ")_(?P<setting>[a-z_]+)/i";

        $keys = $options->keys();

        foreach ($keys as $key) {
            if (preg_match($regex, $key, $matches)) {
                $settings[$matches['setting']] = $options->get($key);
            }
        }

        $this->map->setStylesheetOptions($settings);
    }

    protected function autozoom($options)
    {
        $result = $this->hasAndGetValue($options, AdapterSettings::GOOGLE_MAPS . '_' . AdapterSettings::AUTOZOOM);

        if ($result !== null) {
            $this->map->setAutoZoom($result);
        }
    }

    protected function centerMap($options)
    {
        $lat = $this->hasAndGetValue($options, AdapterSettings::GOOGLE_MAPS . '_' . AdapterSettings::CENTER_LAT_POS);
        $lng = $this->hasAndGetValue($options, AdapterSettings::GOOGLE_MAPS . '_' . AdapterSettings::CENTER_LNG_POS);

        $this->map->setCenter($lat, $lng);
    }

    protected function createMarkers($markerSettings)
    {
        $markers = [];

        foreach ($markerSettings as $key=>$markerSetting) {
            $marker = new Marker();

            $marker->setPosition($markerSetting[AdapterSettings::MARKER_LAT_POS],
                $markerSetting[AdapterSettings::MARKER_LNG_POS],
                $markerSetting[AdapterSettings::MARKER_NO_WRAP_POS]
            );

            unset($markerSetting[$markerSetting[AdapterSettings::MARKER_LAT_POS]]);
            unset($markerSetting[$markerSetting[AdapterSettings::MARKER_LNG_POS]]);
            unset($markerSetting[$markerSetting[AdapterSettings::MARKER_NO_WRAP_POS]]);

            $markers[$key] = $marker;
        }

        return $markers;
    }

    protected function setOptions(ParameterBag $options)
    {

    }
}