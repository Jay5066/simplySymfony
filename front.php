<?
	

	require_once __DIR__ . "/vendor/autoload.php";

	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\Routing;

	$request = Request::createFromGlobals();

	
	// $routes = array(
	// 	'/hello' =>'hello',
	// 	'/buy' =>'buy',
	// 	'/info' =>'info',
	// );

	$routes = include __DIR__ .'/src/app.php';

	$context = new Routing\RequestContext();
	$context->fromRequest($request);

	$matcher = new Routing\Matcher\UrlMatcher($routes,$context);
		
	// $path = $request->getPathInfo();


	// if(isset($map[$path])){
	// 	ob_start();
	// 	//var_dump($request->query->all());exit;
	// 	extract($request->query->all(),EXTR_SKIP);
	// 	include sprintf(__DIR__.'/src/pages/%s.php',$map[$path]);
	// 	$response = new Response(ob_get_clean());
	// }else{
	// 	$response = new Response('Not Found',404);
	// }

	try{
		extract($matcher->match($request->query->all(),EXTR_SKIP));
		//print $request->query->all();exit;
		ob_start();
		include sprintf(__DIR__.'/src/pages/%s.php',$routes);
		$response = new Response(ob_get_clean());
	}catch(Routing\Exception\ResourceNotFoundException $e){
		$response = new Response('Not Found',404);
	}catch(Exception $e){
		$response = new Response('An error occured',500);
	}

	$response->send();







