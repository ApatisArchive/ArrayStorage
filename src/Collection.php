<?php
namespace Apatis\ArrayStorage;

/**
 * Class Collection
 * @package Apatis\ArrayStorage
 */
class Collection implements ArrayInterface
{
    /**
     * Collection Data
     *
     * @var array
     */
    protected $storedData = [];

    /**
     * Collector constructor.
     * @param array $args
     */
    public function __construct(array $args = [])
    {
        $this->replace($args);
    }

    /**
     * {@inheritdoc}
     */
    public function set($key, $value)
    {
        $this->storedData[$key] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function replace(array $items)
    {
        foreach ($items as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function has($key)
    {
        return array_key_exists($key, $this->storedData);
    }

    /**
     * {@inheritdoc}
     */
    public function get($key, $default = null)
    {
        return isset($this->storedData[$key]) ? $this->storedData[$key] : $default;
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->storedData;
    }

    /**
     * @return array
     */
    public function keys()
    {
        return array_keys($this->storedData);
    }

    /**
     * {@inheritdoc}
     */
    public function first()
    {
        return reset($this->storedData);
    }

    /**
     * {@inheritdoc}
     * @uses first()
     */
    public function reset()
    {
        return $this->first();
    }

    /**
     * {@inheritdoc}
     */
    public function last()
    {
        return end($this->storedData);
    }

    /**
     * {@inheritdoc}
     * @uses last()
     */
    public function end()
    {
        return $this->last();
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return key($this->storedData);
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return current($this->storedData);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        return next($this->storedData);
    }

    /**
     * {@inheritdoc}
     */
    public function prev()
    {
        return prev($this->storedData);
    }

    /**
     * {@inheritdoc}
     */
    public function push($keyName, $value = null)
    {
        if (func_num_args() > 1) {
            $this->remove($keyName);
            $this->set($keyName, $value);
            return $keyName;
        } else {
            return array_push($this->storedData, $keyName);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function increment($value)
    {
        $this->storedData[] = $value;
        $keys = $this->key();
        return end($keys);
    }

    /**
     * {@inheritdoc}
     */
    public function pop()
    {
        return array_pop($this->storedData);
    }

    /**
     * {@inheritdoc}
     */
    public function shift()
    {
        return array_shift($this->storedData);
    }

    /**
     * {@inheritdoc}
     */
    public function unShift($keyName, $value = null)
    {
        if (func_num_args() > 1) {
            $this->remove($keyName);
            $this->storedData = [$keyName => $value] + $this->storedData;
            return $keyName;
        } else {
            return array_unshift($this->storedData, $keyName);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function filter($values)
    {
        $returnValue = [];
        foreach ($this->storedData as $key => $value) {
            if ($value === $value) {
                $returnValue[$key] = $value;
            }
        }

        return $returnValue;
    }

    /**
     * {@inheritdoc}
     */
    public function contain($values)
    {
        foreach ($this->storedData as $key => $value) {
            if ($value === $value) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function indexOf($values)
    {
        return array_search($values, $this->storedData, true);
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty()
    {
        return empty($this->storedData);
    }

    /**
     * {@inheritdoc}
     */
    public function remove($key)
    {
        unset($this->storedData[$key]);
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        $this->storedData = [];
    }

    /**
     * Sort an array collection
     *
     * @param null|int $sort
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function sort($sort = null)
    {
        if ($sort !== null && ! is_int($sort)) {
            throw new \InvalidArgumentException(
                'Invalid sort type. Sort type must ne integer.',
                E_USER_ERROR
            );
        }

        return $sort === null
            ? sort($this->storedData)
            : sort($this->storedData, $sort);
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException
     */
    public function kSort($sort = null)
    {
        if ($sort !== null && ! is_int($sort)) {
            throw new \InvalidArgumentException(
                'Invalid sort type. Sort type must ne integer.',
                E_USER_ERROR
            );
        }

        return ksort($this->storedData, $sort);
    }

    /**
     * {@inheritdoc}
     */
    public function natSort()
    {
        return natsort($this->storedData);
    }

    /**
     * {@inheritdoc}
     */
    public function natCaseSort()
    {
        return natcasesort($this->storedData);
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException
     */
    public function arSort($sort = null)
    {
        if ($sort !== null && ! is_int($sort)) {
            throw new \InvalidArgumentException(
                'Invalid sort type. Sort type must ne integer.',
                E_USER_ERROR
            );
        }

        return $sort === null
            ? arsort($this->storedData)
            : arsort($this->storedData, $sort);
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException
     */
    public function aSort($sort = null)
    {
        if ($sort !== null && ! is_int($sort)) {
            throw new \InvalidArgumentException(
                'Invalid sort type. Sort type must ne integer.',
                E_USER_ERROR
            );
        }

        return $sort === null
            ? asort($this->storedData)
            : asort($this->storedData, $sort);
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException
     */
    public function rSort($sort = null)
    {
        if ($sort !== null && ! is_int($sort)) {
            throw new \InvalidArgumentException(
                'Invalid sort type. Sort type must ne integer.',
                E_USER_ERROR
            );
        }

        return $sort === null
            ? rsort($this->storedData)
            : rsort($this->storedData, $sort);
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException
     */
    public function uSort($cmp_function)
    {
        if (!is_callable($cmp_function)) {
            throw new \InvalidArgumentException(
                'Callback is not callable.',
                E_USER_ERROR
            );
        }

        return usort($this->storedData, $cmp_function);
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException
     */
    public function uaSort($cmp_function)
    {
        if (!is_callable($cmp_function)) {
            throw new \InvalidArgumentException(
                'Callback is not callable.',
                E_USER_ERROR
            );
        }

        return uasort($this->storedData, $cmp_function);
    }

    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException
     */
    public function ukSort($cmp_function)
    {
        if (!is_callable($cmp_function)) {
            throw new \InvalidArgumentException(
                'Callback is not callable.',
                E_USER_ERROR
            );
        }

        return uksort($this->storedData, $cmp_function);
    }

    /**
     * {@inheritdoc}
     */
    public function shuffle()
    {
        return shuffle($this->storedData);
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->storedData);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }

    /**
     * Returning @uses \Traversable instance
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->storedData);
    }
}