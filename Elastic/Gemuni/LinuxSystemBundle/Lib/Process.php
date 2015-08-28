<?php
/**
 * Code Owner: CCIntegration Inc. S.P.I.D.E.R framework
 * Modified date: 8/28/2015
 * Modified by: Duy Huynh
 */

namespace Gemuni\ElasticBundle\Lib;


class Process {
    private $pid;
    private $command;

    public function run()
    {
        $command = 'nohup '.$this->command.' > /dev/null 2>&1 & echo $!';
        exec($command ,$op);
        $this->pid = (int)$op[0];
    }

    public function kill()
    {
        $command = 'kill '.$this->pid;
        exec($command);
        if ($this->status() == false)return true;
        else return false;
    }

    public function status(){

        $command = 'ps -p '.$this->pid;
        exec($command,$op);

        if (!isset($op[1]))return false;
        else return true;
    }
}