<?php
namespace Apatis\ArrayStorage\Tests\PhpUnit;

use Apatis\ArrayStorage\Collection;
use Apatis\ArrayStorage\CollectionFetch;

/**
 * Class CollectionFetchTest
 * @package Apatis\ArrayStorage\Tests\PhpUnit
 */
class CollectionFetchTest extends \PHPUnit_Framework_TestCase
{
    protected $data = [
        'Data 1' => 'Value 1',
        'Data 2' => 'Value 2',
        'Data 3' => 'Value 3',
        'Data 4' => 'Value 4',
        'Data Array' => [
            'Key' => 'end value'
        ],
    ];

    /**
     * @var CollectionFetch
     */
    protected $collection;

    /**
     * {@inheritdoc}
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        // build instance
        $this->collection = new CollectionFetch($this->data);
    }

    public function testInstance()
    {
        $this->assertInstanceOf(
            Collection::class,
            $this->collection,
            sprintf(
                '%1$s instance of %2$s',
                CollectionFetch::class,
                Collection::class
            )
        );

        $this->assertInstanceOf(
            \ArrayAccess::class,
            $this->collection,
            sprintf(
                '%1$s instance of %2$s',
                CollectionFetch::class,
                \ArrayAccess::class
            )
        );

        $this->assertInstanceOf(
            \Countable::class,
            $this->collection,
            sprintf(
                '%1$s instance of %2$s',
                CollectionFetch::class,
                \Countable::class
            )
        );

        $this->assertInstanceOf(
            \IteratorAggregate::class,
            $this->collection,
            sprintf(
                '%1$s instance of %2$s',
                CollectionFetch::class,
                \IteratorAggregate::class
            )
        );

        $this->assertInstanceOf(
            \Iterator::class,
            $this->collection->getIterator(),
            sprintf(
                '%1$s instance of %2$s',
                CollectionFetch::class,
                \Iterator::class
            )
        );
    }

    public function testDataExistences()
    {
        // test if collection is not empty
        $this->assertFalse(
            $this->collection->isEmpty(),
            'That Collection is not empty'
        );
        // test if data is not empty
        $this->assertNotEmpty(
            $this->collection->all(),
            'That Collection is not empty'
        );
        // test if data is not exists
        $this->assertNull(
            $this->collection->get('Data Empty'),
            'That key `Data Empty` is not exists'
        );
    }

    public function testEqualities()
    {
        // test if data is same
        $this->assertEquals(
            count($this->data),
            $this->collection->count(),
            'That number of array collection is equals'
        );

        // test output
        $this->assertEquals(
            $this->data,
            $this->collection->all(),
            'That stored array is same'
        );

        // test if data stored is Equal
        $this->assertEquals(
            $this->data['Data 1'],
            $this->collection->get('Data 1'),
            'Match Data of key `Data 1`'
        );

        // test if data stored not empty with return default
        $equal_test_value = @microtime();
        $this->assertEquals(
            $this->collection->get('Data Empty', $equal_test_value),
            $equal_test_value,
            'Testing Default return value if data does not exists'
        );
    }

    public function testImplementation()
    {
        // test Countable
        $this->assertCount(
            count($this->data),
            $this->collection,
            'Test If Object countable'
        );

        // test Array Access
        $this->assertEquals(
            $this->data['Data 1'],
            $this->collection['Data 1'],
            'Test Array Access'
        );

        // unset data
        unset($this->collection['Data 1']);
        $this->assertNull(
            $this->collection['Data 1'],
            'Test After Unset and will be returning `null`'
        );

        // set
        $this->collection['Data 1'] = $this->data['Data 1'];
        $this->assertEquals(
            $this->data['Data 1'],
            $this->collection->get('Data 1'),
            'Test After Set and will be returning equals data'
        );

        $this->assertArrayHasKey(
            key($this->data),
            $this->collection,
            'Test Array Access'
        );

        /**
         * Testing loop Iteration
         */
        foreach ($this->collection as $key => $value) {
            $this->assertNotEmpty(
                $value,
                sprintf('In Loop with key %s', $key)
            );
        }
    }

    public function testFunctionality()
    {
        $this->assertEquals(
            $this->data['Data Array']['Key'],
            $this->collection->fetch('Data Array[Key]'),
            'Test array direct string eg: `Key[sub key]`'
        );

        // shift
        $newData = ['Extended Data'];
        $this->collection->unshift('Extended', $newData);
        $this->assertEquals(
            $newData,
            $this->collection->reset(),
            'Test UnShift data'
        );

        // push
        $newData = ['Extended Data 2'];
        $this->collection->push('Extended', $newData);
        $this->assertEquals(
            $newData,
            $this->collection->end(),
            'Test Push Data'
        );

        // test current position
        $this->assertEquals(
            $this->collection->end(),
            $this->collection->current(),
            'Test Current Cursor Pointer Data'
        );

        // if in the end make sure is was empty
        $this->assertEmpty(
            $this->collection->next(),
            'Test Empty data after `end()` call'
        );

        // move cursor position
        $this->collection->end();
        $array = $this->collection->all();
        $keys = array_keys($array);
        $prev_key = $keys[count($array)-2]; // (count(array) - 1) - 1
        $this->assertEquals(
            $this->collection->prev(),
            // last set data without push
            $array[$prev_key],
            'Test Previous Data'
        );
    }
}
