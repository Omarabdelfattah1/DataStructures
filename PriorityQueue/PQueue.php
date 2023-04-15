<?php
namespace DS\PriorityQueue;
include 'BinaryHeap.php';
// use BinaryHeap;
class PQueue
{
    protected $size = 0;
    protected BinaryHeap $queue;

    public function __construct()
    {
        $this->queue = new BinaryHeap();
    }
    public function poll(){
        $this->queue->removeAt(0);
    }

    public function push($item)
    {
        $this->queue->add($item);
    }

    public function size()
    {
        return $this->queue->size();
    }

    public function print_queue()
    {
        $this->queue->print_heap();
    }
}