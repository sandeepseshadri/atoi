<?php


use PHPUnit\Framework\TestCase;

class AtoiConverterTest extends TestCase
{
    public function setUp()
    {
        $this->converter = new App\AtoiConverter();
    }

    /**
     * @test
     * @dataProvider invalidInput
     * @expectedException InvalidArgumentException
     */
    public function it_throws_exception_when_data_is_invalid($input)
    {
        $this->converter->convert($input);
    }

    /**
     * @test
     */
    public function it_converts_string_to_integer()
    {
        $result = $this->converter->convert('123');
        $this->assertEquals(123, $result);
    }

    /**
     * @test
     * @dataProvider validInput
     * @param $input
     * @param $expected
     */
    public function it_returns_correct_result($input, $expected)
    {
        $result = $this->converter->convert($input);
        $this->assertEquals($result, $expected);
    }

    /**
     * @return array
     */
    public function validInput()
    {
        return [
           ['1234', 1234],
           ['210', 210],
           ['0', 0]
       ];
    }


    /**
     * @return array
     */
    public function invalidInput()
    {
        return [
          [null],
          ['ddd'],
          ['100.12'],
          ['100.00!!!']
        ];
    }
}
