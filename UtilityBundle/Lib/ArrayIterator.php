<?php
/**
 * Modified date: 9/1/2015
 * Modified by: Duy Huynh
 */

namespace Gemuni\UtilityBundle\Lib;


class ArrayIterator implements \Iterator{

    private $data;
    private $keys;

    private $position;
    private $start;
    private $len;

    private $isAssoc;

    public function __construct(array $arr)
    {
        $this->position = 0;
        $this->len = count($arr);
        $this->start = 0;
        $this->isAssoc = $this->isAssocArray($arr);

        $this->keys = array_keys($arr);
        $this->data = $arr;
    }
    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        // TODO: Implement current() method.
        return $this->data[$this->keys[$this->position]];
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        // TODO: Implement next() method.
        ++$this->position;
        --$this->len;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        // TODO: Implement key() method.
        return $this->position;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        // TODO: Implement valid() method.
        return $this->len > 0 && isset($this->keys[$this->position]) && isset($this->data[$this->keys[$this->position]]);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
        if($this->start != 0){
            $this->position = $this->start;
        }else{
            $this->position = 0;
        }
    }

    /**
     * seek to a particular position
     * @param $position
     */
    public function seek($position)
    {
        $this->start = $this->position = $position;
    }

    public function length($length)
    {
        $this->len = $length;
    }

    /**
     * Check if arr is an associative array
     * @param $arr
     * @return bool
     */
    private function isAssocArray($arr)
    {
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}