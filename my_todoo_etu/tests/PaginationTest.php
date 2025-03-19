<?php

use PHPUnit\Framework\TestCase;
use App\templates\Pagination;

class PaginationTest extends TestCase {
    private array $entreprises;

    protected function setUp(): void {
        $this->entreprises = [
            ['nom' => 'TechCorp', 'secteur' => 'Technologie', 'ville' => 'Paris'],
            ['nom' => 'FinSoft', 'secteur' => 'Finance', 'ville' => 'Londres'],
            ['nom' => 'BioHealth', 'secteur' => 'Santé', 'ville' => 'Berlin'],
            ['nom' => 'GreenEnergy', 'secteur' => 'Environnement', 'ville' => 'Madrid'],
            ['nom' => 'SmartSystems', 'secteur' => 'Technologie', 'ville' => 'Rome'],
            ['nom' => 'CommuTech', 'secteur' => 'Communication', 'ville' => 'Lisbonne'],
            ['nom' => 'CyberSecure', 'secteur' => 'Sécurité', 'ville' => 'Bruxelles'],
            ['nom' => 'RetailWorld', 'secteur' => 'Commerce', 'ville' => 'Amsterdam'],
            ['nom' => 'EduTech', 'secteur' => 'Éducation', 'ville' => 'Paris'],
            ['nom' => 'MedSolutions', 'secteur' => 'Santé', 'ville' => 'Londres'],
            ['nom' => 'AutoMakers', 'secteur' => 'Automobile', 'ville' => 'Munich'],
        ];
    }

    public function testPaginationPage1() {
        $result = Pagination::paginate($this->entreprises, 1, 5);
        $this->assertCount(5, $result);
        $this->assertEquals('TechCorp', $result[0]['nom']);
    }

    public function testPaginationPage2() {
        $result = Pagination::paginate($this->entreprises, 2, 5);
        $this->assertCount(5, $result);
        $this->assertEquals('CommuTech', $result[0]['nom']);
    }

    public function testPaginationPageOutOfRange() {
        $result = Pagination::paginate($this->entreprises, 100, 5);
        $this->assertCount(0, $result);
    }

    public function testTotalPages() {
        $totalPages = Pagination::getTotalPages($this->entreprises, 5);
        $this->assertEquals(3, $totalPages);
    }
}
