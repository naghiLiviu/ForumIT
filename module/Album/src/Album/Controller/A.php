<?php
/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 11/25/15
 * Time: 1:15 PM
 */

namespace Album\Controller;


    class A
    {
        protected $var = 'mere';
        protected $username = null;
        protected $password = null;
        public function __construct($username, $password)
        {
            $this->username = $username;
            $this->password = $password;
        }

        public function test()
        {
            return 'test';
        }
    }
