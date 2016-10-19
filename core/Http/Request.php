<?php

    namespace Step\Http;

    class Request{

        protected static $instance;


        /**
         * Request uri splitted as segments
         *
         * @var Array
         */
        private $segments;

        /**
         * Request headers
         *
         * @var Array
         */
        private $headers;

        /**
         * GET / POST / JSON input
         *
         * @var Array
         */
        private $input;

        function __construct()
        {
            $this->extractSegments();
            $this->extractHeaders();
            $this->extractInput();
        }

        public static function instance()
        {
            if(!self::$instance)
                self::$instance = new Request;

            return self::$instance;
        }

        public function segment($index)
        {
            if(array_key_exists($index, $this->segments))
            {
                return $this->segments[$index];
            }

            return null;
        }

        public function isJSON()
        {
            if(!isset($this->headers['Content-Type']))
                return false;

            return $this->headers['Content-Type'] == 'application/json';
        }

        public function input($key = null)
        {
            if(!$key)
                return $this->input;

            if(array_key_exists($key, $this->input))
                return $this->input[$key];
        }

        private function extractSegments()
        {
            $requestURI = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');

            $this->segments = array_filter(explode('/', $requestURI));
        }

        private function extractInput()
        {
            $this->input = $_GET;


            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $this->input = array_merge($this->input, $_POST);
            }

            if($this->isJSON())
            {
                $jsonPayload = json_decode(file_get_contents('php://input'), true);
                if(is_array($jsonPayload))
                {
                    $this->input = array_merge($this->input, $jsonPayload);
                }
            }
        }

        private function extractHeaders()
        {
            $this->headers = getallheaders();
        }
    }