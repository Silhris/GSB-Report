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

//List of all reports
$app->get('/reports/', function() use ($app) {
    $reports = $app['dao.report']->findAll();
    return $app['twig']->render('reports.html.twig', array('reports' => $reports));
});

//Add a report
$app->get('/report/add/', function() use ($app) {
    $practionners = $app['dao.practitioner']->findAll();
    return $app['twig']->render('reports_add.html.twig', array('practitionners' => $practionners));
});

//Manque le visitor_id
$app->post('/report/add/', function(Request $request) use ($app) {
    $addReport = $request->request->get('addReport');
    $app['db']->query('insert into VISIT_REPORT (practitioner_id, visitor_id, reporting_date, assessment, purpose) VALUES ('.$addReport['practitioner_id'].', 1, "'.$addReport['reporting_date'].'","'.$addReport['assessment'].'", "'.$addReport['purpose'].'")');
    return $app['twig']->render('reports_add.html.twig', array('report' => $addReport));
});

// Detailed info about an article
//Tout modifier #Fleme#PlusTard
$app->match('/article/{id}', function ($id, Request $request) use ($app) {
    $article = $app['dao.article']->find($id);
    $user = $app['security']->getToken()->getUser();
    $commentFormView = NULL;
    if ($app['security']->isGranted('IS_AUTHENTICATED_FULLY')) {
// A user is fully authenticated : he can add comments
        $comment = new Comment();
        $comment->setArticle($article);
        $comment->setAuthor($user);
        $commentForm = $app['form.factory']->create(new CommentType(), $comment);
        $commentForm->handleRequest($request);
        if ($commentForm->isValid()) {
            $app['dao.comment']->save($comment);
            $app['session']->getFlashBag()->add('success', 'Your comment was succesfully added.');
        }
        $commentFormView = $commentForm->createView();
    }
    $comments = $app['dao.comment']->findAllByArticle($id);
    return $app['twig']->render('article.html.twig', array(
                'article' => $article,
                'comments' => $comments,
                'commentForm' => $commentFormView));
});



// Login form
$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
                'error' => $app['security.last_error']($request),
                'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('login');  // named route so that path('login') works in Twig templates
// Login form
$app->get('/account', function(Request $request) use ($app) {
    return $app['twig']->render('account.html.twig', array(
                'error' => $app['security.last_error']($request),
                'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('account');  // named route so that path('login') works in Twig templates


//$token = $app['security']->getToken();
//if(null != $token)
//  $visitor = $token->getUser();
//echo $visitor->getUsername()