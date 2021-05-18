<?php
namespace App\Controller;
 
use App\Controller\AppController;
use Cake\Validation\Validator;
// $validator = new Validator();の記述をする際は上のCake〜Validatorが必要
 
class CityController extends AppController
{
    public $paginate = [
        'limit' => 50,
        'order' => [
            'Large_area.name' => 'asc'
        ]
    ];
     
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index()
    {
        $id = $this->request->query['prefecture_id'];
        $data = $this->City->find('all')->where(['prefecture_id' => $id]);
        $this->set('data', $data);
    }

    public $helpers = [
        'Paginator' => ['templates' => 
            'paginator-templates']
    ];
}