<?php

class display_feature_front extends Module {

    function __construct()
    {
        $this->name = 'display_feature_front';
        $this->author = 'Adilis';
        $this->need_instance = 0;
        $this->bootstrap = true;
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->displayName = $this->l('Hide/Show feature in front');
        $this->description = $this->l('Allow to choose if feature should be displayed in front');

        parent::__construct();
    }
    
    public function install() {
        return parent::install() && $this->createDatabaseFields();
    }

    private function createDatabaseFields()
    {
        $definitions = Db::getInstance()->executeS('DESCRIBE '._DB_PREFIX_.'feature');
        $field_exists = false;
        foreach($definitions as $definition) {
            if ($definition['Field'] == 'display_in_front') {
                $field_exists = true;
                break;
            }
        }
        if (!$field_exists) {
            Db::getInstance()->execute('
                ALTER TABLE '._DB_PREFIX_.'feature
                ADD `display_in_front` tinyint(1) unsigned NOT NULL DEFAULT "1"
            ');
        }

        $definitions = Db::getInstance()->executeS('DESCRIBE '._DB_PREFIX_.'feature_shop');
        $field_exists = false;
        foreach($definitions as $definition) {
            if ($definition['Field'] == 'display_in_front') {
                $field_exists = true;
                break;
            }
        }
        if (!$field_exists) {
            Db::getInstance()->execute('
                ALTER TABLE '._DB_PREFIX_.'feature_shop
                ADD `display_in_front` tinyint(1) unsigned NOT NULL DEFAULT "1"
            ');
        }

        return true;
    }

}