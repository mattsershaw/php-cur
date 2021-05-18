<?php
namespace App\Controller;
 
use App\Controller\AppController;
use Cake\Validation\Validator;
// $validator = new Validator();の記述をする際は上のCake〜Validatorが必要
 
class LargeareaController extends AppController // controllerの名前は途中大文字厳禁
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
        $data = $this->Largearea->find('all');
        $this->set('large_area', $data); // ''内がsql文?
    }

    public $helpers = [
        'Paginator' => ['templates' => 
            'paginator-templates']
    ];
}