<?php

namespace  Step;

use Step\Http\Request;
use Step\Http\Response;

class Application
{
    function __construct()
    {
    }

    /*
     * @return Step\Http\Response
     */
    public function handle(Request $request)
    {
    	$routesMapping = require(app_path('routes.php'));

    	foreach ($routesMapping as $condition => $handler) 
    	{
    		$route = explode(':', $condition);
    		
    		if($request->matchRoute($route[1]))
            {
                if($route[0] == $_SERVER['REQUEST_METHOD'])
                    return $this->callHandler($handler);
            }
    	}

    	return new Response('Error: 404 Not fouded');
    }

    /*
     * @return Step\Http\Response
     */
    protected function callHandler($handler)
    {
        $controller = '\\App\\Controllers\\' . explode('@', $handler)[0];
        $method = explode('@', $handler)[1];

        $controllerInstance = new $controller();
        if(method_exists($controllerInstance, $method))
        {
            $result = call_user_func([$controllerInstance, $method]);
        }

        if($result instanceof Response)
        {
            return $result;
        }

        if(gettype($result) == 'string')
        {
            return new Response($result);
        }

        return new Response('Error: Controller returned unexpected value');
    }
}