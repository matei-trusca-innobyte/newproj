<?php

/*
 * 
 */

namespace Ecma\StoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ecma\StoreBundle\Entity\Product;

/**
 * Description of LoadProductData
 *
 * @author matei
 */
class LoadProductData extends AbstractFixture implements
    OrderedFixtureInterface,
    ContainerAwareInterface
{

    private $container;

    public function getOrder()
    {
        return 1;
    }

    public function load(ObjectManager $manager)
    {
        foreach (array('asd' => 'ks dj', 'kdf' => 'sl kd') as $name => $desc) {
            $prod = new Product;
            $prod->setName($name)->setDescription($desc)->setPrice('12');
            $manager->persist($prod);
        }
        $manager->flush();
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     *
     * @return ContainerInterface
     */
    protected function getContainer()
    {
        return $this->container;
    }
    
}
