<?php namespace Khoa\Warehouse\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Renatio\DynamicPDF\Classes\PDF;
use Redirect;
use Session;

class Warehouse extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Khoa.Warehouse', 'main-menu-item');
    }

    public function onExport() {
        $array_id = post('checked');

        Session::put('array_id', $array_id);

        // PDF::loadTemplate($templateCode, $data)->save('storage/app/my_stored_file.pdf');
        return Redirect::to( 'export-pdf-warehouse' );
    }
}
