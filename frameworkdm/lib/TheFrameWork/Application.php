<?php

namespace TheFrameWork;

abstract class Application
{
    protected $httpRequest;
    protected $httpResponse;
    protected $name;
    protected $user;

    public function __construct()
    {
        $this->httpRequest = new HTTPRequest($this);
        $this->httpResponse = new HTTPResponse($this);
        $this->name = '';
        $this->user = new User();
    }

    abstract public function run();

    public function getHttpRequest()
    {
        return $this->httpRequest;
    }

    public function getHttpResponse()
    {
        return $this->httpResponse;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getController()
    {
        $router = new Router;
        $xml = new \DOMDocument;
        $xml->load(__DIR__.'/../../app/'.$this->name.'/config/routes.xml');

        $routes = $xml->getElementsByTagName('route');

        foreach ($routes as $route)
        {
            $vars = [];

            if ($route->hasAttribute('vars'))
            {
                $vars = explode(',', $route->getAttribute('vars'));
            }

            $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
        }

        try
        {
            $matchedRoute = $router->getRoute($this->httpRequest->getRequestURI());
        }
        catch (\RuntimeException $e)
        {
            if ($e->getCode() == Router::NO_ROUTE_FOUND)
            {
                $this->httpResponse->redirect404();
            }
        }

        $_GET = array_merge($_GET, $matchedRoute->vars());

        $controllerClass = 'App\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
        return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
    }
}