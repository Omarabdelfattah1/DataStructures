<?php

class Stack
{
    private $stack=[];
    private $pointer=-1;
    public function push($item){
        $this->stack[] = $item;
        $this->pointer++;
    }
    public function pop(){
        if ($this->isEmpty()){
            $item = $this->top();
            $this->pointer--;
            return $item;
        }
        return null;
    }
    public function isEmpty(){
        return !$this->pointer > -1;
    }

    public function size(){
        return $this->pointer + 1;
    }

    public function top(){
        if ($this->isEmpty()){
            return $this->stack[$this->pointer];
        }
        return null;
    }
}