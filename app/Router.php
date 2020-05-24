<?php


namespace Router;


use Home\Controller\HomeController;

/**
 * Class Router
 *
 * @package Router
 */
class Router
{
    /**
     * @var
     */
    protected $uri;
    /**
     * @var
     */
    protected $controller;
    /**
     * @var
     */
    protected $method;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->setUri();
        $this->setController();
        $this->setMethod();
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     */
    public function setUri()
    {
        $this->uri = explode('/', $_SERVER['REQUEST_URI']);
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController()
    {
        if (empty($this->uri[1]))
            $controller = HomeController::class;
        else
            $controller = ucfirst($this->uri[1]) . "\\Controller\\" . ucfirst($this->uri[1]) . "Controller";
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod()
    {
        if (empty($this->uri[2]))
            $this->method = 'index';
        else
            if (method_exists($this->getController(), $this->uri[2])) {
                $this->method = $this->uri[2];
            }
    }


}