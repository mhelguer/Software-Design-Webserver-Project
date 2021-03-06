<?php

use PHPUnit\Framework\TestCase;

class BackendTest extends TestCase{
    public function testLoginUsernameEmptyValidate(){        
        $test = new App\Validation;
        $result = $test->LoginUsernameEmptyValidate('Test');
        
        $this->assertEquals(false, $result);
    }

    public function testLoginUsernameRegexValidate(){        
        $test = new App\Validation;
        $result = $test->LoginUsernameRegexValidate('Test');
        
        $this->assertEquals(1, $result);
    }

    public function testLoginPasswordEmptyValidate(){        
        $test = new App\Validation;
        $result = $test->LoginPasswordEmptyValidate('test');
        
        $this->assertEquals(false, $result);
    }

    public function testLoginPasswordRegexValidate(){        
        $test = new App\Validation;
        $result = $test->LoginPasswordRegexValidate('test');
        
        $this->assertEquals(1, $result);
    }

    public function testLoginAttempt(){        
        $link = new mysqli("database-4353.ctkzz4wlfaku.us-east-2.rds.amazonaws.com",
		"admin",
		"COSC4353",
		"fuelQuote_schema");
        
        $test = new App\Validation;
        $result = $test->LoginAttempt($link, 'muser', 'mpass');
        $link->close();        
        $this->assertEquals(true, $result);
    }

    public function testRegisterUsernameEmptyValidate(){        
        $test = new App\Validation;
        $result = $test->RegisterUsernameEmptyValidate('regattemptU');
        
        $this->assertEquals(false, $result);
    }

    public function testRegisterUsernameRegexValidate(){        
        $test = new App\Validation;
        $result = $test->RegisterUsernameRegexValidate('regattemptU');
        
        $this->assertEquals(1, $result);
    }

    public function testRegisterPasswordEmptyValidate(){
        $test = new App\Validation;
        $result = $test->RegisterPasswordEmptyValidate('regattemptP');                    
        
        $this->assertEquals(false, $result);
    }

    public function testRegisterPasswordRegexValidate(){
        $test = new App\Validation;
        $result = $test->RegisterPasswordRegexValidate('regattemptP');                    
        
        $this->assertEquals(1, $result);
    }

    public function testRegisterUsernameTakenValidate(){
        $link = new mysqli("database-4353.ctkzz4wlfaku.us-east-2.rds.amazonaws.com",
		"admin",
		"COSC4353",
		"fuelQuote_schema");
        
        $test = new App\Validation;
        $result = $test->RegisterUsernameTakenValidate($link, 'regattemptU');
        $link->close();        
        $this->assertEquals(true, $result);
    }

    public function testRegisterAttempt(){
        $link = new mysqli("database-4353.ctkzz4wlfaku.us-east-2.rds.amazonaws.com",
		"admin",
		"COSC4353",
		"fuelQuote_schema");
        
        $test = new App\Validation;
        $result = $test->RegisterAttempt($link, 'regattemptU', 'regattemptP');
        $link->close();        
        $this->assertEquals(true, $result);
    }

    public function testRegisterNameEmptyValidate()
    {
        $test = new App\Validation;
        $result = $test->RegisterNameEmptyValidate('Miguel Helguero');

        $this->assertEquals(false, $result);
    }

    public function testRegisterNameRegexValidate()
    {
        $test = new App\Validation;
        $result = $test->RegisterNameRegexValidate('Miguel Helguero');

        $this->assertEquals(1, $result);
    }

    public function testRegisterAddressOneEmptyValidate(){
        $test = new App\Validation;
        $result = $test->RegisterAddressOneEmptyValidate('123456 Oceanview Drive');

        $this->assertEquals(false, $result);
    }

    public function testRegisterAddressOneRegexValidate(){
        $test = new App\Validation;
        $result = $test->RegisterAddressOneRegexValidate('123456 Oceanview Drive');

        $this->assertEquals(1, $result);
    }

    public function testRegisterAddressTwoRegexValidate(){
        $test = new App\Validation;
        $result = $test->RegisterAddressTwoRegexValidate('987654 Main St.');

        $this->assertEquals(1, $result);
    }

    public function testRegisterCityEmptyValidate(){
        $test = new App\Validation;
        $result = $test->RegisterCityEmptyValidate('Houston');

        $this->assertEquals(false, $result);
    }

    public function testRegisterCityRegexValidate(){
        $test = new App\Validation;
        $result = $test->RegisterCityRegexValidate('Houston');

        $this->assertEquals(1, $result);
    }

    public function testRegisterStateEmptyValidate(){
        $test = new App\Validation;
        $result = $test->RegisterStateEmptyValidate('TX');

        $this->assertEquals(false, $result);
    }

