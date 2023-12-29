<?php

namespace App;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Exception;

class GejalaTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    use FeatureTestTrait;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }
    public function testIndexWithValidJWT(){
        $_COOKIE['token']='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MDM3NzE2MDksImV4cCI6MWUrMzgsImRhdGEiOnsidXNlcm5hbWUiOiJhZG1pbiIsInJvbGUiOiJhZG1pbiJ9fQ.b17uNQKt3a2fzDn_U-eCtRH9_BURLWPMx134M_PdyEo';
        $result = $this->call('get', '/admin/gejala');
        $result->assertOK();
    }
    public function testIndexWithRandomJWT()
    {
        $_COOKIE['token']='iniRandomJWT.eyJpYXQiOjE3MDM3NjE0MTgsImV4cCI6MTcwMzc2NTAxOCwiZGF0YSI6eyJ1c2VybmFtZSI6ImFkbWluIiwicm9sZSI6ImFkbWluIn19.o6on5_uuPjoGlmBCJCAxeCPp1Q26Vw8Jxk-O315pNOw';
        try {
            $result = $this->call('get', '/admin/gejala');
        } catch (\Exception $e) {
            $this->assertTrue(session()->has('errors'));
            $errors = session('errors');
            $this->assertContains('Silahkan login terlebih dahulu.',array("errors"=>$errors));
            $this->assertMatchesRegularExpression('/headers already sent/', $e->getMessage());
        }
    }
    public function testIndexWithNoJWT()
    {
        try {
            $result = $this->call('get', '/admin/gejala');
        } catch (\Exception $e){
            $this->assertTrue(session()->has('errors'));
            $errors = session('errors');
            $this->assertContains('Silahkan login terlebih dahulu.',array("errors"=>$errors));
            $this->assertMatchesRegularExpression('/headers already sent/', $e->getMessage());
        }
    }
    /**
     * @throws Exception
     */
    public function testAddSuccess()
    {
        $_POST['kode_gejala']=rand(1, 9999999);
        $_POST['nama_gejala']='Mengalami batuk';
        $_COOKIE['token']='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MDM3NzE2MDksImV4cCI6MWUrMzgsImRhdGEiOnsidXNlcm5hbWUiOiJhZG1pbiIsInJvbGUiOiJhZG1pbiJ9fQ.b17uNQKt3a2fzDn_U-eCtRH9_BURLWPMx134M_PdyEo';
        $result = $this->call('post', '/admin/gejala/add');
        $result->assertRedirect('admin/gejala');
    }
    public function testAddNull()
    {
        $_POST['kode_gejala']='';
        $_POST['nama_gejala']='';
        $_COOKIE['token']='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MDM3NzE2MDksImV4cCI6MWUrMzgsImRhdGEiOnsidXNlcm5hbWUiOiJhZG1pbiIsInJvbGUiOiJhZG1pbiJ9fQ.b17uNQKt3a2fzDn_U-eCtRH9_BURLWPMx134M_PdyEo';
        $result = $this->call('post', '/admin/gejala/add');
        $result->assertRedirect('admin/gejala/create');
        $this->assertTrue(session()->has('errors'));
        $errors = session('errors');
        $this->assertContains('The Kode Gejala field is required.', $errors);
        $this->assertContains('The Nama Gejala field is required.', $errors);
    }
    public function testAddDuplicate()
    {
        $_POST['kode_gejala']='G1';
        $_POST['nama_gejala']='Mengalami batuk';
        $_COOKIE['token']='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MDM3NzE2MDksImV4cCI6MWUrMzgsImRhdGEiOnsidXNlcm5hbWUiOiJhZG1pbiIsInJvbGUiOiJhZG1pbiJ9fQ.b17uNQKt3a2fzDn_U-eCtRH9_BURLWPMx134M_PdyEo';
        $result = $this->call('post', '/admin/gejala/add');
        $result->assertRedirect('admin/gejala/create');
        $this->assertTrue(session()->has('errors'));
        $errors = session('errors');
        $this->assertContains('The Kode Gejala field must contain a unique value.', $errors);
    }
    public function AddDummyData()
    {
        $_POST['kode_gejala']=rand(1, 9999999);
        $_POST['nama_gejala']='Mengalami batuk';
        $_COOKIE['token']='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MDM3NzE2MDksImV4cCI6MWUrMzgsImRhdGEiOnsidXNlcm5hbWUiOiJhZG1pbiIsInJvbGUiOiJhZG1pbiJ9fQ.b17uNQKt3a2fzDn_U-eCtRH9_BURLWPMx134M_PdyEo';
        $this->call('post', '/admin/gejala/add');
        return $_POST['kode_gejala'];
    }
    public function testDeleteSuccess()
    {
        //nambah data dummy
        $addGejala=$this->AddDummyData();
        $dbku = \Config\Database::connect();
        $query = "SELECT id FROM gejala WHERE kode_gejala = ?";
        $gejala = $dbku->query($query, [$addGejala])->getResult();

        $_COOKIE['token']='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MDM3NzE2MDksImV4cCI6MWUrMzgsImRhdGEiOnsidXNlcm5hbWUiOiJhZG1pbiIsInJvbGUiOiJhZG1pbiJ9fQ.b17uNQKt3a2fzDn_U-eCtRH9_BURLWPMx134M_PdyEo';
        $result = $this->call('get', '/admin/gejala/delete/'.$gejala[0]->id);
        $result->assertRedirect('admin/gejala');
        $this->assertTrue(!session()->has('errors'));
    }
    public function testDeleteNotFound()
    {
        $_COOKIE['token']='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MDM3NzE2MDksImV4cCI6MWUrMzgsImRhdGEiOnsidXNlcm5hbWUiOiJhZG1pbiIsInJvbGUiOiJhZG1pbiJ9fQ.b17uNQKt3a2fzDn_U-eCtRH9_BURLWPMx134M_PdyEo';
        $result = $this->call('get', '/admin/gejala/delete/01010101');
        $result->assertRedirect('admin/gejala');
        $this->assertTrue(session()->has('errors'));
        $errors = session('errors');
        $this->assertContains('ID gejala tidak valid.', $errors);
    }
    public function testDeleteConstraint()
    {
        $_COOKIE['token']='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MDM3NzE2MDksImV4cCI6MWUrMzgsImRhdGEiOnsidXNlcm5hbWUiOiJhZG1pbiIsInJvbGUiOiJhZG1pbiJ9fQ.b17uNQKt3a2fzDn_U-eCtRH9_BURLWPMx134M_PdyEo';
        $result = $this->call('get', '/admin/gejala/delete/1');
        $result->assertRedirect('admin/gejala');
        $this->assertTrue(session()->has('errors'));
        $errors = session('errors');
        $this->assertContains('Gejala ini masih dipakai untuk entitas lain.', $errors);
    }



}