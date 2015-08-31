<?php
/**
 * Modified date: 8/28/2015
 * Modified by: Duy Huynh
 */

namespace Gemuni\ElasticBundle\Lib;


class Process {
    private $pid = null;
    private $command = null;

    public function __construct($command)
    {
        $this->command = $command;
    }
    public function run()
    {
        if ($this->command != null) {
            $command = 'nohup ' . $this->command . ' > /dev/null 2>&1 & echo $!';
            exec($command, $op);
            $this->pid = (int)$op[0];
            return $this->pid;
        }
        return false;
    }

    public function kill()
    {
        $command = 'kill '.$this->pid;
        exec($command);
        return $this->status() != false;
    }

    public function status(){

        $command = 'ps -p '.$this->pid;
        exec($command,$op);

        return !isset($op[1])? false:true;
    }
}