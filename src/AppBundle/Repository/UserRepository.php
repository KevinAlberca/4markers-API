<?php

namespace AppBundle\Repository;
use Doctrine\ORM\Query;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function checkIfUserExist($login, $password)
    {
        $req = $this->getEntityManager()->createQueryBuilder()
            ->select("u")
            ->from("AppBundle:User", "u")
            ->where("u.login = :login")
                ->setParameter("login", $login)
            ->andWhere("u.password = :password")
                ->setParameter("password", $password)

        ->getQuery()->getResult();

        return $req;
    }
}
