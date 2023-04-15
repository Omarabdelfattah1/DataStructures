<?php

class Queue
{
    private $first=-1;
    private $last=-1;
    private $queue=[];
    public function enqueue($item){
        $this->queue[]=$item;
        $this->last++;
    }
    public function dequeue(){
        if (!$this->isEmpty()){
            $item = $this->first();
            $this->first++;
            return $item;
        }
        return null;
    }
    public function isEmpty(){
        return $this->size() > 0;
    }
    public function size(){
        return $this->last - $this->first;
    }
    public function first(){
        return $this->queue[$this->first];
    }
    public function last(){
        return $this->queue[$this->last];
    }
}