<?php 
/**
 * This is a Anax pagecontroller.
 *
 */
// Include the essential settings.
require __DIR__.'/config_with_app.php';
//$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);
$app->theme->configure(ANAX_APP_PATH . 'config/theme_me.php');
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');
/*
// Create services and inject into the app. 
$di->set('CommentController', function() use ($di) {
    $controller = new Phpmvc\Comment\CommentController();
    $controller->setDI($di);
    return $controller;
});
*/
/*
// Home route
$app->router->add('comment', function() use ($app) {

    $app->theme->setTitle("Welcome to Anax Guestbook");
    $app->views->add('comment/index');

    $app->views->add('comment/form', [
        'mail'      => null,
        'web'       => null,
        'name'      => null,
        'content'   => null,
        'output'    => null,
    ]);

    $app->dispatcher->forward([
        'controller' => 'comment',
        'action'     => 'view',
    ]);
});

*/

// Check for matching routes and dispatch to controller/handler of route
$app->router->handle();

// Render the page
$app->theme->render();
