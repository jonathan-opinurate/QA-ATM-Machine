<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 25/11/15
 * Time: 11:24
 */

namespace AppBundle\Services;


class MachineStatusService
{
    private $machineStatusFile;

    public function __construct($machineStatusFile){
        $this->machineStatusFile = $machineStatusFile ;
    }

    public function isOpen(){
        $contents = file_get_contents($this->machineStatusFile);

        return (int)$contents === 1;
    }

    public function close(){
        file_put_contents($this->machineStatusFile, '0');

    }

    public function open(){
        file_put_contents($this->machineStatusFile, '1');
    }
}