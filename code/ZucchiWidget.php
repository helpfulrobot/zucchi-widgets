<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 25/06/14
 * Time: 15:08
 */

class ZucchiWidget extends DataObject{

    private static $db = array(
        'Title' => 'Text',
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main',new TextField('Title', 'Title'));

        return $fields;
    }

    public function forTemplate()
    {
        if (function_exists('get_called_class')) {
            $class = get_called_class();
            return $this->renderWith($class);
        }
        return '';
    }

}