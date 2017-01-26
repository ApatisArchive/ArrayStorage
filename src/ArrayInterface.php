<?php
namespace Apatis\ArrayStorage;

/**
 * Interface ArrayInterface
 * @package Apatis\ArrayStorage
 */
interface ArrayInterface extends \ArrayAccess, \Countable, \IteratorAggregate
{
    /**
     * Set Values
     *
     * @param mixed $key
     * @param mixed $value
     */
    public function set($key, $value);

    /**
     * Get Value
     *
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Replace Collections
     *
     * @param array $items
     */
    public function replace(array $items);

    /**
     * Get All Data
     *
     * @return array
     */
    public function all();

    /**
     * Check if records exists with certain key name
     *
     * @param mixed $key
     * @return bool
     */
    public function has($key);

    /**
     * Get Last values
     *
     * @return mixed
     */
    public function end();

    /**
     * Get first Values
     *
     * @return mixed
     */
    public function reset();

    /**
     * Get first key Data
     *
     * @return mixed
     */
    public function key();

    /**
     * Get next pointer value
     *
     * @return mixed
     */
    public function next();

    /**
     * Get previous pointer value
     *
     * @return mixed
     */
    public function prev();

    /**
     * Get current pointer value
     *
     * @return mixed
     */
    public function current();

    /**
     * push data into the end
     *
     * @param mixed $keyName
     * @param mixed $value optional arguments
     * @return mixed|int
     */
    public function push($keyName, $value = null);

    /**
     * Increment or add array set like
     *              $array[] = $value
     *
     * @param mixed $value
     * @return mixed
     */
    public function increment($value);

    /**
     * Remove Last Data
     * @return mixed|int
     */
    public function pop();

    /**
     * Remove first data
     * @return mixed|int
     */
    public function shift();

    /**
     * Insert into first of position
     *
     * @param mixed $keyName
     * @param mixed $value optional arguments
     * @return mixed|int
     */
    public function unShift($keyName, $value = null);

    /**
     * Get Match value on data
     *
     * @param mixed $values
     * @return array
     */
    public function filter($values);

    /**
     * Check if Contain data ( identical )
     *
     * @param mixed $values
     * @return bool
     */
    public function contain($values);

    /**
     * Get key name for data
     *
     * @param mixed $values
     * @return mixed|bool false if empty
     */
    public function indexOf($values);

    /**
     * Check whether data is empty
     *
     * @return bool
     */
    public function isEmpty();

    /**
     * Remove Data
     *
     * @param mixed $key
     */
    public function remove($key);

    /**
     * Clearing Data
     */
    public function clear();

    /**
     * Sort an array collection
     *
     * @param null|int $sort
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function sort($sort = null);

    /**
     * Sort an array collection by key
     * @link http://php.net/manual/en/function.ksort.php
     *
     * @param int|null $sort
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function kSort($sort = null);

    /**
     * Sort an array collection using a "natural order" algorithm
     * @link http://php.net/manual/en/function.natsort.php
     *
     * @return bool true on success or false on failure.
     */
    public function natSort();

    /**
     * Sort an array collection using a case insensitive "natural order" algorithm
     * @link http://php.net/manual/en/function.natcasesort.php
     *
     * @return bool true on success or false on failure.
     */
    public function natCaseSort();

    /**
     * Sort an array collection in reverse order and maintain index association
     * @link http://php.net/manual/en/function.arsort.php
     *
     * @param int|null $sort
     * @return bool
     */
    public function arSort($sort = null);

    /**
     * Sort an array collection and maintain index association
     * @link http://php.net/manual/en/function.asort.php
     *
     * @param int|null $sort
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function aSort($sort = null);

    /**
     * Sort an array collection in reverse order
     * @link http://php.net/manual/en/function.rsort.php
     *
     * @param int|int $sort
     * @return bool
     */
    public function rSort($sort = null);

    /**
     * Sort an array collection by values using a user-defined comparison function
     * @link http://php.net/manual/en/function.usort.php
     *
     * @param callback $cmp_function
     * @return bool
     */
    public function uSort($cmp_function);

    /**
     * Sort an array collection with a user-defined comparison function and maintain index association
     * @link http://php.net/manual/en/function.uasort.php
     *
     * @param callback $cmp_function
     * @return bool
     */
    public function uaSort($cmp_function);

    /**
     * Sort an array collection by keys using a user-defined comparison function
     * @link http://php.net/manual/en/function.uksort.php
     *
     * @param callback $cmp_function
     * @return bool
     */
    public function ukSort($cmp_function);

    /**
     * Shuffle an array collection
     * @link http://php.net/manual/en/function.shuffle.php
     *
     * @return bool
     */
    public function shuffle();
}
