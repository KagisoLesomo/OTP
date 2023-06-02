<?php

use otp\Checker;

use PHPUnit\Framework\TestCase;

class CheckerTest extends TestCase {

    

       /**
     * @covers otp\Checker
     */

    public function testMakeKing() {
        $elementMock = $this->getMockBuilder('Element')->getMock();
        $position = [1, 1];
        $boardMock = $this->getMockBuilder('Board')->getMock();
        $checker = new Checker($elementMock, $position, $boardMock);

        $elementMock->expects($this->once())
            ->method('appendChild')
            ->with($this->isInstanceOf('Element'));

        $checker->makeKing();

        $this->assertTrue($checker->Checker::isKing());
    }

    /**
     * @covers otp\Checker
     */

    public function testMove() {
        $elementMock = $this->getMockBuilder('Element')->getMock();
        $position = [1, 1];
        $boardMock = $this->getMockBuilder('Board')->getMock();
        $checker = new Checker($elementMock, $position, $boardMock);

        $tileMock = $this->getMockBuilder('Tile')->getMock();
        $tileMock->position = [2, 2];

        $boardMock->expects($this->once())
            ->method('isValidPlaceToMove')
            ->with($this->equalTo(2), $this->equalTo(2))
            ->willReturn(true);

        $boardMock->expects($this->once())
            ->method('isValidPlaceToMove')
            ->with($this->equalTo(1), $this->equalTo(1))
            ->willReturn(true);

        $boardMock->expects($this->once())
            ->method('moveChecker')
            ->with($this->equalTo($checker), $this->equalTo($tileMock));

        $boardMock->expects($this->once())
            ->method('changePlayerTurn');

        $checker->move($tileMock);

        $this->assertEquals([2, 2], $checker->getPosition());
    }

     /**
     * @covers otp\Checker
     */


    public function testCanMove() {
        $elementMock = $this->getMockBuilder('Element')->getMock();
        $position = [1, 1];
        $boardMock = $this->getMockBuilder('Board')->getMock();
        $checker = new Checker($elementMock, $position, $boardMock);

        $this->assertFalse($checker->canMove());

        $checker->setPosition([3, 3]);

        $this->assertTrue($checker->canMove());
    }

     /**
     * @covers otp\Checker
     */


    public function testCanAttack() {
        $elementMock = $this->getMockBuilder('Element')->getMock();
        $position = [1, 1];
        $boardMock = $this->getMockBuilder('Board')->getMock();
        $checker = new Checker($elementMock, $position, $boardMock);

        $newPosition = [3, 3];

        $boardMock->expects($this->exactly(4))
            ->method('isValidPlaceToMove')
            ->willReturn(true);

        $boardMock->checkers = [
            $this->createCheckerMock(2, 2, 1),
            $this->createCheckerMock(4, 4, 2),
            $this->createCheckerMock(6, 6, 1),
            $this->createCheckerMock(8, 8, 2)
        ];

        $this->assertInstanceOf('Checker', $checker->canAttack($newPosition));
        $this->assertFalse($checker->canAttack([2, 2]));
        $this->assertFalse($checker->canAttack([4, 4]));
        $this->assertFalse($checker->canAttack([6, 6]));
        $this->assertFalse($checker->canAttack([8, 8]));
    }

     /**
     * @covers otp\Checker
     */

    public function testAttack() {
        $elementMock = $this->getMockBuilder('Element')->getMock();
        $position = [1, 1];
        $boardMock = $this->getMockBuilder('Board')->getMock();
        $checker = new Checker($elementMock, $position, $boardMock);

        $tileMock = $this->getMockBuilder('Tile')->getMock();
        $tileMock->position = [3, 3];

        $boardMock->expects($this->once())
            ->method('checkers')
            ->willReturn([$this->createCheckerMock(2, 2, 2)]);

        $boardMock->expects($this->once())
            ->method('remove')
            ->with($this->isInstanceOf('Checker'));

        $checker->attack($tileMock);

        // Add assertions as needed
    }

     /**
     * @covers otp\Checker
     */

    private function createCheckerMock($x, $y, $player) {
        $checkerMock = $this->getMockBuilder('Checker')->disableOriginalConstructor()->getMock();
        $checkerMock->position = [$x, $y];
        $checkerMock->player = $player;
        return $checkerMock;
    }
}
