<?php

namespace AppBundle\Entity\Repository;

/**
 * UserRepository
 *
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
	
	
	/*public function findByEmailCanonicalWithNonFree($email_canonical) {
		$qb = $this->createQueryBuilder("u")
			->andWhere('u.emailCanonical = :ec')->setParameter('ec', $email_canonical)
			->leftJoin('u.establecimientos', "e")
			->leftJoin('e.avisos', 'a')
			->andWhere("u.username = 'admin' or a.gratuito = 0")
			->setMaxResults(1);
		
		return $qb->getQuery()->getOneOrNullResult();
	}
	
	public function findByUsernameCanonicalWithNonFree($username_canonical) {
		
		$qb = $this->createQueryBuilder("u")
			->andWhere('u.usernameCanonical = :uc')->setParameter('uc', $username_canonical)
			->leftJoin('u.establecimientos', "e")
			->leftJoin('e.avisos', 'a')
			->andWhere("u.username = 'admin' or a.gratuito = 0")
			->setMaxResults(1);
		
		return $qb->getQuery()->getOneOrNullResult();
		
		
	}*/
	
}