    public function testRegisterStateRegexValidate(){
        $test = new App\Validation;
        $result = $test->RegisterStateRegexValidate('TX');

        $this->assertEquals(1, $result);
    }

    public function testRegisterZipcodeEmptyValidate(){
        $test = new App\Validation;
        $result = $test->RegisterZipcodeEmptyValidate('77450');

        $this->assertEquals(false, $result);
    }
    
    public function testRegisterZipcodeRegexValidate(){
        $test = new App\Validation;
        $result = $test->RegisterZipcodeRegexValidate('77450');

        $this->assertEquals(1, $result);
    }

    public function testConnect(){
        $test = new App\Validation;        
        $link = new mysqli("database-4353.ctkzz4wlfaku.us-east-2.rds.amazonaws.com",
		"admin",
		"COSC4353",
		"fuelQuote_schema");

        $result = $test->Connect($link);

        $this->assertEquals(0, $result);
    }

    public function testGetPassword(){
        $link = new mysqli("database-4353.ctkzz4wlfaku.us-east-2.rds.amazonaws.com",
		"admin",
		"COSC4353",
		"fuelQuote_schema");
        
        $test = new App\Validation;
        $result = $test->GetPassword($link, 'muser');
        $link->close();
        $this->assertEquals('$2y$10$4iTiWU.BdKEDbQzd7JJaKOs62MgjCjNc20t8OFLPx09VZJYBOJGD6', $result);
    }

    public function testRegisterTwoAttempt(){
        $link = new mysqli("database-4353.ctkzz4wlfaku.us-east-2.rds.amazonaws.com",
		"admin",
		"COSC4353",
		"fuelQuote_schema");
        
        $test = new App\Validation;

        $result = $test->RegisterTwoAttempt($link, 'testuser1', 'test1name', 'test1addr1', 'test1addr2', 'Houston', 'TX', '77450');
        
        $this->assertEquals(true, $result);
    }
    
    public function testUpdateAccType(){
        $link = new mysqli("database-4353.ctkzz4wlfaku.us-east-2.rds.amazonaws.com",
		"admin",
		"COSC4353",
		"fuelQuote_schema");
        
        $test = new App\Validation;
        $result = $test->UpdateAccType($link, 'mtest');

        $this->assertEquals(true, $result);
    }

    // Fuelform tests
    public function testGallonsEmptyValidate(){
        $test = new App\Validation;
        $result = $test->GallonsEmptyValidate("400.55");

        $this->assertEquals(false, $result);
    }

    public function testGallonsRegexValidate(){        
        $test = new App\Validation;
        $result = $test->GallonsRegexValidate(10);
        $this->assertEquals(true, $result);
    }

    public function testGetAddresses(){
        $link = new mysqli("database-4353.ctkzz4wlfaku.us-east-2.rds.amazonaws.com",
		"admin",
		"COSC4353",
		"fuelQuote_schema");
        
        $test = new App\Validation;
        $result = $test->GetAddresses($link, 'getAddrU');
        $link->close();
        $this->assertEquals(['getaddr1', 'getaddr2'], $result);
    }  

    public function testDeliveryDateEmptyValidate(){
        $test = new App\Validation;
        $result = $test->DeliveryDateEmptyValidate("2021-08-16");

        $this->assertEquals(false, $result);
    }

    public function testDeliveryDateRegexValidate(){
        $test = new App\Validation;
        $result = $test->DeliveryDateRegexValidate("2021-08-16");

        $this->assertEquals(1, $result);
    }

    //pricing validation block
	public function testInState_Return_LocationFactor() {
		$test = new App\Validation;
		$result = $test->InState_Return_LocationFactor('TX');
		
		$this->assertEquals(0.02, $result);
	}
    
	public function testOutState_Return_LocationFactor() {
		$test = new App\Validation;
		$result = $test->OutState_Return_LocationFactor('TX');
		
		$this->assertEquals(0.04, $result);
	}
	
	public function testHas_FuelHistory_Return_Factor() {
		$test = new App\Validation;
		$result = $test->Has_FuelHistory_Return_Factor(true);
		
		$this->assertEquals(0.01, $result);
	}
	public function testNo_FuelHistory_Return_Factor() {
		$test = new App\Validation;
		$result = $test->No_FuelHistory_Return_Factor(false);
		
		$this->assertEquals(0, $result);
	}
	
	public function testGallonsRequested_High_Return_Factor() {
		$test = new App\Validation;
		$result = $test->GallonsRequested_High_Return_Factor(1000);
		
		$this->assertEquals(0.02, $result);
	}
	public function testGallonsRequested_Low_Return_Factor() {
		$test = new App\Validation;
		$result = $test->GallonsRequested_Low_Return_Factor(1);
		
		$this->assertEquals(0.03, $result);
	}

