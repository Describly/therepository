<?php
/**
 * This code is developed by Expedien, copying and using without attribution and permission is strictly prohibited
 * Reach out to contact@expedien.in or visit www.expedien.in to view the legal details.
 *
 *
 * @author Robin Laha
 * @since 05-05-2019
 * @copyright Copyright (c), Expedien
 */

namespace Integration\Betternoi\Tests\Feature;

use App\Dictionary\Domain\EmploymentStatus;
use Benzene\Data\Models\Meta\Address\Dictionary\AddressTypes;
use Carbon\Carbon;
use Integration\Betternoi\Dictionary\BetternoiApplicantType;
use Integration\Betternoi\Dictionary\BetternoiEmploymentType;
use Integration\Betternoi\Drivers\BetterNoi\BetternoiIntegrationServiceImpl;
use Integration\Betternoi\Drivers\Betternoi\Dto\ApplicantScreening;
use Integration\Betternoi\Services\Dto\BetterNoi\Address;
use Integration\Betternoi\Services\Dto\BetterNoi\Applicant;
use Integration\Betternoi\Services\Dto\BetterNoi\BetternoiScreeningRequest;
use Integration\Betternoi\Services\Dto\BetterNoi\Employment;
use Integration\Betternoi\Services\Dto\BetterNoi\Income;
use Integration\Bluemoon\Drivers\Services\IntegrationService;
use Orchestra\Testbench\TestCase;

/**
 * Class BetterNoiTest
 *
 * @package Integration\Betternoi\Tests\Feature
 */
class BetterNoiTest
{
//    public function testScreening()
//    {
//        $address = new Address('Champions Green', 'Hyemeadow drive', 'Houston', 'Texas', '122001',
//            AddressTypes::CURRENT);
//        $employment = new Employment(EmploymentStatus::CURRENT, BetternoiEmploymentType::CURRENT, 'Expedien', 1055);
//        $income = new Income($employment);
//        $applicants = new Applicant('John', 'Doe', Carbon::now(), $address, $income, BetternoiApplicantType::APPLICANT);
//        $screeningRequest = new ApplicantScreening();
//        $this->app->bind(IntegrationService::class, BetternoiIntegrationServiceImpl::class);
//        $screening = app(\Integration\Betternoi\Drivers\IntegrationService::class)->screenApplicant($screeningRequest);
//
//        $this->assertTrue(200);
//        $this->assertEquals($screening, $screening);
//        $this->assertAuthenticated();
//        $this->assertNotEmpty($screening);
//        $this->assertIsObject($screening);
//        $this->assertIsNotString($screening);
//    }
//
//    public function testFetchScreeningResult()
//    {
//        $transactionId = 1;
//        $result = app(IntegrationService::class)->fetchScreeningResult($transactionId);
//
//        $this->assertTrue(200);
//        $this->assertEquals($result, $result);
//        $this->assertAuthenticated();
//        $this->assertNotEmpty($result);
//        $this->assertIsObject($result);
//        $this->assertIsNotString($result);
//    }
//
//    /**
//     *
//     * @return \Generator
//     */
//    public function provideTransactionId()
//    {
//        yield[1];
//    }
//
//    /**
//     * @test
//     * @param int $transactionId
//     *
//     * @dataProvider provideTransactionId
//     */
//    public function testCheckScreeningStatus(int $transactionId)
//    {
//        $status = app(IntegrationService::class)->checkScreeningStatus($transactionId);
//
//        $this->assertTrue(200);
//        $this->assertEquals($status, $status);
//        $this->assertAuthenticated();
//        $this->assertNotEmpty($status);
//        $this->assertIsObject($status);
//        $this->assertIsNotString($status);
//    }
//
//    /**
//     *
//     * @return \Generator
//     */
//    public function provideXml()
//    {
//        yield[1];
//    }
//
//    /**
//     * @test
//     * @param $xml
//     *
//     * @dataProvider provideXml
//     */
//    public function testUpdateScreeningStatus($xml)
//    {
//        $update = app(IntegrationService::class)->updateScreeningStatus($xml);
//
//        $this->assertTrue(200);
//        $this->assertEquals($update, $update);
//        $this->assertAuthenticated();
//        $this->assertNotEmpty($update);
//        $this->assertIsObject($update);
//        $this->assertIsNotString($update);
//    }
//
//    public function testGetAllScreeningReports()
//    {
//        $reports = app(IntegrationService::class)->getAllScreeningReports();
//
//        $this->assertTrue(200);
//        $this->assertEquals($reports, $reports);
//        $this->assertAuthenticated();
//        $this->assertNotEmpty($reports);
//        $this->assertIsObject($reports);
//        $this->assertIsNotString($reports);
//    }
//
//    public function testDeleteScreeningReport()
//    {
//        $reports = app(IntegrationService::class)->deleteScreeningReport(1);
//
//        $this->assertTrue(200);
//        $this->assertEquals($reports, $reports);
//        $this->assertAuthenticated();
//        $this->assertNotEmpty($reports);
//        $this->assertIsObject($reports);
//        $this->assertIsNotString($reports);
//    }
//
//    /**
//     *
//     * @return \Generator
//     */
//    public function provideRequestIdentifier()
//    {
//        yield[1, 1];
//    }
//
//    /**
//     * @test
//     * @param $request
//     *
//     * @dataProvider provideTransactionId
//     */
//    public function testGetTransactionId($request)
//    {
//        $transactionId = app(IntegrationService::class)
//            ->getTransactionId($request['requestIdentifier'], $request['requestIdentifierType']);
//
//        $this->assertTrue(200);
//        $this->assertEquals($transactionId, $transactionId);
//        $this->assertAuthenticated();
//        $this->assertNotEmpty($transactionId);
//        $this->assertIsObject($transactionId);
//        $this->assertIsNotString($transactionId);
//    }
}
