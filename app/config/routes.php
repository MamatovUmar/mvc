<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index' 
    ],
    'create-task' => [
        'controller' => 'main',
        'action' => 'createTask' 
    ],
    'task-add' => [
        'controller' => 'main',
        'action' => 'taskAdd' 
    ],
    'login' => [
        'controller' => 'main',
        'action' => 'login' 
    ],
    'logout' => [
        'controller' => 'main',
        'action' => 'logout' 
    ],
    'auth' => [
        'controller' => 'main',
        'action' => 'auth' 
    ],
    'admin' => [
        'controller' => 'admin',
        'action' => 'index'
    ],
    'admin/create-task' => [
        'controller' => 'admin',
        'action' => 'createTask'
    ],
    'admin/update-task' => [
        'controller' => 'admin',
        'action' => 'updateTask',
        'id' => ''
    ],
    'admin/update' => [
        'controller' => 'admin',
        'action' => 'update',
    ],
];
