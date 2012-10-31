<?php

class TestingTest extends PHPUnit_Framework_TestCase {
    public function testPassing() {
        $this->assertTrue(true, 'Testing that true is true');
    }
    
    public function testFailing() {
        $this->assertTrue(false, 'Testing that false is true');
    }
}