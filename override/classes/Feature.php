<?php

class Feature extends FeatureCore
{
    /** @var bool Status for display in front */
    public $display_in_front = 0;

    public function __construct($id = null, $id_lang = null, $id_shop = null, $translator = null)
    {
        self::$definition['fields']['display_in_front'] = ['type' => self::TYPE_INT, 'validate' => 'isInt', 'shop' => true];
        parent::__construct($id, $id_lang, $id_shop, $translator);
    }
}