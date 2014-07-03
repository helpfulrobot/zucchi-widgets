<?php

class WidgetPageExtension extends DataExtension {

    private static $many_many = array(
        'Widgets' => 'Widget'
    );

    private static $many_many_extraFields = array(
        'Widgets' => array(
            'WidgetOrder' => 'Int'
        )
    );

    public function updateCMSFields(FieldList $fields)
    {
        $widgetGrid = GridField::create(
            "Widgets",
            "Widgets",
            $this->GetWidgets(),
            GridFieldConfig_RecordEditor::create()
                ->removeComponentsByType("GridFieldAddNewButton")
                ->addComponent(new GridFieldAddNewMultiClass())
                ->addComponent(new GridFieldOrderableRows('WidgetOrder'))
        );

        $fields->addFieldToTab(
            "Root.Widgets", $widgetGrid
        );
    }

    public function GetWidgets()
    {
        return $this->getOwner()->getManyManyComponents('Widgets', '', 'WidgetOrder ASC');
    }
}