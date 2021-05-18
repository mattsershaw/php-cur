<?php

echo '<pre>';
$array = [
            ['info' => ['name' => '田中', 'division' => '1', 'age' => '25'], 
            'skill' => ['lang' => ['PHP', 'Ruby'], 'fw' => ['Laravel', 'CakePHP', 'Rails']],
            'description' => 'バックエンドエンジニア'
            ],
            ['info' => ['name' => '山田', 'division' => '2', 'age' => '23'], 
            'skill' => ['lang' => ['HTML', 'CSS', 'JS'], 'fw' => ['Vue.js']],
            'description' => 'フロントエンジニア'
            ],
            ['info' => ['name' => '佐藤', 'division' => '2', 'age' => '20'], 
            'skill' => ['lang' => ['PHP'], 'fw' => []],
            'description' => 'PHP初学者'
            ]
         ];
var_dump($array);
echo '</pre>';

?>