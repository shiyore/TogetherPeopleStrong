<?php
/*
 * Project: TogetherPeopleStrong ver.6
 * @author: Carson Perry
 * Module: RestAPI ver. 1
 * Date: 04/18/21
 * Synopsis: This is the business service to contact the portfolioDAO
 * References: This is references the PortfolioDAO and is referenced by the portfolio controller
 */
namespace App\Services\Businesses;

use App\Models\PortfolioModel;
use App\Services\Data\PortfolioDAO;
use App\Services\Data\DBConnect;
use App\Models\UserModel;

class PortfolioService
{
    public function checkPortfolio(PortfolioModel $port)
    {
        $DAO = new PortfolioDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->checkPortfolio($port);
    }
    public function updatePortfolio(PortfolioModel $port)
    {
        $DAO = new PortfolioDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->updatePortfolio($port);
    }
    public function createPortfolio(PortfolioModel $port)
    {
        $DAO = new PortfolioDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->createPortfolio($port);
    }
    public function getAll()
    {
        $DAO = new PortfolioDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->getAll();
    }
    public function getPortfolioByName(string $name)
    {
        $DAO = new PortfolioDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->getPortfolioByName($name);
    }
    public function doesUserHavePortfolio(int $uid)
    {
        $DAO = new PortfolioDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->doesUserHavePortfolio($uid);
    }
    public function getPortfolioByUid(int $uid)
    {
        $DAO = new PortfolioDAO(new DBConnect("togetherpeoplestrong"));
        return $DAO->getPortfolioByUid($uid);
    }
}