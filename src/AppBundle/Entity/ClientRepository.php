<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * ClientRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClientRepository extends \Doctrine\ORM\EntityRepository
{
	public function getClients()
	{
		$qb = $this->createQueryBuilder('c');

		$qb ->getQuery()
			->getResult();

		return $qb
			->getQuery()
			->getArrayResult();
	}

	public function getActiveClients()
	{
		$qb = $this
			->createQueryBuilder('c')
			->where('c.active = :active')
		  	->setParameter('active', true)
		;

		return $qb
			->getQuery()
			->getResult();
	}

	public function getClientsWithCampaignId()
	{
		$qb = $this->createQueryBuilder('c')
			->where('c.idCampaignName IS NOT NULL')
		;

		return $qb
			->getQuery()
			->getResult();
		
	}
}
