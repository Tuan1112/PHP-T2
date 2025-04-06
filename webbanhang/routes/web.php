$router->get('/Category/list', 'CategoryController@list');
$router->get('/Category/add', 'CategoryController@add');
$router->post('/Category/add', 'CategoryController@add');
$router->get('/Category/edit/{id}', 'CategoryController@edit');
$router->post('/Category/edit/{id}', 'CategoryController@edit');
$router->get('/Category/delete/{id}', 'CategoryController@delete');
$router->get('/admin', 'AdminController@index');
$router->get('/account/profile', 'AccountController@profile');

$router->get('/Order/newOrders', 'OrderController@newOrders');
$router->get('/Order/processing', 'OrderController@processing');
$router->get('/Order/completed', 'OrderController@completed');
$router->get('/Order/details/{id}', 'OrderController@details');
$router->post('/Order/updateStatus/{id}', 'OrderController@updateStatus');
$router->get('/Order/statistics', 'OrderController@statistics');
