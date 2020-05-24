<?php


namespace View;


class View
{
    protected $params;
    protected $controller;
    protected $method;

    public function __construct($method, $params = [])
    {
        $this->setParams($params);
        $this->config($method);
        $this->render();
    }

    public function config($method)
    {
        $this->controller = explode('::', $method)[0];
        $this->method = explode('::', $method)[1];
    }

    public function render()
    {
        if (class_exists($this->getController()) && method_exists($this->getController(), $this->getMethod())) {
            //../app/module/MODULO/Views/METODO.phtml
            extract($this->getParams());
            echo $file_path = "../app/module/" . explode('\\', $this->getController())[0] . "/Views/" . $this->getMethod() . ".phtml";
            require_once $file_path;

        }
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }


}