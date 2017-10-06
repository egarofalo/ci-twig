<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Twig {

    private $config;
    private $functions;
    private $functions_safe;
    private $twig;

    public function __construct() {
        // default config
        $this->config = [
            'paths' => [VIEWPATH],
            'cache' => APPPATH . 'twig_cache',
            'debug' => ENVIRONMENT !== 'production'
        ];
        // functions
        $this->functions = [
            'base_url',
            'site_url',
            'current_url',
            'uri_string'
        ];
        // safe functions
        $this->functions_safe = [
            'form_open',
            'form_close',
            'form_error',
            'set_value',
            'set_select',
            'set_checkbox',
            'set_radio',
            'validation_errors'
        ];
        $this->init();
    }
    
    /**
     * Create the Twig object and add CodeIgniter helpers to Twig
     */
    private function init() {
        $this->createTwig();
        $this->addFunctions();
    }  

    /**
     * Create the twig object
     */
    private function createTwig() {
        $loader = new \Twig_Loader_Filesystem($this->config['paths']);
        $twig = new \Twig_Environment($loader, [
            'cache' => $this->config['cache'],
            'debug' => $this->config['debug']
        ]);
        if ($this->config['debug']) {
            $twig->addExtension(new \Twig_Extension_Debug());
        }
        $this->twig = $twig;
    }
    
    /**
     * Add global functions to use in templates
     */
    private function addFunctions() {     
        foreach ($this->functions as $function) {
            if (function_exists($function)) {
                $this->twig->addFunction(new \Twig_Function($function, $function));
            }
        }
        foreach ($this->functions_safe as $function) {
            if (function_exists($function)) {
                $this->twig->addFunction(new \Twig_Function($function, $function, ['is_safe' => ['html']]));
            }
        }
    }    

    /**
     * Add global variables to use in templates
     */
    public function addGlobal($name, $value) {
        $this->twig->addGlobal($name, $value);
    }
    
    /**
     * Add a function to use in templates
     */
    public function addFunction($name, $function) {
        $this->twig->addFunction(new \Twig_Function($name, $function));
    }

    /**
     * Render and output a template with optional parameters passed to it
     */
    public function display($view, array $params = []) {
        $CI = &get_instance();
        $CI->output->set_output($this->render($view, $params));
    }

    /**
     * Render a rendered template with optional parameters passed to it
     */
    public function render($view, array $params = []) {
        $view = $view . '.twig';
        return $this->twig->render($view, $params);
    }

    /**
     * Return the twig instance
     */
    public function getTwig() {
        return $this->twig;
    }

}
