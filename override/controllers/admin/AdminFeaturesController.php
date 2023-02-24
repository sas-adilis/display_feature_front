<?php

class AdminFeaturesController extends AdminFeaturesControllerCore
{
    public function renderForm()
    {
        $this->toolbar_title = $this->trans('Add a new feature', [], 'Admin.Catalog.Feature');
        $this->fields_form = [
            'legend' => [
                'title' => $this->trans('Feature', [], 'Admin.Catalog.Feature'),
                'icon' => 'icon-info-sign',
            ],
            'input' => [
                [
                    'type' => 'text',
                    'label' => $this->trans('Name', [], 'Admin.Global'),
                    'name' => 'name',
                    'lang' => true,
                    'size' => 33,
                    'hint' => $this->trans('Invalid characters:', [], 'Admin.Notifications.Info') . ' <>;=#{}',
                    'required' => true,
                ],
                [
                    'type' => 'switch',
                    'label' => $this->l('Affichée sur le front'),
                    'name' => 'display_in_front',
                    'required' => false,
                    'is_bool' => true,
                    'values' => [
                        [
                            'id' => 'display_in_front_on',
                            'value' => 1,
                            'label' => $this->l('Oui')
                        ],
                        [
                            'id' => 'display_in_front_off',
                            'value' => 0,
                            'label' => $this->l('Non')
                        ]
                    ]
                ],
            ],
        ];

        if (Shop::isFeatureActive()) {
            $this->fields_form['input'][] = [
                'type' => 'shop',
                'label' => $this->trans('Shop association', [], 'Admin.Global'),
                'name' => 'checkBoxShopAsso',
            ];
        }

        $this->fields_form['submit'] = [
            'title' => $this->trans('Save', [], 'Admin.Actions'),
        ];

        return AdminController::renderForm();
    }
}