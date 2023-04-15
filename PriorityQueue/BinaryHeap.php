<?php
namespace DS\PriorityQueue;
class BinaryHeap
{
    /**
     *  Min Heap
     * ==============
     * Root index = 0;
     * Root left = parentIndex *2 + 1
     * Root right = parentIndex *2 + 2
     **/
    protected $heap = array();
    public function add($element){
        $this->heap[] = $element;
        $lastIndex = $this->size() - 1;
        $this->swim($lastIndex);
    }
    public function remove($element){
        if ($element == null) return false;
        // Linear removal via search, O(n)
        for ($i = 0; $i < $this->size(); $i++) {
            if ($element == $this->heap[$i]) {
                $this->removeAt($i);
                return true;
            }
        }
        return false;
    }
    public function removeAt($index){
        $lastIndex = $this->size() - 1;
        $this->swap($lastIndex,$index);
        array_splice($this->heap,$lastIndex,1);
        $this->sink($index);
    }
    public function size(){
        return count($this->heap);
    }

    public function swim($index){
        $parent = (int)(($index-1) / 2 );
        while ($this->heap[$parent] > $this->heap[$index] && $index > 0){
            $this->swap($index,$parent);
            $index = $parent;
            $parent = (int)(($index-1) / 2 );
        }
    }

    public function sink($index){
        while (true){
            $left = $index*2+1;
            $right = $index*2+2;
            $smallest = $left;
            if($right < $this->size() && $this->less($right,$left))
                $smallest = $right;
            if($left >= $this->size() || $this->less($index,$smallest))
                break;
            
            $this->swap($smallest, $index);
            $index = $smallest;
        }
    }

    private function swap($i,$j){
        $temp_i = $this->heap[$i];
        $temp_j = $this->heap[$j];
        $this->heap[$j] = $temp_i;
        $this->heap[$i] = $temp_j;
    }

    private function less($i,$j){

        return $this->heap[$i] < $this->heap[$j];
    }

    public function print_heap(){
        print_r($this->heap);
        // if(!empty($this->heap)){
        //     foreach($this->heap as $node){
        //         echo $node .' ';
        //     }
        // }else{
        //     return null;
        // }
        
    }
}