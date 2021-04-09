<?php

namespace blok;

use blok\MyLog;
use blok\Quadre;
use blok\Linear;

class MyLogTest extends \PHPUnit\Framework\TestCase

{

    public function testInstance()
    {
        $this->assertInstanceOf(\core\LogAbstract::class, MyLog::Instance());
    }

    /**
     * @dataProvider providerLog
     */




    public function testLog()
    {
        //Записать что то влог
        //вызвать write , проверить что в консоли (опционально поискать файл), проверить создалась ли папка log
        //проверить инстанс
        MyLog::log("test_case");
        MyLog::write();
      //  $log = ob_get_contents();
        $this->expectOutputString("test_case");

        MyLog::clearLog();

        $this->expectOutputString();

       // MyLog::log($msg);
       // $this->log[] = ['msg' => $msg];

        //$this->assertSame($this->log,);
    }



    function lastModifiedInFolder($folderPath) {

        /* First we set up the iterator */
        $iterator = new RecursiveDirectoryIterator($folderPath);
        $directoryIterator = new RecursiveIteratorIterator($iterator);

        /* Sets a var to receive the last modified filename */
        $lastModifiedFile = getBasename('.php');

        /* Then we walk through all the files inside all folders in the base folder */
        foreach ($directoryIterator as $name => $object) {
            /* In the first iteration, we set the $lastModified */
            if (empty($lastModifiedFile)) {
                $lastModifiedFile = $name;
            }
            else {
                $dateModifiedCandidate = filemtime($lastModifiedFile);
                $dateModifiedCurrent = filemtime($name);

                /* If the file we thought to be the last modified
                   was modified before the current one, then we set it to the current */
                if ($dateModifiedCandidate < $dateModifiedCurrent) {
                    $lastModifiedFile = $name;
                }
            }
        }
        /* If the $lastModifiedFile isn't set, there were no files
           we throw an exception */
        if (empty($lastModifiedFile)) {
            throw new Exception("No files in the directory");
        }

        return $lastModifiedFile;
    }


    public function test_Write()
    {

        try {
            $o = new Quadre();
            $r = $o->solve(1, 4, 3);
            MyLog::log("Версия программы: " . trim(file_get_contents(  'version')) );
            MyLog::log("The equation $a*x^2+$b*x+$c=0");
            MyLog::log("Roots:" . implode(", ", $r));
        } catch (BlokException $e) {
            MyLog::log($e->getMessage());
        }

        MyLog::_write();
        $folderPath = "../log/";
        $message = "Версия программы: main\r\nThe equation 1*x^2+4*x+3=0\r\nRoots:-3, -5";
        $this->assertStringEqualsFile("../log/$lastModifiedFile.log", "$message");
        $this->assertFileExists($lastModifiedFile);
        $this->assertIsReadable($lastModifiedFile);
    }



/**
    public function providerLog()
    {
        return array(
            array("test-1-9"),
            array("test_A-Z")
        );
    }

*/
    /**
      public function test_Write()
     {
      $o = new Quadre();
      $r = $o->solve(1, 4, 3);
      $path = $q;
      $message = "Версия программы: main\r\nThe equation 1*x^2+4*x+3=0\r\nRoots:-3, -5";
     $this->assertStringEqualsFile("../log/$path.log", "$message");

      }



     */
}
