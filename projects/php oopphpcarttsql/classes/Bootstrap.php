<?php
// looking for request controller and action in url

class Bootstrap {
  

    public function __construct($request) {
        // takes request (GET from url) and decides what controller to use
        $this->request = $request;
        if($this->request['controller'] == "") {
            $this->controller = 'home';
        } else {
            $this->controller = $this->request['controller'];
        }
        if($this->request['action'] == "") {
            $this->action = 'index';
        } else {
            $this->action = $this->request['action'];
        }
       
    }
// uses the identified controller

public function createController() {
    // check class
    if(class_exists($this->controller)) {
        $parents = class_parents($this->controller);
        // check extend
        if(in_array("Controller", $parents)) {
            if(method_exists($this->controller, $this->action)) {
                return new $this->controller($this->action, $this->request);
                } else {
                    // method doe not exist
                    echo '<h1>Method does not exist </h1>';
                    return;
                } 
            } else {
                    //base controller does not exist
                    echo '<h1>Base controller not found</h1>';
                    return;
                }
        } else {
              // controller class does not exist
              echo '<h1>Controller class does not exist </h1>';
              return;
        }
    }
}

?>