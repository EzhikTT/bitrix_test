<?

use PHPUnit_Framework_TestCase,
    TestModule\TestTable;

class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * Эту переменную нужно вставить в свой класс тестов.
     * @var bool
     */
    protected $backupGlobals = false;

    public function insertItem(){

        $result = TestTable::add([
            'NAME' => 'TEST',
            'AGE' => 28
        ]);

        $this->assertTrue($result->isSuccess());

        return 'Test insert';
    }
}