<?php

use Symfony\Component\HttpFoundation\Request;

// Home page
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig');
});

// Details for a drug
$app->get('/drugs/{id}', function($id) use ($app) {
    $drug = $app['dao.drug']->find($id);
    return $app['twig']->render('drug.html.twig', array('drug' => $drug));
});

// List of all drugs
$app->get('/drugs/', function() use ($app) {
    $drugs = $app['dao.drug']->findAll();
    return $app['twig']->render('drugs.html.twig', array('drugs' => $drugs));
});

// Search form for drugs
$app->get('/drugs/search/', function() use ($app) {
    $families = $app['dao.family']->findAll();
    return $app['twig']->render('drugs_search.html.twig', array('families' => $families));
});

// Results page for drugs
$app->post('/drugs/results/', function(Request $request) use ($app) {
    $familyId = $request->request->get('family');
    $drugs = $app['dao.drug']->findAllByFamily($familyId);
    return $app['twig']->render('drugs_results.html.twig', array('drugs' => $drugs));
});

// Details for a practitien
$app->get('/practitioners/{id}', function($id) use ($app) {
    $practitioner = $app['dao.practitioner']->find($id);
    return $app['twig']->render('practitioner.html.twig', array('practitioner' => $practitioner));
});


//List of all practitiens
$app->get('/practitioners/', function() use ($app) {
    $practitioners = $app['dao.practitioner']->findAll();
    return $app['twig']->render('practitioners.html.twig', array('practitioners' => $practitioners));
});

// Search form for practitiens
$app->get('/practitioners/search/', function() use ($app) {
    $types = $app['dao.type']->findAll();
    return $app['twig']->render('practitioners_search.html.twig', array('types' => $types));
});


// Results page for practitiens
$app->post('/practitioners/results/', function(Request $request) use ($app) {
    $typeId = $request->request->get('type');
    $practitioners = $app['dao.practitioner']->findAllByType($typeId);
    return $app['twig']->render('practitioners_results.html.twig', array('practitioners' => $practitioners));
});
