<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * CampaignRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CampaignRepository extends \Doctrine\ORM\EntityRepository
{
	public function getCampaigns()
	{
		$qb = $this->createQueryBuilder('c');

		$qb ->getQuery()
			->getResult();

		return $qb
			->getQuery()
			->getResult();
	}

	public function getActiveCampaigns()
	{
		$qb = $this
			->createQueryBuilder('c')
			->where('c.activeCampaign = :activeCampaign')
		  	->setParameter('activeCampaign', true)
		;

		return $qb
			->getQuery()
			->getResult();
	}

	public function getActiveCampaignsList()
	{
		$qb = $this->createQueryBuilder('c')
			->leftJoin('c.recipients', 'r')
			->addSelect('r')
		;

		return $qb
			->getQuery()
			->getResult();
	} 

	public function getCampaignsOfMonth($date1, $date2, $brand)
	{
		$qb = $this->createQueryBuilder('c')
			->where('c.endDate >= :date1')
			->andWhere('c.endDate < :date2')
		  	->setParameter('date1', $date1)
		  	->setParameter('date2', $date2)
		  	->andWhere('c.brand = :brand')
		  	->setParameter('brand', $brand)
		  	->andWhere('c.activeKpi = 1')
		;

		return $qb
			->getQuery()
			->getResult();
	} 

	public function getCampaignsOfYear($date1, $date2, $brand)
	{
		$qb = $this->createQueryBuilder('c')
			->where('c.endDate >= :date1')
			->andWhere('c.endDate < :date2')
		  	->setParameter('date1', $date1)
		  	->setParameter('date2', $date2)
		  	->andWhere('c.brand = :brand')
		  	->orderBy('c.startDate', 'DESC')
		  	->andWhere('c.activeKpi = 1')
		;

		return $qb
			->getQuery()
			->getResult();
	} 	
}