    public function testOrder(){
        $link = new mysqli("database-4353.ctkzz4wlfaku.us-east-2.rds.amazonaws.com",
		"admin",
		"COSC4353",
		"fuelQuote_schema");
        
        $test = new App\Validation;

        $result = $test->Order($link, 'muser', 10, '12345 Oceanview Drive', "2021-07-23", 10.32, 103.2);

        $this->assertEquals(true, $result);
    }

    public function testEditPasswordEmptyValidate(){        
        $test = new App\Validation;
        $result = $test->EditPasswordEmptyValidate('test');
        
        $this->assertEquals(false, $result);
    }

    public function testEditPasswordRegexValidate(){        
        $test = new App\Validation;
        $result = $test->EditPasswordRegexValidate('test');
        
        $this->assertEquals(1, $result);
    }

    public function testEditNameEmptyValidate(){
        $test = new App\Validation;
        $result = $test->EditNameEmptyValidate('Miguel Helguero');
        
        $this->assertEquals(false, $result);
    }

    public function testEditNameRegexValidate(){
        $test = new App\Validation;
        $result = $test->EditNameRegexValidate('Miguel Helguero');
        
        $this->assertEquals(1, $result);
    }

    public function testEditAddressOneEmptyValidate(){
        $test = new App\Validation;
        $result = $test->EditAddressOneEmptyValidate('123456 Oceanview Drive');

        $this->assertEquals(false, $result);
    }
    
    public function testEditAddressOneRegexValidate(){
        $test = new App\Validation;
        $result = $test->EditAddressOneRegexValidate('123456 Oceanview Drive');

        $this->assertEquals(1, $result);
    }

    public function testEditAddressTwoRegexValidate(){
        $test = new App\Validation;
        $result = $test->EditAddressTwoRegexValidate('987654 Main St.');

        $this->assertEquals(1, $result);
    }
    
    public function testEditCityEmptyValidate(){
        $test = new App\Validation;
        $result = $test->EditCityEmptyValidate('Houston');

        $this->assertEquals(false, $result);
    }

    public function testEditCityRegexValidate(){
        $test = new App\Validation;
        $result = $test->EditCityRegexValidate('Houston');

        $this->assertEquals(1, $result);
    }
    
    public function testEditStateEmptyValidate(){
        $test = new App\Validation;
        $result = $test->EditStateEmptyValidate('TX');

        $this->assertEquals(false, $result);
    }

    public function testEditStateRegexValidate(){
        $test = new App\Validation;
        $result = $test->EditStateRegexValidate('TX');

        $this->assertEquals(1, $result);
    }

    public function testEditZipcodeEmptyValidate(){
        $test = new App\Validation;
        $result = $test->EditZipcodeEmptyValidate('77450-1234');

        $this->assertEquals(false, $result);
    }

    public function testEditZipcodeRegexValidate(){
        $test = new App\Validation;
        $result = $test->EditZipcodeRegexValidate('77450-1234');

        $this->assertEquals(1, $result);
    }
    
    public function testEditSetPassword(){
        $link = new mysqli("database-4353.ctkzz4wlfaku.us-east-2.rds.amazonaws.com",
		"admin",
		"COSC4353",
		"fuelQuote_schema");
        
        $test = new App\Validation;
        $result = $test->EditSetPassword($link, 'test', 'newPassword');

        $this->assertEquals(true, $result);
    }

    public function testEditSetClientInfo(){
        $link = new mysqli("database-4353.ctkzz4wlfaku.us-east-2.rds.amazonaws.com",
		"admin",
		"COSC4353",
		"fuelQuote_schema");
        
        $test = new App\Validation;
        $result = $test->EditSetClientInfo($link, 'Thomas Johnson', '191919 Test Drive', '202020 Second Street', 'Houston', 'TX', '77450-1234', 'test');

        $this->assertEquals(true, $result);
    }

    public function testEditShowAccount(){
        $link = new mysqli("database-4353.ctkzz4wlfaku.us-east-2.rds.amazonaws.com",
		"admin",
		"COSC4353",
		"fuelQuote_schema");
        
        $test = new App\Validation;
        $result = $test->EditShowAccount($link, 'muser');

        $this->assertEquals(true, $result);
    }

    public function testShowHistory(){
        $link = new mysqli("database-4353.ctkzz4wlfaku.us-east-2.rds.amazonaws.com",
		"admin",
		"COSC4353",
		"fuelQuote_schema");
        
        $test = new App\Validation;
        $result = $test->ShowHistory($link, 'test10');

        $this->assertEquals(true, $result);
    }
}