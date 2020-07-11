<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Student ;

class AppFixtures extends Fixture
{ 
    
 
    public function load(ObjectManager $manager)
    {
        for($i =1 ;$i <= 10 ;$i++ ){
          
            $student = new Student() ;
            $student->setRegistrationNumber("20SYM$i") 
                    ->setFirstname("Habib$i") 
                    ->setLastname("Mbaye$i")  
                    ->setPhone(7813425345)
                    ->setEmail("habib@gmail$i.com")
                    ->setDateOfbirth(new \DateTime())
                    ->setUserType("fellow")
                    ->setFellowPrice(40000)
                    ->setAdress("Dakar") ; 

                $manager->persist($student) ;
        }    
            $manager->flush();
 
    }
}